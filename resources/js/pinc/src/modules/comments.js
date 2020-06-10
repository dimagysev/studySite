import '../../../bootstrap';
import sleep from "./sleep";
import BoxMessage from "./boxMessage";

export default class Comments{

    constructor(formName, containerSelector){
        this.formName = formName;
        this.containerSelector = containerSelector;
        this.messageBox = new BoxMessage('message');
    }

    run(){
        if ((this.form  = document.forms.namedItem(this.formName)) &&
            (this.commentsContainer = document.getElementById(this.containerSelector))) {

            this.commentsBlock= document.getElementById('comments');
            this.respondBlock = document.getElementById('respond');
            this.commentParent = document.getElementById('comment_parent');
            this.cancelReply = document.getElementById("cancel-comment-reply-link");

            this.listenReplyButtons()
            this.commentsNumbering();

            this.cancelReply.addEventListener('click', this.cancelReplyHandler.bind(this));
            this.form.addEventListener('submit', this.submitHandler.bind(this));
        }
    }

    replyHandler(event){
        event.preventDefault();
        this.moveRespond(event.target.dataset.commentid);
    }

    cancelReplyHandler(event){
        event.preventDefault();
        this.comeBackRespond();
    }

    submitHandler(event) {
        event.preventDefault();
        let formData = new FormData(this.form);
        this.sendComment(formData)
            .finally(()=>sleep(3500)
                .then(()=>this.messageBox.hideMessage()));
    }

    async sendComment(formData){
        try {
            const response = await axios.post(this.form.action, formData);
            this.form.reset();
            this.messageBox.renderSuccessMessage('Успешно отправлено');
            sleep(4200).then(()=> this.renderComment(response.data));
        }catch (e) {
            this.messageBox.renderErrorMessage(Object.values(e.response.data.errors));
        }
    }

    renderComment(response){
        if (parseInt(response.parent) !== 0){
            const parent = document.querySelector('#li-comment-' + response.parent + ' > ul.children');
            parent.insertAdjacentHTML('beforeend', response.comment);
            this.comeBackRespond();
        } else {
            this.commentsContainer.insertAdjacentHTML('beforeend', response.comment);
        }
        document.getElementById('comment-' + response.id).style.border = '1px solid green'
        this.listenReplyButtons();
        this.commentsNumbering();
    }

    commentsNumbering(){
        const comments = document.querySelectorAll('#comments li');
        comments.forEach((comment, i)=>{
            comment.querySelector('.commentNumber').textContent = '#' + ( i + 1 );
        })
    }

    moveRespond(commentId){
        this.commentParent.value = commentId;
        this.cancelReply.style.display = 'inline-block';
        document
            .getElementById('comment-' + commentId)
            .insertAdjacentElement('afterend',this.respondBlock);
    }

    comeBackRespond(){
        this.commentParent.value = 0;
        this.cancelReply.style.display = 'none';
        this.commentsBlock.insertAdjacentElement('beforeend', this.respondBlock);
    }

    listenReplyButtons(){
        const replyButton = document.querySelectorAll('.comment-reply-link');
        replyButton.forEach((item) => {
            item.addEventListener('click', this.replyHandler.bind(this));
        });
    }
}

