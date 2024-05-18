import axios from "axios";

const recevoirData = {
  data() {
    return {
      data: [],
    };
  },
  methods: {
    async recevoir(api, user_id = null) {
      //vérifier si le user_id n'est pas null
          const apiUrl = user_id !== null ? `${api}${user_id}` : api;
          
      await axios.get(apiUrl).then((response) => {
        this.data = response.data.data;
      });
    },
  },
};

export default recevoirData;
