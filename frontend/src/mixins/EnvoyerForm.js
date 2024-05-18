import axios from "axios";

const envoyerForm = {
  data() {
    return {
      message: null,
      errors: null,
      errorAction : null,
    };
  },
  methods: {
    disableMessage() {
      setTimeout(() => {
        this.message != null ? (this.message = null) : (this.errorAction = null);
      }, 3000);
    },

    async envoyer(maData, method, api, user_id = null) {
      //vérifier si le user_id n'est pas null
        const apiUrl = user_id !== null ? `${api}${user_id}` : api;
        
      this.message = null;
        this.errors = null;
        this.errorAction = null;

      await axios[method](apiUrl, maData)
        .then((response) => {
            this.message = response.data.message;
            this.errorAction = response.data.errorAction;
          maData = {};
          this.disableMessage(); // pour cacher le message
        })
        .catch((errors) => (this.errors = errors.response.data.errors));
    },
  },
};

export default envoyerForm;
