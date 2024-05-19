<template>
    <div class="absolute left-1/2 top-[40%] -translate-x-1/2 -translate-y-1/2 w-[45%] h-max ">
        <div class="w-full h-full bg-slate-100 text-left rounded-xl py-[30px] px-[20px]">
            <div class="w-[85%] mx-auto " v-if="message != null || this.errorAction != null">
                <MessAgeComponent :message="message" :errorAction="errorAction" />
            </div>
            <div class="pl-[20px] mt-[10px]">
                <p class="font-[500]">Voulez-vous vraiment supprimer cette demande ?</p>
            </div>
            <div class="flex justify-end mt-[40px]">
                <button type="button" @click="supprimerDemande"
                    class="w-[120px]  text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Supprimer</button>
                <button type="button" @click="emitsButtonAnnuler"
                    class="w-[120px] text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Annuler</button>
            </div>
        </div>
    </div>
</template>


<script>
import { SUPPRIMER_DEMANDE } from "@/api/api.js"
import EnvoyerForm from "@/mixins/EnvoyerForm"
import MessAgeComponent from "@/components/MessAge.vue"

export default {
    mixins: [EnvoyerForm],
    emits: ["changerVisibilite", "mettreAjourDemandes"],
    components: {
        MessAgeComponent
    },
    props: {
        demandeSupprimerId: {
            type: Number
        }
    },
    methods: {
        async supprimerDemande() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id;
            const demandeId = this.demandeSupprimerId;
            const idsRequete = `${user_id}/${demandeId}`
            await this.envoyer(null, "delete", SUPPRIMER_DEMANDE, idsRequete)

            setTimeout(() => {
                this.emitsButtonAnnuler()
            }, 3002);
        },

        emitsButtonAnnuler() {
            this.$emit('changerVisibilite');  // pour cacher le component contient les buttons (ce component)
            this.$emit('mettreAjourDemandes'); // pour recharger tous les demandes lorsque une demande est supprimé
        },
    },
}

</script>