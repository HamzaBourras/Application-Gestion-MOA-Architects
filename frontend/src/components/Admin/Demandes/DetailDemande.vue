<template>
    <div class="absolute left-1/2 top-[40%] -translate-x-1/2 -translate-y-1/2 w-[45%] h-max ">

        <!-- Component pour la confirmation de accepter ou refuser la demande -->
        <ConfirmationComp v-if="afficheConfirmationComp == true" @changerVisibilite="afficheConfirmationComp = false; emitsButtonFermer()"
            :demandeId="demande.id" :statut="statut" />

        <div class="w-full h-full bg-slate-100 text-left rounded-xl p-[20px] ">
            <div class="">
                <h1 class="font-[900] text-2xl mb-[25px] text-blue-600">DEMANDE N° {{ numeroDemande }}</h1>
                <div class="my-[15px]">
                    <span class="font-[700] text-blue-400">Titre de la demande : </span>
                    <span class="text-[16px] tracking-[0.3px]">{{ demande.nom_projet }}</span>
                </div>
                <div class="flex items-center justify-start space-x-[20px] my-[15px]">
                    <div>
                        <span class="font-[700] text-blue-400">User : </span>
                        <span> {{ demande.userNom + " " + demande.userPrenom }} </span>
                    </div>
                    <div>
                        <span class="font-[700] text-blue-400">Type : </span>
                        <span> {{ demande.type }} </span>
                    </div>
                </div>
                <div class="my-[15px]">
                    <span class="font-[700] text-blue-400">Date de création : </span>
                    <span> {{ demande.date }} </span>
                </div>
                <div class="my-[15px]">
                    <span class="font-[700] text-blue-400 mb-1 block">Description : </span>
                    <span> {{ demande.description }} </span>
                </div>
            </div>
            <div :class="`${demande.accepte != null ? 'justify-end' : 'justify-between'}`"
                class="mt-[30px] flex items-center px-[10px]">
                <div v-if="demande.accepte == null" class="space-x-[15px] ">
                    <button type="button" title="accepter" @click="buttonClick(true,1)"
                        class="focus:outline-none text-white bg-green-500 hover:bg-green-700 focus:ring-2 focus:ring-green-400 font-medium rounded-lg px-3.5 py-1 text-lg"><i
                            class="fa-solid fa-check"></i></button>
                    <button type="button" title="refuser" @click="buttonClick(true, 0)"
                        class="focus:outline-none text-white bg-red-500 hover:bg-red-700 focus:ring-2 focus:ring-red-400 font-medium rounded-lg px-3.5 py-1 text-lg">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div>
                    <button type=" button" @click="emitsButtonFermer()"
                        class="text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 ">Fermer</button>
                </div>
            </div>

        </div>
    </div>
</template>


<script>
import EnvoyerForm from "@/mixins/EnvoyerForm"
import ConfirmationComp from "@/components/Admin/Demandes/ConfirmationComp"

export default {
    props: {
        demande: {
            type: Object
        },
        numeroDemande: {
            type: Number
        }
    },
    emits: ["changerVisibilite","mettreAjourTousDemandes"],
    mixins: [EnvoyerForm],
    components: {
        ConfirmationComp
    },
    data() {
        return {
            afficheConfirmationComp: false,  // pour controler l'affichage du component de confirmation
            statut: null, // accepter ou refuser
        }
    },
    methods: {
        emitsButtonFermer() {
            this.$emit("changerVisibilite")  // pour cacher le component contient les details de la demande
            this.$emit('mettreAjourTousDemandes'); // pour recharger tous les demandes lorsque une demande est modifié
        },
        buttonClick(afficheConfirmation, statut) {
            this.afficheConfirmationComp = afficheConfirmation;  // pour afficher le component de confirmation après le click sur accepter ou refuser 
            this.statut = statut 
        }
    },

}
</script>