<template>
    <div class="absolute left-1/2 top-[40%] -translate-x-1/2 -translate-y-1/2 w-[45%] h-max ">

        <!-- Component pour la confirmation de accepter ou refuser la demande -->
        <ConfirmationComp v-if="afficheConfirmationComp == true"
            @changerVisibilite="afficheConfirmationComp = false; emitsButtonFermer()" :contratId="contrat.id"
            :statut="statut" :api="api" />



        <div class="w-full h-full bg-slate-100 text-left rounded-xl p-[20px] ">
            <div class="">
                <div class="my-[15px]">
                    <span class="font-[700] text-blue-400">Date de signature du contrat : </span>
                    <span class="text-[16px] tracking-[0.3px]">{{ contrat.date.split(' ')[0] }}</span>
                </div>
                <div>
                    <span class="font-[700] text-blue-400">Temps : </span>
                    <span> {{ contrat.date.split(' ')[1] }} </span>
                </div>
            </div>
            <div :class="`${contrat.segne != 0 ? 'justify-end' : 'justify-between'}`"
                class="mt-[30px] flex items-center px-[10px]">
                <div v-if="contrat.segne == 0" class="space-x-[15px] ">
                    <button type="button" title="segner" @click="buttonClick(true, 1)"
                        class="focus:outline-none text-white bg-green-500 hover:bg-green-700 focus:ring-2 focus:ring-green-400 font-medium rounded-lg px-3.5 py-1 text-lg"><i
                            class="fa-solid fa-check"></i></button>
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
import { EDIT_STATUT_CONTRAT } from "@/api/api"
import ConfirmationComp from "@/components/Admin/Demandes/ConfirmationComp"

export default {
    props: {
        contrat: {
            type: Object
        },
    },
    emits: ["changerVisibilite", "mettreAjourTousDemandes"],
    mixins: [EnvoyerForm],
    components: {
        ConfirmationComp
    },
    data() {
        return {
            afficheConfirmationComp: false,  // pour controler l'affichage du component de confirmation
            statut: null, // accepter ou refuser
            api: EDIT_STATUT_CONTRAT
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