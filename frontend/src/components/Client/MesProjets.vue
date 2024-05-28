<template>
    <div class="relative h-[86.7vh]">

        <!-- Component pour afficher les informations du projet -->
        <InfosProjet v-if="afficheComInfosProjets == true" :projet="projetSelectione" :userRole="'client'"
            @changerVisibilite="afficheComInfosProjets = false" />

        <div v-if="afficheComInfosProjets == false">
            <div v-if="length != null && length == 0" class=" py-4 pl-8 text-left">
                <p class="text-lg">Vous n'avez pas des demandes à afficher</p>
            </div>

            <div class="flex flex-wrap items-center justify-around mt-[30px] ">
                <div v-for="projet in projets" :key="projet.id"
                    class="projet flex flex-col justify-between bg-slate-100 h-[300px] m-3   w-[30%] text-center">
                    <!-- <img src="@/assets/bg-projet.jpg" alt=""> -->
                    <div class="w-full h-full flex flex-col justify-between items-center">
                        <div class="flex flex-col items-center justify-center w-full h-[75%]">
                            <h1 class="mt-3 text-white text-4xl font-[900] ">{{ `projet N° ${projet.id}`.toUpperCase()
                                }}
                            </h1>
                            <p class="text-white font-[600] mt-[10px]">statut : <span class="font-normal">{{
                                projet.termine == 0 ? "En cours d'exécution" :
                                    "terminé" }}</span></p>
                        </div>
                        <button type="button" @click="projetSelectione = projet; afficheComInfosProjets = true"
                            class="text-gray-900 text-[15px] bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-2 focus:ring-gray-100 font-medium rounded-lg px-5 py-2.5 me-2 mb-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Detail
                            du projet</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
import { TOUS_MES_PROJETS } from "@/api/api"
import EnvoyerForm from "@/mixins/EnvoyerForm"
import InfosProjet from "@/components/Admin/Projets/InfosProjet"

export default {
    mixins: [EnvoyerForm],
    components: {
        InfosProjet
    },
    data() {
        return {
            projets: [],
            length: null,
            afficheComInfosProjets: false,
            projetSelectione: null, // le projet à afficher ces infos
        }
    },
    methods: {
        async recevoirProjets() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id
            await this.envoyer(null, "get", TOUS_MES_PROJETS, user_id, false)
            this.projets = this.returnData
        }
    },
    async mounted() {
        await this.recevoirProjets()
    }

}
</script>


<style scoped>
.projet {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(1, 45, 57, 0.5)), url('@/assets/bg-projet.jpg');
    background-size: cover;
    background-position: center;

}
</style>