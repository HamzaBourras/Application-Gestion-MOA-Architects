<template>
    <div>
        <div class="global text-white h-max py-[25px] ">
            <!-- Statistiques -->
            <div class=" w-full flex h-max pb-[20px] ">
                <div class="w-[25%] flex text-left  " v-for="(statique, i) in statiques " :key="i"
                    :class="`${i % 2 == 1 ? 'justify-end' : 'justify-start'}`">
                    <div
                        class="bg-white w-full text-black rounded-md border-l-[7px] border-l-blue-500 pl-4 flex justify-between mx-[10px] h-[110px] ">
                        <div class="h-full w-[70%] flex flex-col justify-center ">
                            <p class="text-2xl font-[900] py-[10px] "> {{ statique.number }} {{ statique.titre }} </p>
                            <div class="flex justify-end items-center w-full">
                                <button @click="changeLien('Mes ' + statique.titre.toLowerCase())"
                                    class="group text-blue-600 hover:text-blue-400 duration-200 flex items-center justify-center w-[100px] ">
                                    <span>voir plus</span> <span class=" h-[20px] ml-1 "><i
                                            class="fa-solid fa-arrow-right text-sm group-hover:translate-x-[3px] "></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="rounded-r-lg border-l-2 border-blue-400 w-[28%] flex items-center justify-center ">
                            <p><i :class="statique.logo" class="text-[38px] text-blue-400 "></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" w-full h-max flex ">
                <div class="w-full pl-1 ">
                    <div class="w-[98%] rounded-lg bg-white text-black ml-2 py-[17px] flex flex-col justify-between ">
                        <!-- Contrats et rendez-vous -->
                        <div class="flex justify-between h-[200px] ">
                            <div class="w-1/2">
                                <h1 class="text-black text-left pb-1 pl-2 text-lg font-[700] ">Contrats à signer
                                    aujourd'hui</h1>
                                <p v-if="contrats.length == 0"
                                    class="text-left pl-[20px] mt-1 font-[400] text-gray-500 ">
                                    Pas de contrats à signer aujourd'hui ! </p>
                                <div v-else
                                    class="flex flex-wrap mt-[10px] px-[15px] justify-between max-h-[170px] overflow-y-auto ">
                                    <div class=" w-[48%] border-l-[1.5px] pl-2 py-2  border-black "
                                        v-for="contrat in contrats" :key="contrat.id">
                                        <p class="text-[17px] text-gray-800 font-[600] text-left "> {{ `contrat N°
                                            ${contrat.id}`.toUpperCase() }} </p>
                                        <div class="w-full flex items-center justify-between">
                                            <p class=" w-full text-left"> <span class="font-[500]">Temps : </span> <span
                                                    class="text-blue-500">{{ formattedDate(contrat.date) }}
                                                </span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/2">
                                <h1 class="text-black text-left pb-1 pl-2 text-lg font-[700] ">Rendez-vous
                                    d'aujourd'hui </h1>
                                <p v-if="rendezVous.length == 0"
                                    class="text-left pl-[20px] mt-1 font-[400] text-gray-500 ">
                                    Pas de rendez-vous aujourd'hui ! </p>
                                <div v-else
                                    class="w-[98.5%]  flex flex-wrap px-[15px] justify-between mt-3 max-h-[170px] overflow-y-auto">
                                    <div class=" w-[48%] border-l-[1.5px] pl-2 py-2 my-2 border-black "
                                        v-for="rendez in rendezVous" :key="rendez.id">
                                        <p class="text-[17px] text-gray-800 font-[600] text-left "> {{ `rendez-vous N°
                                            ${rendez.id}`.toUpperCase() }} </p>
                                        <div class="w-full flex items-center justify-between">
                                            <p class=" w-full text-left"> <span class="font-[500]">Temps : </span> <span
                                                    class="text-blue-500">{{ formattedDate(rendez.date) }}
                                                </span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Projets -->
                        <div class="h-[250px]">
                            <h1 class="text-black text-left pb-1 pl-2 text-lg font-[700] ">Etat de vos projets</h1>
                            <div>
                                <div class="relative shadow-md rounded-lg mx-2 max-h-[200px] overflow-y-auto">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">Titre</th>
                                                <th scope="col" class="px-6 py-3">Date termination</th>
                                                <th scope="col" class="px-6 py-3">Prix</th>
                                                <th scope="col" class="px-6 py-3">Statut</th>
                                                <th scope="col" class="px-6 py-3"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="projet in projets" :key="projet.id"
                                                class="bg-white dark:bg-gray-800">
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap uppercase dark:text-white">
                                                    {{ projet.demandes.nom_projet }}
                                                </th>
                                                <td class="px-6 py-4">{{ projet.date_termination?.split(' ')[0] }}</td>
                                                <td class="px-6 py-4">{{ projet.prix }} DH</td>
                                                <td class="px-6 py-4">
                                                    {{ projet.termine == 1 ? "terminé" : "Enexécution" }}</td>
                                                <td class="py-4">
                                                    <button @click="changeLien('Mes projets')"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                        Plus de detail
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import EnvoyerForm from "@/mixins/EnvoyerForm";
import { CLIENT_DASHBOARD_DATA } from "@/api/api"
export default {
    mixins: [EnvoyerForm],
    emits: ["changeLienEmit"],
    data() {
        return {
            demandes: 0,
            contrats: [],
            rendezVous: [],
            projets: [],

            statiques: [],
        }
    },
    methods: {
        changeLien(lienActif) {
            this.$emit("changeLienEmit", lienActif);
            if (typeof localStorage !== 'undefined') {
                localStorage.setItem('lienActif', lienActif);
            } else {
                console.error('LocalStorage n\'est pas disponible.');
            }
        },
        formattedDate(date) {
            if (!date) return ''; // Handle case where date is not provided

            const timePart = date.split(' ')[1];
            if (!timePart) return ''; // Handle case where timePart is not present

            const [hour, minute] = timePart.split(':');
            return `${hour}:${minute} min`;
        }

    },
    async mounted() {
        // construire la date d'aujourd'hui 
        const today = new Date();

        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;

        // recevoir les données de dashboard
        const user_id = JSON.parse(localStorage.getItem("userAuth")).id
        await this.envoyer(null, "get", CLIENT_DASHBOARD_DATA, user_id, false)

        if (this.returnData) {
            this.demandes = this.returnData.nbrDemandes
            const tousContrats = this.returnData.Contrats
            this.contrats = tousContrats?.filter(it => it.date.split(' ')[0] == formattedDate);
            const tousRendezVous = this.returnData.Rendezvous
            this.rendezVous = tousRendezVous?.filter(it => it.date.split(' ')[0] == formattedDate);
            this.projets = this.returnData.Projets



            this.statiques = [
                { titre: 'Demandes', logo: 'fa-solid fa-code-pull-request', number: this.demandes },
                { titre: 'Contrats', logo: 'fa-solid fa-file-signature', number: tousContrats?.length },
                { titre: 'Projets', logo: 'fa-solid fa-diagram-project', number: this.projets?.length },
                { titre: 'Rendez-vous', logo: 'fa-solid fa-calendar-check', number: tousRendezVous?.length }
            ]
        }
    },
}
</script>