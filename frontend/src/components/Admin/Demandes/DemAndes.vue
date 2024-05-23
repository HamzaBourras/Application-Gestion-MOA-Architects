<template>
    <div class="relative h-[86.7vh]">
        <div v-if="length != null && length == 0" class=" py-4 pl-8 text-left">
            <p class="text-lg">Ils n'y a pas des demandes à afficher</p>
        </div>

        <!-- Component pour les details de la demande -->
        <DetailDemande v-if="afficheCompDetail == true" @changerVisibilite="afficheCompDetail = false"
            @mettreAjourTousDemandes="recevoirDemandes" :demande="demandeSelectione" :numeroDemande="numeroDemande" />

        <div class="flex flex-wrap items-center justify-around pt-[30px] px-[10px] ">
            <div v-for="(demande, i) in demandesDesClients" :key="demande.id"
                class="bg-slate-50 text-justify m-3 py-[20px] px-[30px] space-y-[20px] w-[30%]">
                <p class="font-bold text-xl text-center"> {{ `demande N° ${i + 1}`.toUpperCase() }} </p>
                <div>
                    <span class="font-semibold">Titre de la demande : </span>
                    <p class="inline font-[500]">{{ demande.nom_projet }}</p>
                </div>
                <div>
                    <span class="font-semibold">User : </span>
                    <p class="inline font-[500]">{{ `${demande.userNom} ${demande.userPrenom}` }}</p>
                </div>
                <div>
                    <span class="font-semibold">statut : </span>
                    <p class="inline text-blue-500 font-[500]" v-if="demande.accepte == null">En cours ...</p>
                    <p class="inline text-green-500 font-[500]" v-else-if="demande.accepte == 1">Accepté <i
                            class="fa-solid fa-check"></i> </p>
                    <p class="inline text-red-500 font-[500]" v-else>Refusé <i class="fa-solid fa-xmark"></i></p>
                </div>
                <div class=" space-x-3 flex items-center justify-between">
                    <button type="button" @click="selectionnerDemande(demande.id, i + 1)"
                        class="focus:outline-none border-2 border-blue-500 bg-white text-blue-600  hover:bg-blue-50 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        Detail </button>
                    <button type="button" v-if="demande.accepte == 1"
                        class="focus:outline-none text-white border-2 border-blue-500 bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Voir terrain</button>
                    <button type="button" v-if="demande.accepte == 0"
                        class="focus:outline-none text-white border-2 border-red-500 bg-red-500 hover:bg-red-600 focus:ring-2 focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Supprimer</button>

                </div>
            </div>
        </div>
    </div>
</template>


<script>
import EnvoyerForm from "@/mixins/EnvoyerForm"
import { TOUS_DEMANDES } from "@/api/api"
import DetailDemande from "@/components/Admin/Demandes/DetailDemande"

export default {
    mixins: [EnvoyerForm],
    data() {
        return {
            demandesDesClients: [],
            length: null, // la taille du tableau demandesDesClients
            afficheCompDetail: false, // pour controler l'affichage du div des details

            demandeSelectione: {}, // demande séléctionné pour afficher ces details
            numeroDemande: null // numéro de la demande séléctionné
        }
    },
    components: {
        DetailDemande
    },
    methods: {
        async recevoirDemandes() {
            await this.envoyer(null, "get", TOUS_DEMANDES, null)
            this.demandesDesClients = this.returnData
            // enregistrer tous les demnades 
            localStorage.setItem("tousDemandes", JSON.stringify(this.demandesDesClients))
            this.length = this.demandesDesClients?.length
        },
        selectionnerDemande(demandeId, numeroDemande) {
            const tousDemandes = JSON.parse(localStorage.getItem("tousDemandes"))
            const demandeSelectione = tousDemandes.filter(it => it.id == demandeId)

            this.demandeSelectione = demandeSelectione["0"];
            this.numeroDemande = numeroDemande
            this.afficheCompDetail = true
        }
    },
    async mounted() {
        await this.recevoirDemandes()
    }
}
</script>