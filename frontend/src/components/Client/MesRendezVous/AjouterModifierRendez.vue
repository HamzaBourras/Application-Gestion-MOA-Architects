<template>
    <div class="absolute left-1/2 top-[40%] -translate-x-1/2 -translate-y-1/2 w-[45%] h-max ">
        <div class="w-full h-full bg-slate-100 text-left rounded-xl py-[20px]">
            <div class="w-[85%] mx-auto " v-if="message != null || this.errorAction != null">
                <MessAgeComponent :message="message" :errorAction="errorAction" />
            </div>
            <form class="w-[85%] mt-[10px] mx-auto" @submit.prevent="ajouterModifierRendezVous">
                <div class="mt-4">
                    <label for="date" class="block mb-2 text-md font-medium text-gray-900 ">Date du
                        rendez-vous</label>
                    <input type="datetime-local" id="date" v-model="rendezVous.date"
                        value="{{rendezVousSelectione.date ? rendezVousSelectione.date : '' }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <p class="text-sm text-red-500 mt-1" v-if="errors?.date"><span v-for="(error, i) in errors?.date"
                            :key="i">{{ error }} </span></p>
                </div>
                <div class="mt-5 flex justify-end">
                    <input type="submit" :value="action == 'modifier' ? 'Modifier' : 'Ajouter'" class=" cursor-pointer text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4
                        focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">
                    <button type=" button" @click="emitsButtonAnnuler()"
                        class="text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
import { INSERER_RENDEZVOUS } from "@/api/api.js";
import { MODIFIER_RENDEZVOUS } from "@/api/api.js";
import EnvoyerForm from "@/mixins/EnvoyerForm"
import MessAgeComponent from "@/components/MessAge.vue"

export default {
    props: {
        rendezVousSelectione: {
            type: Object
        },
        action: {
            type: String
        }
    },
    emits: ["changerVisibilite", "mettreAjourRendezVous", "effacerDonnees"],
    mixins: [EnvoyerForm],
    components: {
        MessAgeComponent
    },
    data() {
        return {
            rendezVous: {
                date: ""
            }
        }
    },
    methods: {
        emitsButtonAnnuler() {
            this.$emit('changerVisibilite');  // pour cacher le component contient le form (ce component)
            this.$emit('effacerDonnees') // pour effacer le contenu de rendez-vous selectione
            this.rendezVous = {}
        },

        async ajouterModifierRendezVous() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id;
            const rendezVousId = this.rendezVousSelectione[0]?.id;
            const method = this.action == "modifier" ? "put" : "post";
            const api = this.action == "modifier" ? MODIFIER_RENDEZVOUS : INSERER_RENDEZVOUS;
            const idsRequete = this.action == "modifier" ? rendezVousId : user_id;

            await this.envoyer(this.rendezVous, method, api, idsRequete, false)
            if (this.rendezVousSelectione == {}) this.rendezVous = {};

            if (this.message != null) {
                setTimeout(() => {
                    this.emitsButtonAnnuler()
                    this.$emit('mettreAjourRendezVous'); // pour recharger tous les demandes lorsque une nouveau est ajouté
                }, 3002);
            }

            console.log(this.returnData);
        }
    },
    mounted() {
        this.rendezVous.date = this.action == "modifier" ? this.rendezVousSelectione[0]?.date : ""
    }
}
</script>