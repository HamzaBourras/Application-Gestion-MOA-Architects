<template>
    <div class="absolute left-1/2 top-[40%] -translate-x-1/2 -translate-y-1/2 w-[45%] h-max ">
        <div class="w-full h-full bg-slate-100 text-left rounded-xl py-[20px]">
            <div class="w-[85%] mx-auto " v-if="message != null || this.errorAction != null">
                <MessAgeComponent :message="message" :errorAction="errorAction" />
            </div>
            <form class="w-[85%] mt-[10px] mx-auto" @submit.prevent="ajouterDemande">
                <div class="mt-4">
                    <label for="nom-projet" class="block mb-2 text-md font-medium text-gray-900 ">Nom du
                        projet</label>
                    <input type="text" id="nom-projet" v-model="demande.nom_projet"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <p class="text-sm text-red-500 mt-1" v-if="errors?.nom_projet"><span
                            v-for="(error, i) in errors?.nom_projet" :key="i">{{ error }} </span></p>
                </div>
                <div class="mt-6">
                    <label for="countries" class="block mb-2 text-md font-medium text-gray-900">Choisissez le
                        type</label>
                    <select id="countries" v-model="demande.type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 ">

                        <option>Concour</option>
                        <option>Consultation</option>
                        <option>Villa</option>
                        <option>Projet-diver</option>
                    </select>
                    <p class="text-sm text-red-500 mt-1" v-if="errors?.type"><span v-for="(error, i) in errors?.type"
                            :key="i">{{ error }} </span></p>
                </div>
                <div class="mt-6">
                    <label for="message" class="block mb-2 text-md font-medium text-gray-900 ">Description</label>
                    <textarea id="message" rows="5" v-model="demande.description"
                        class="block p-2.5 w-full resize-none text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "></textarea>
                    <p class="text-sm text-red-500 mt-1" v-if="errors?.description"><span
                            v-for="(error, i) in errors?.description" :key="i">{{ error }} </span></p>
                </div>
                <div class="mt-5 flex justify-end">
                    <input type="submit" value="Ajouter"
                        class="cursor-pointer text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">
                    <button type="button" @click="emitsButtonAnnuler"
                        class="text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
import { INSERER_DEMANDE } from "@/api/api.js";
import EnvoyerForm from "@/mixins/EnvoyerForm"
import MessAgeComponent from "@/components/MessAge.vue"

export default {
    emits: ["changerVisibilite","mettreAjourDemandes"],
    mixins: [EnvoyerForm],
    components: {
        MessAgeComponent
    },
    data() {
        return {
            demande: {
                nom_projet: "",
                type: "",
                description: ""
            }
        }
    },
    methods: {
        emitsButtonAnnuler() {
            this.$emit('changerVisibilite');
            this.$emit('mettreAjourDemandes');
        },

        async ajouterDemande() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id
            await this.envoyer(this.demande, "post", INSERER_DEMANDE, user_id)
            this.demande = {};
        }
    }
}
</script>