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

    async envoyer(maData = null, method, api, idsRequete = null, hasFile = false) {
      //vérifier si le idsRequete n'est pas null
      const apiUrl = idsRequete != null ? `${api}${idsRequete}` : api;

      this.message = null;
      this.errors = null;
      this.errorAction = null;
      this.returnData = null;

      try {
        let response;
        const config = {
          headers: {},
        };

        const token = localStorage.getItem("token");

        if (token) {
          config.headers["Authorization"] = `Bearer ${token}`; // ajouter le token au header
        }

        if (hasFile == true) {
          config.headers["Content-Type"] = "multipart/form-data";
        }
        
        if (maData == null) {
          if (method == "get" || method == "delete") {
            response = await axios[method](apiUrl, config);
          } else {
            response = await axios[method](apiUrl, null, config); // pour la deconnexion
          }
        } else if (maData != null) {
          response = await axios[method](apiUrl, maData, config);
          
        }

        // console.log(response);

        if (!token) this.token = response.data?.token;
        this.message = response.data.message;
        this.errorAction = response.data.errorAction;
        this.returnData = response.data?.data;

        this.disableMessage(); // pour cacher le message
      } catch (error) {
        // Gérer les erreurs
        this.errors = error.response?.data?.errors;
      }
    },
  },
};

export default envoyerForm;
