import axios from "axios";

const envoyerForm = {
  data() {
    return {
      message: null,
      errors: null,
      errorAction: null,
      returnData: null, // data à retourné
      token: null, //
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

    async envoyer(maData = null, method, api, idsReuete = null, token = null) {
      //vérifier si le idsRequete n'est pas null
      const apiUrl = idsReuete !== null ? `${api}${idsReuete}` : api;

      this.message = null;
      this.errors = null;
      this.errorAction = null;
      this.returnData = null;

      try {
        let response;
        const config = {
          headers: {},
        };

        if (token) {
          config.headers["Authorization"] = `Bearer ${token}`;  // ajouter le token au header
        }
        if (maData == null) {
          response = await axios[method](apiUrl, config);
        } else if (maData != null) {
          response = await axios[method](apiUrl, maData, config);
        }

        this.message = response.data.message;
        this.errorAction = response.data.errorAction;
        this.returnData = response.data?.data;
        this.token = response.data?.token;
        this.disableMessage(); // pour cacher le message
      } catch (error) {
        // Gérer les erreurs
        this.errors = error.response?.data?.errors;
      }
    },
  },
};

export default envoyerForm;
