<template>
    <div class="absolute left-1/2 top-[40%] -translate-x-1/2 -translate-y-1/2 w-[45%] h-max ">
        <div class="w-full h-full bg-slate-100 text-left rounded-xl py-[20px]">
            <div class="w-[85%] mx-auto " v-if="message != null || errorAction != null">
                <MessAgeComponent :message="message" :errorAction="errorAction" />
            </div>
            <form class="w-[85%] mt-[10px] mx-auto" @submit.prevent="ajouterContrat">
                <div class="mt-4">
                    <label for="date" class="block mb-2 text-md font-medium text-gray-900 ">Date de signature du
                        contrat</label>
                    <input type="datetime-local" id="date" v-model="contrat.date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <p class="text-sm text-red-500 mt-1" v-if="errors?.date"><span v-for="(error, i) in errors?.date"
                            :key="i">{{ error }} </span></p>
                </div>
                <div class="mt-5 flex justify-end">
                    <input type="submit" value="Ajouter" class=" cursor-pointer text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4
                        focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">
                    <button type=" button" @click="emitsButtonAnnuler()"
                        class="text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
import { INSERER_CONTRAT } from "@/api/api.js";
import EnvoyerForm from "@/mixins/EnvoyerForm"
import MessAgeComponent from "@/components/MessAge.vue"

export default {
    props: {
        demandeId: {
            type: Number
        }
    },
    emits: ["changerVisibilite", "mettreAjourTousDemandes"],
    mixins: [EnvoyerForm],
    components: {
        MessAgeComponent
    },
    data() {
        return {
            contrat: {
                date: ""
            },
        }
    },
    methods: {
        emitsButtonAnnuler() {
            this.$emit('changerVisibilite');  // pour cacher le component contient le form (ce component)
            this.contrat = {}
        },

        async ajouterContrat() {
            await this.envoyer(this.contrat, "post", INSERER_CONTRAT, this.demandeId, false)

            if (this.message != null) {
                setTimeout(() => {
                    this.emitsButtonAnnuler()
                    this.$emit('mettreAjourTousDemandes'); // pour recharger tous les demandes lorsque une nouveau est ajouté
                }, 1502);
            }
        }
    },
}
</script>