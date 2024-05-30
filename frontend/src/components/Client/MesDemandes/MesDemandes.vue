<template>
    <div class="relative h-[86.7vh]">
        <div class="py-[15px] pr-[20px] flex justify-end h-[12vh] ">
            <button @click="afficheCompAjouterModifier = true; action = 'ajouter'"
                :class="afficheCompAjouterModifier ? 'hidden' : 'block'"
                class="bg-blue-600 h-max text-white w-[150px] py-2.5 px-3 rounded-[10px] font-[600] tracking-[0.5px] hover:bg-blue-500 duration-300">Ajouter
                <i class="fa-solid fa-plus ml-2"></i>
            </button>
        </div>
        <!-- Component pour ajouter une demande  -->
        <AjouterModifierDemande v-if="afficheCompAjouterModifier" @changerVisibilite="afficheCompAjouterModifier = false"
            @mettreAjourDemandes="recevoirDemandes" @effacerDonnees="demandeSelectione = {}"
            :demandeSelectione="demandeSelectione" :action="action" />
        <!-- Component pour supprimer une demande -->
        <SupprimerDemande v-if="afficheCompSupprimer" @changerVisibilite="afficheCompSupprimer = false"
            @mettreAjourDemandes="recevoirDemandes" :demandeSupprimerId="demandeSupprimerId" />
        <!-- Component pour ajouter un tearrain -->
        <AjouterTerrain v-if="afficheCompTerrain == true" @changerVisibilite="afficheCompTerrain = false"
            @mettreAjourDemandes="recevoirDemandes" :demandeId="demandeId" />
        <!-- Component pour les details du contrat -->
        <DetailTContrat v-if="afficheCompDetailContrat == true" @changerVisibilite="afficheCompDetailContrat = false"
            @mettreAjourTousDemandes="recevoirDemandes" :contrat="contratSelectione" />

        <div v-if="length != null && length == 0" class=" py-4 pl-8 text-left">
            <p class="text-lg">Vous n'avez pas des demandes à afficher</p>
        </div>

        <div class="flex flex-wrap items-center justify-around ">
            <div v-for="demande in mesDemandes" :key="demande.id"
                class="flex flex-col justify-between bg-slate-50 h-[300px] m-3 py-[20px] px-[30px]  w-[30%] text-left">
                <div class="space-y-[20px] w-full">
                    <p class="font-bold text-xl text-center"> {{ demande.nom_projet.toUpperCase() }} </p>
                    <!-- Affichage de statut de la demande -->
                    <div>
                        <span class="font-semibold">statut de la demande : </span>
                        <p class="inline text-blue-500 font-[500]" v-if="demande.accepte == null">En cours ...</p>
                        <p class="inline text-green-500 font-[500]" v-else-if="demande.accepte == 1">Accepté <i
                                class="fa-solid fa-check"></i> </p>
                        <p class="inline text-red-500 font-[500]" v-else>Refusé <i class="fa-solid fa-xmark"></i></p>
                    </div>
                    <!-- Affichage de statut du terrain -->
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
                            <p class="inline text-green-500 font-[500]" v-else-if="demande.contrat?.segne == 1">Segné <i
                                    class="fa-solid fa-check"></i> </p>
                        </div>
                    </div>
                </div>
                <div>
                    <!-- buttons de modification ou de suppression de la demande si ni accepte ni refusé -->
                    <div v-if="demande.accepte == null" class=" space-x-3">
                        <button @click="demandeSupprimerId = demande.id; afficheCompSupprimer = true"
                            class="border-2 border-red-500 text-black w-[120px] py-2 px-3 rounded-[5px] font-[400] tracking-[0.5px] hover:bg-red-600 hover:text-white duration-300 ">supprimer</button>
                        <button @click="selectionnerDemande(demande.id)"
                            class="border-2 border-green-600 bg-green-600 text-white w-[120px] py-2 px-3 rounded-[5px] font-[400] tracking-[0.5px] hover:bg-inherit hover:text-black  duration-300 ">modifier</button>
                    </div>
                    <div v-else-if="demande.accepte == 1">
                        <!-- button pour ajouter le terrain -->
                        <button v-if="demande.terain_ajoute == 0" type="button" @click="buttonAjouterTerrainClick(true, demande.id)"
                            class="focus:outline-none text-white border-2 border-blue-500 bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Ajouter
                            Terrain</button>
                        <!-- button pour voir les details du contrat -->
                        <button v-else-if="demande.contrat_ajoute == 1 && demande.contrat.vu == 0" type="button"
                            @click="selectionnerContrat(demande.id)"
                            class="focus:outline-none text-white border-2 border-blue-500 bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Voir
                            le contrat</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import { TOUS_MES_DEMANDES } from "@/api/api.js"
import EnvoyerForm from "@/mixins/EnvoyerForm"
import AjouterModifierDemande from "@/components/Client/MesDemandes/AjouterModifierDemande"
import SupprimerDemande from "@/components/Client/MesDemandes/SupprimerDemande"
import AjouterTerrain from "@/components/Client/MesDemandes/AjouterTerrain"
import DetailTContrat from "@/components/Client/MesDemandes/DetailContrat"

export default {
    mixins: [EnvoyerForm],
    components: {
        AjouterModifierDemande,
        SupprimerDemande,
        AjouterTerrain,
        DetailTContrat,
    },
    data() {
        return {
            mesDemandes: [],
            length: null, // la taille dyu tableau mesDemandes
            afficheCompAjouterModifier: false, // pour controler l'affichage du component contient le formulaire d'ajout ou modification du demande
            afficheCompSupprimer: false, // pour controler l'affichage du component contient le button de suprimer
            afficheCompTerrain: false, // pour controler l'affichage du component contient le formulaire d'ajout du terrain
            afficheCompDetailContrat: false, // pour controler l'affichage du div des contient les details du contrat
            action: null, // pour controler si on veut ajouter ou modifier une demande

            demandeSelectione: {}, // demande à modifier
            demandeSupprimerId: null, // l'id du demande à supprimer
            contratSelectione: {}, // contrat selectione pour afficher ces details
            demandeId: null,  // l'id du demande pour ajouter le terrain
        }
    },
    methods: {
        async recevoirDemandes() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id
            await this.envoyer(null, "get", TOUS_MES_DEMANDES, user_id, false)
            this.mesDemandes = this.returnData
            this.length = this.mesDemandes?.length
            // enregistrer les demandes dans localStorage
            localStorage.setItem("mesDemandes", JSON.stringify(this.mesDemandes))
        },

        // lorsque je clique sur le button "modifier"
        selectionnerDemande(demandeId) {
            this.action = 'modifier'
            const tousMesDemandes = JSON.parse(localStorage.getItem("mesDemandes"))
            const demandeSelectione = tousMesDemandes.filter(it => it.id == demandeId)
            this.demandeSelectione = demandeSelectione
            this.afficheCompAjouterModifier = true
        },

        // lorsque je clique sur le button Ajouter Terrain
        buttonAjouterTerrainClick(afficheCompTerrain, demandeId) {
            this.afficheCompTerrain = afficheCompTerrain;
            this.demandeId = demandeId
        },
        //lorsque je clique sur button voir contrat
        selectionnerContrat(demandeId) {
            const tousMesDemandes = JSON.parse(localStorage.getItem("mesDemandes"))
            const demandeSelectione = tousMesDemandes.filter(it => it.id == demandeId)

            this.contratSelectione = demandeSelectione["0"].contrat;
            this.afficheCompDetailContrat = true
        }

    },
    async mounted() {
        await this.recevoirDemandes()
    }
}
</script>