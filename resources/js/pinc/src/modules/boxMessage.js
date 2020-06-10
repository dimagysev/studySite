import sleep from "./sleep";
export default class BoxMessage {

    constructor(blockId) {
        this.messageBox = document.getElementById('message');
    }

    renderSuccessMessage(data){
        let textErr = `<ul><li>${data}</li></ul>`;
        this.messageBox.insertAdjacentHTML('afterbegin', textErr);
        this.messageBox.parentNode.style.display = 'flex';
        this.messageBox.classList.add('success');
        sleep(10).then(() => this.messageBox.style.opacity = '1');
    }

    renderErrorMessage(data){
        let textErr = '<ul>';
        data.forEach(items => {
            for (const item of items) {
                textErr += `<li>${item}</li>`;
            }
        });
        textErr+='</ul>';
        this.messageBox.insertAdjacentHTML('afterbegin', textErr);
        this.messageBox.parentNode.style.display = 'flex';
        this.messageBox.classList.add('error');
        sleep(10).then(() => this.messageBox.style.opacity = '1');
    }

    hideMessage(){
        this.messageBox.style.opacity = '0';
        sleep(1000).then(() => {
            this.messageBox.parentNode.style.display = 'none';
            if (this.messageBox.classList.contains('error')){
                this.messageBox.classList.remove('error');
            }
            if (this.messageBox.classList.contains('success')){
                this.messageBox.classList.remove('success');
            }
            this.messageBox.textContent = '';
        });
    }
}
