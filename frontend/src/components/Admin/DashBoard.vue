<template>
    <div>
        <div class="global text-white h-[88.4vh]">
            <!-- Statistiques -->
            <div class=" w-full flex h-max py-[30px] ">
                <div class="w-[25%] flex text-left  " v-for="(statique, i) in statiques " :key="i"
                    :class="`${i % 2 == 1 ? 'justify-end' : 'justify-start'}`">
                    <div
                        class="bg-white w-full text-black rounded-md border-l-[7px] border-l-blue-500 pl-4 flex justify-between mx-[10px] h-[110px] ">
                        <div class="h-full w-[70%] flex flex-col justify-center ">
                            <p class="text-2xl font-[900] py-[10px] "> {{ statique.number }} {{ statique.titre }} </p>
                            <div class="flex justify-end items-center w-full">
                                <button @click="changeLien(statique.titre)"
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
            <!-- side -->
            <div class=" w-full h-max py-[20px] flex  ">
                <!-- rendez-vous aujourd'hui -->
                <div class="w-2/3 pl-1 ">
                    <div class="w-[98%] rounded-md bg-white text-black mx-2 py-[25px] flex flex-col justify-between ">
                        <div class="h-[174px]">
                            <h1 class="text-black text-left pb-1 pl-2 text-lg font-[700] ">Contrats à signer
                                aujourd'hui</h1>
                            <p v-if="contrats.length == 0"
                                class="text-left pl-[20px] mt-1 font-[400] text-gray-500 mb-[45px] ">
                                Pas de contrats à signer aujourd'hui ! </p>
                            <div
                                class="flex flex-wrap my-[10px] px-[15px] justify-between overflow-y-auto  max-h-[103px] ">
                                <div class=" w-[48%] border-l-[1.5px] pl-2 py-2 my-2  border-black "
                                    v-for="contrat in contrats" :key="contrat.id">
                                    <p class="text-[17px] text-gray-800 font-[600] text-left "> {{ `contrat N°
                                        ${contrat.id}`.toUpperCase() }} </p>
                                    <div class="w-full flex items-center justify-between">
                                        <p class=" w-[40%]  text-left"> <span class="font-[500]">Temps : </span> <span
                                                class="text-blue-500">{{ formattedDate(contrat.date) }}
                                            </span> </p>
                                        <p class="w-[60%]  text-left"> <span class="font-[500]">Avec : </span> <span
                                                class="text-blue-500">{{
                                                    contrat.demandes.user.nom.toUpperCase() + " " +
                                                    contrat.demandes.user.prenom.toUpperCase() }}</span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-[174px]">
                            <h1 class="text-black text-left pb-1 pt-2 pl-2 text-lg font-[700] ">Rendez-vous
                                d'aujourd'hui </h1>
                            <p v-if="rendezVous.length == 0" class="text-left pl-[20px] mt-1 font-[400] text-gray-500 ">
                                Pas de rendez-vous aujourd'hui ! </p>
                            <div v-else
                                class="flex flex-wrap my-[10px] px-[15px] justify-between mt-3  overflow-y-auto max-h-[103px] ">
                                <div class=" w-[48%] border-l-[1.5px] pl-2 py-2 my-2 border-black "
                                    v-for="rendezVous in rendezVous" :key="rendezVous.id">
                                    <p class="text-[17px] text-gray-800 font-[600] text-left "> {{ `rendez-vous N°
                                        ${rendezVous.id}`.toUpperCase() }} </p>
                                    <div class="w-full flex items-center justify-between">
                                        <p class=" w-[40%] text-left"> <span class="font-[500]">Temps : </span> <span
                                                class="text-blue-500">{{ formattedDate(rendezVous.date) }}
                                            </span> </p>
                                        <p class="w-[60%] text-left"> <span class="font-[500]">Avec : </span>
                                            <span class="text-blue-500">{{
                                                rendezVous.user.nom.toUpperCase() + " " +
                                                rendezVous.user.prenom.toUpperCase() }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- clients -->
                <div class="w-1/3 pr-3 ">
                    <div class=" w-full px-[10px] bg-white rounded-md  py-[25px]  ">
                        <div>
                            <h1 class="text-black text-left pb-1 pl-2 text-lg font-[700] ">Les Clients récents : </h1>
                        </div>
                        <div class=" flex items-center justify-start pb-2 border-b-[1px]  px-[10px] py-[15px] "
                            v-for="client in clients" :key="client.id">
                            <div>
                                <img v-if="client.image != null" class="rounded-[50%] w-[55px] h-[55px] "
                                    :src="`http://localhost:8000/storage/${client.image}`" alt="">
                                <p v-else
                                    class="bg-slate-200 flex justify-center items-center h-[55px] w-[55px] p-2 rounded-[50%] cursor-pointer ">
                                    <i class="fa-solid fa-user text-xl text-black "></i>
                                </p>
                            </div>
                            <div class="text-start ml-2">
                                <p class="text-md text-gray-800 font-[600]">{{ client?.nom?.toUpperCase() + " " +
                                    client?.prenom?.toUpperCase() }}</p>
                                <p class="text-sm text-blue-400">{{ client?.email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { DASHBOARD_DATA } from "@/api/api"
import EnvoyerForm from "@/mixins/EnvoyerForm";
export default {
    emits: ["changeLienEmit"],
    mixins: [EnvoyerForm],
    data() {
        return {
            demandes: null,
            clients: [],
            contrats: [],
            rendezVous: [],
            projets: null,

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
        await this.envoyer(null, "get", DASHBOARD_DATA, null, false)

        if (this.returnData) {
            this.demandes = this.returnData.nbrDemandes
            this.clients = this.returnData.Clients?.slice(0, 4);
            const tousContrats = this.returnData.Contrats
            this.contrats = tousContrats.filter(it => it.date.split(' ')[0] == formattedDate);
            this.rendezVous = this.returnData.Rendezvous?.filter(it => it.date.split(' ')[0] == formattedDate);
            this.projets = this.returnData.nbrProjets

            this.statiques = [{ titre: 'Clients', logo: 'fa-solid fa-user-secret', number: this.clients?.length },
            { titre: 'Demandes', logo: 'fa-solid fa-code-pull-request', number: this.demandes },
            { titre: 'Contrats', logo: 'fa-solid fa-file-signature', number: tousContrats?.length },
            { titre: 'Projets', logo: 'fa-solid fa-diagram-project', number: this.projets },]
        }
    },
}
</script>