import axios from "axios";

const envoyerForm = {
  data() {
    return {
      message: null,
      errors: null,
      errorAction: null,
    };
  },
  methods: {
    disableMessage() {
      setTimeout(() => {
        this.message != null
          ? (this.message = null)
          : (this.errorAction = null);
      }, 3000);
    },

    async envoyer(maData = null, method, api, idsReuete = null) {
      //vérifier si le idsRequete n'est pas null
      const apiUrl = idsReuete !== null ? `${api}${idsReuete}` : api;

      this.message = null;
      this.errors = null;
      this.errorAction = null;

      try {
        let response;
        if (method === "delete") {
          response = await axios[method](apiUrl);

        } else if (method === "post" || method === "put") {
          response = await axios[method](apiUrl, maData);
        }
        this.message = response.data.message;
        this.errorAction = response.data.errorAction;
        this.disableMessage(); // pour cacher le message
      } catch (error) {
        // Gérer les erreurs
        this.errors = error.response?.data?.errors;
      }
    },
  },
};

export default envoyerForm;
