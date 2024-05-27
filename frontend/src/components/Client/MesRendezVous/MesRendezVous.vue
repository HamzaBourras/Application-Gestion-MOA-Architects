<template>
    <div class="relative h-[86.7vh]">
        <div class="py-[15px] pr-[20px] flex justify-end h-[12vh] ">
            <button @click="afficheCompAjouterModifier = true; action = 'ajouter'"
                :class="afficheCompAjouterModifier ? 'hidden' : 'block'"
                class="bg-blue-600 h-max text-white w-[150px] py-2.5 px-3 rounded-[10px] font-[600] tracking-[0.5px] hover:bg-blue-500 duration-300">Ajouter
                <i class="fa-solid fa-plus ml-2"></i>
            </button>
        </div>
        <!-- Component pour ajouter ou modifier un rendez-vous  -->
        <AjouterModifierRendez v-if="afficheCompAjouterModifier" @changerVisibilite="afficheCompAjouterModifier = false"
            @mettreAjourRendezVous="recevoirRendezVous" @effacerDonnees="rendezVousSelectione = {}"
            :rendezVousSelectione="rendezVousSelectione" :action="action" />
        <!-- Component pour supprimer un rendez-vous -->
        <SupprimerRendezVous v-if="afficheCompSupprimer" @changerVisibilite="afficheCompSupprimer = false"
            @mettreAjourRendezVous="recevoirRendezVous" :rendezVousSupprimerId="rendezVousSupprimerId" />

        <div v-if="length != null && length == 0" class=" py-4 pl-8 text-left">
            <p class="text-lg">Vous n'avez pas des rendez-vous à afficher</p>
        </div>

        <div class="flex flex-wrap items-center justify-around ">
            <div v-for="rendezVous in mesRendezVous" :key="rendezVous.id"
                class="flex flex-col justify-between bg-slate-50 h-[300px] m-3 py-[20px] px-[30px]  w-[30%] text-left">
                <div class="space-y-[20px] w-full">
                    <p class="font-bold text-xl text-center"> {{ `Rendez-vous N° : ${rendezVous.id}`.toUpperCase() }}
                    </p>
                    <div>
                        <span class="font-semibold">Date de rendez-vous : </span>
                        <p class="inline font-[500]">{{rendezVous.date.split(' ')[0]}}</p>
                    </div>
                    <div>
                        <span class="font-semibold">Temps de rendez-vous : </span>
                        <p class="inline font-[500]">{{ rendezVous.date.split(' ')[1] }}</p>
                    </div>
                </div>
                <!-- buttons de modification ou de suppression de rendez-vous -->
                <div class=" space-x-3 flex items-center justify-center">
                    <button @click="rendezVousSupprimerId = rendezVous.id; afficheCompSupprimer = true"
                        class="border-2 border-red-500 text-black w-[120px] py-2 px-3 rounded-[5px] font-[400] tracking-[0.5px] hover:bg-red-600 hover:text-white duration-300 ">supprimer</button>
                    <button @click="selectionnerRendezVous(rendezVous.id)"
                        class="border-2 border-green-600 bg-green-600 text-white w-[120px] py-2 px-3 rounded-[5px] font-[400] tracking-[0.5px] hover:bg-inherit hover:text-black  duration-300 ">modifier</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import { TOUS_MES_RENDEZVOUS } from "@/api/api.js"
import EnvoyerForm from "@/mixins/EnvoyerForm"
import AjouterModifierRendez from './AjouterModifierRendez.vue'
import SupprimerRendezVous from "@/components/Client/MesRendezVous/SupprimerRendezVous"

export default {
    mixins: [EnvoyerForm],
    components: {
        AjouterModifierRendez,
        SupprimerRendezVous
    },
    data() {
        return {
            mesRendezVous: [],
            length: null, // la taille dyu tableau mesDemandes
            afficheCompAjouterModifier: false, // pour controler l'affichage du component pour ajouter ou modifier un rendez-vous
            afficheCompSupprimer: false, // pour controler l'affichage du component pour ajouter un rendez-vous
            action: null, // pour controler si on veut ajouter ou modifier une demande

            rendezVousSelectione: {}, // demande à modifier
            rendezVousSupprimerId: null
        }
    },
    methods: {
        async recevoirRendezVous() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id
            await this.envoyer(null, "get", TOUS_MES_RENDEZVOUS, user_id, false)
            this.mesRendezVous = this.returnData
            this.length = this.mesRendezVous?.length
            // enregistrer les demandes dans localStorage
            localStorage.setItem("mesRendezVous", JSON.stringify(this.mesRendezVous))
        },

        // lorsque je clique sur le button "modifier"
        selectionnerRendezVous(rendezVousId) {
            this.action = 'modifier'
            const tousMesRendeVous = JSON.parse(localStorage.getItem("mesRendezVous"))
            const rendezVousSelectione = tousMesRendeVous.filter(it => it.id == rendezVousId)
            this.rendezVousSelectione = rendezVousSelectione
            this.afficheCompAjouterModifier = true
        },

    },
    async mounted() {
        await this.recevoirRendezVous()
    }
}
</script>