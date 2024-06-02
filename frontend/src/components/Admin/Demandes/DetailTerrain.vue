<template>
    <div class="absolute left-1/2 top-[50%] -translate-x-1/2 -translate-y-1/2 w-[45%] h-max ">

        <!-- Component pour la confirmation de accepter ou refuser la demande -->
        <ConfirmationComp v-if="afficheConfirmationComp == true"
            @changerVisibilite="afficheConfirmationComp = false; emitsButtonFermer()" :terrainId="terrain.id"
            :statut="statut" :api="api" />



        <div class="w-full h-full bg-slate-100 text-left rounded-xl p-[20px] ">
            <!-- si le terrain n'est pas ajouté -->
            <div v-if="terrain == null">
                <p>Le terrain n' est pas encore ajouté </p>
                <div class="mt-4 flex justify-end ">
                    <button type=" button" @click="emitsButtonFermer()"
                        class="text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 ">Fermer</button>
                </div>
            </div>
            <!-- si le terrain est ajouté -->
            <div v-else>
                <div class="">
                    <div class="my-[15px]">
                        <span class="font-[700] text-blue-400">Adresse du terain : </span>
                        <span class="text-[16px] tracking-[0.3px]">{{ terrain.adresse }}</span>
                    </div>
                    <div class="flex items-center justify-start space-x-[20px] my-[15px]">
                        <div>
                            <span class="font-[700] text-blue-400">Largeur du terrain : </span>
                            <span> {{ terrain.largeur }} m </span>
                        </div>
                        <div>
                            <span class="font-[700] text-blue-400">Longeur du terrain : </span>
                            <span> {{ terrain.longeur }} m </span>
                        </div>
                    </div>

                    <!-- div des images -->
                    <div class="flex flex-wrap items-center justify-start">
                        <div class="h-[180px] w-[45%] m-2 rounded-md" v-for="(image, i) in terrain.images_terrain" :key="i">
                            <img :src="`http://localhost:8000/storage/${image.chemin}`" class="object-cover h-full w-full rounded-md " alt="...">
                        </div>
                    </div>
                </div>
                <div :class="`${terrain.accepte != null ? 'justify-end' : 'justify-between'}`"
                    class="mt-[30px] flex items-center px-[10px]">
                    <div v-if="terrain.accepte == null" class="space-x-[15px] ">
                        <button type="button" title="accepter" @click="buttonClick(true, 1)"
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
    </div>
</template>


<script>
import EnvoyerForm from "@/mixins/EnvoyerForm"
import { EDIT_STATUT_TERRAIN } from "@/api/api"
import ConfirmationComp from "@/components/Admin/Demandes/ConfirmationComp"

export default {
    props: {
        terrain: {
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
            api: EDIT_STATUT_TERRAIN
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