import BoxMessage from "./boxMessage";
import sleep from "./sleep";

export default class Contact {
    constructor(formId) {
       this.formId = formId;
       this.boxMessage = new BoxMessage('message');
    }

    run(){
        if (this.form = document.getElementById(this.formId)){
            this.form.addEventListener('submit', this.sendHandler.bind(this));
        }
    }

    sendHandler (event){
        event.preventDefault();
        const dataForm = new FormData(this.form);
        this.sendMessage(dataForm)
            .finally(()=>sleep(3500)
                .then(()=>this.boxMessage.hideMessage()));
    }

    async sendMessage(dataForm){
        try{
            const response = await axios.post(this.form.action, dataForm);
            await this.boxMessage.renderSuccessMessage(response.data.success);
            this.form.reset();
        }catch (e) {
            const error = Object.values(e.response.data.errors);
            this.boxMessage.renderErrorMessage(error);
        }
    }
}
