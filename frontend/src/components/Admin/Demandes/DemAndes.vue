<template>
    <div class="relative h-[86.7vh]">
        <div v-if="length != null && length == 0" class=" py-4 pl-8 text-left">
            <p class="text-lg">Ils n'y a pas des demandes à afficher</p>
        </div>

        <!-- Component pour les details de la demande -->
        <DetailDemande v-if="afficheCompDetailDemande == true" @changerVisibilite="afficheCompDetailDemande = false"
            @mettreAjourTousDemandes="recevoirDemandes" :demande="demandeSelectione" :numeroDemande="numeroDemande" />
        <!-- Component pour les details du terrain -->
        <DetailTerrain v-if="afficheCompDetailTerrain == true" @changerVisibilite="afficheCompDetailTerrain = false"
            @mettreAjourTousDemandes="recevoirDemandes" :terrain="terrainSelectione" />
        <!-- Component pour l'ajout du contrat -->
        <AjouterContrat v-if="afficheCompAjouterContrat == true" @changerVisibilite="afficheCompAjouterContrat = false"
            @mettreAjourTousDemandes="recevoirDemandes" :demandeId="demandeId" />
        <!-- Component pour les details du contrat -->
        <DetailTContrat v-if="afficheCompDetailContrat == true" @changerVisibilite="afficheCompDetailContrat = false"
            @mettreAjourTousDemandes="recevoirDemandes" :contrat="contratSelectione" />

        <div class="flex flex-wrap items-center justify-around pt-[30px] px-[10px] ">
            <div v-for="(demande, i) in demandesDesClients" :key="demande.id"
                class=" flex flex-col justify-between bg-slate-50 h-[360px]  m-3 py-[20px] px-[30px] w-[30%]">
                <!-- div des informations -->
                <div class="text-justify w-full space-y-[18px]">
                    <p class="font-bold text-xl text-center"> {{ `demande N° ${i + 1}`.toUpperCase() }} </p>
                    <div>
                        <span class="font-semibold">Titre de la demande : </span>
                        <p class="inline font-[500]">{{ demande.nom_projet }}</p>
                    </div>
                    <div>
                        <span class="font-semibold">User : </span>
                        <p class="inline font-[500]">{{ `${demande.userNom} ${demande.userPrenom}` }}</p>
                    </div>
                    <!-- Affichage de statut de la demande -->
                    <div>
                        <span class="font-semibold">statut de la demande : </span>
                        <p class="inline text-blue-500 font-[500]" v-if="demande.accepte == null">En cours ...</p>
                        <p class="inline text-green-500 font-[500]" v-else-if="demande.accepte == 1">Accepté <i
                                class="fa-solid fa-check"></i> </p>
                        <p class="inline text-red-500 font-[500]" v-else>Refusé <i class="fa-solid fa-xmark"></i></p>
                    </div>
                    <!-- Affichage de statut du terain -->
                    <div v-if="demande.accepte == 1">
                        <span class="font-semibold">statut du tearin : </span>
                        <p class="inline text-blue-500 font-[500]" v-if="demande.terrain?.accepte == null">En cours ...
                        </p>
                        <p class="inline text-green-500 font-[500]" v-else-if="demande.terrain?.accepte == 1">Accepté <i
                                class="fa-solid fa-check"></i> </p>
                        <p class="inline text-red-500 font-[500]" v-else>Refusé <i class="fa-solid fa-xmark"></i></p>
                    </div>
                    <!-- Affichage de statut du contrat -->
                    <div v-if="demande.terrain?.accepte == 1">
                        <span class="font-semibold">statut du contrat : </span>
                        <p class="inline text-gray-500 font-[500]" v-if="demande.contrat_ajoute == 0">Non ajouté</p>
                        <div class="inline" v-if="demande.contrat_ajoute == 1">
                            <p class="inline text-gray-500 font-[500]" v-if="demande.contrat.vu == 0">Non vu</p>
                            <p class="inline text-blue-500 font-[500]"
                                v-if="demande.contrat.vu == 1 && demande.contrat?.segne == 0">Non segné</p>
                            <p class="inline text-green-500 font-[500]" v-if="demande.contrat?.segne == 1">Segné <i
                                    class="fa-solid fa-check"></i> </p>
                        </div>
                    </div>
                </div>

                <!-- div des buttons -->
                <div class=" space-x-3 flex items-center justify-between">
                    <!-- button pour afficher les details de la demande -->
                    <button type="button" @click="selectionnerDemande(demande.id, i + 1)"
                        class="focus:outline-none border-2 border-blue-500 bg-white text-blue-600  hover:bg-blue-50 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        Detail </button>
                    <!-- button pour afficher les details du terain -->
                    <button type="button"
                        v-if="demande.accepte == 1 && demande.terain_ajoute == 1 && demande.terrain?.accepte == null"
                        @click="selectionnerTerrain(demande.id)"
                        class="focus:outline-none text-white border-2 border-blue-500 bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Voir
                        terrain</button>
                    <!-- button pour supprimer la demande refusé -->
                    <button type="button" v-if="demande.accepte == 0"
                        class="focus:outline-none text-white border-2 border-red-500 bg-red-500 hover:bg-red-600 focus:ring-2 focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Supprimer</button>
                    <!-- button pour créer le rendez-vous de signature du contrat -->
                    <button type="button" v-if="demande.terrain?.accepte == 1 && demande.contrat_ajoute == 0"
                        @click="buttonRendezVousClick(demande.id)"
                        class="focus:outline-none text-white border-2 border-blue-500 bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        Rendez-vous</button>
                    <!-- button pour afficher les details du contrat -->
                    <button type="button"
                        v-if="demande.accepte == 1 && demande.contrat_ajoute == 1 && demande.contrat?.segne == 0"
                        @click="selectionnerContrat(demande.id)"
                        class="focus:outline-none text-white border-2 border-blue-500 bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Voir
                        Contrat</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import EnvoyerForm from "@/mixins/EnvoyerForm"
import { TOUS_DEMANDES } from "@/api/api"
import DetailDemande from "@/components/Admin/Demandes/DetailDemande"
import DetailTerrain from "@/components/Admin/Demandes/DetailTerrain"
import DetailTContrat from "@/components/Admin/Demandes/DetailContrat"
import AjouterContrat from "@/components/Admin/Demandes/AjouterContrat"

export default {
    mixins: [EnvoyerForm],
    data() {
        return {
            demandesDesClients: [],
            length: null, // la taille du tableau demandesDesClients
            afficheCompDetailDemande: false, // pour controler l'affichage du div des details de la demande
            afficheCompDetailTerrain: false, // pour controler l'affichage du div des details du terrain
            afficheCompAjouterContrat: false, // pour controler l'affichage du div des contient la formulaire pour ajouter lecontrat
            afficheCompDetailContrat: false, // pour controler l'affichage du div des contient les details du contrat

            demandeSelectione: {}, // demande séléctionné pour afficher ces details
            terrainSelectione: {}, // terrain selectione pour afficher ces details
            contratSelectione: {}, // contrat selectione pour afficher ces details
            numeroDemande: null, // numéro de la demande séléctionné
            demandeId: null,
        }
    },
    components: {
        DetailDemande,
        DetailTerrain,
        AjouterContrat,
        DetailTContrat
    },
    methods: {
        async recevoirDemandes() {
            await this.envoyer(null, "get", TOUS_DEMANDES, null, false)
            this.demandesDesClients = this.returnData
            // enregistrer tous les demnades 
            localStorage.setItem("tousDemandes", JSON.stringify(this.demandesDesClients))
            this.length = this.demandesDesClients?.length

        },
        // lorsque je clique sur button detail
        selectionnerDemande(demandeId, numeroDemande) {
            const tousDemandes = JSON.parse(localStorage.getItem("tousDemandes"))
            const demandeSelectione = tousDemandes.filter(it => it.id == demandeId)

            this.demandeSelectione = demandeSelectione["0"];
            this.numeroDemande = numeroDemande
            this.afficheCompDetailDemande = true
        },
        // lorsque je clique sur button voir terrain
        selectionnerTerrain(demandeId) {
            const tousDemandes = JSON.parse(localStorage.getItem("tousDemandes"))
            const demandeSelectione = tousDemandes.filter(it => it.id == demandeId)

            this.terrainSelectione = demandeSelectione["0"].terrain;
            this.afficheCompDetailTerrain = true
        },
        //lorsque je clique sur button rendez-vous pour la création d'un rendez-vous pour le contrat
        buttonRendezVousClick(demandeId) {
            this.demandeId = demandeId
            this.afficheCompAjouterContrat = true
        },
        //lorsque je clique sur button voir contrat
        selectionnerContrat(demandeId) {
            const tousDemandes = JSON.parse(localStorage.getItem("tousDemandes"))
            const demandeSelectione = tousDemandes.filter(it => it.id == demandeId)

            this.contratSelectione = demandeSelectione["0"].contrat;
            this.afficheCompDetailContrat = true
        }
    },
    async mounted() {
        await this.recevoirDemandes()
    }
}
</script>