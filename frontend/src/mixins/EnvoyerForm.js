import axios from "axios";

const envoyerForm = {
    data() {
        return {
            message: "",
            errors: null
        }
    },
    methods: {
        disableMessage() {
            setTimeout(() => {
                this.message = ''
            }, 3000);
        },

        async envoyer(maData,method,api) {
            this.message = "";
            this.errors = null;

            await axios[method](api, maData)
                .then(response => {
                    this.message = response.data.message;
                    maData = {};
                    this.disableMessage() // pour cacher le message
                })
                        .catch(errors => this.errors = errors.response.data.errors)
                }
    },
    
}

export default envoyerForm