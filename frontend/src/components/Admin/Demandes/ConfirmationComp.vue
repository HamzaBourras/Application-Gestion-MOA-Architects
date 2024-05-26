        <!-- J'ai utilisé ce component pour confirmer la modification du statut de lademande et du terrain   -->

<template>
    <div class="absolute z-4 left-1/2 top-[40%] -translate-x-1/2 -translate-y-1/2 w-[90%] h-max ">
        <div class="w-full h-full bg-slate-200 text-left rounded-xl py-[30px] px-[20px]">
            <div class="w-[85%] mx-auto " v-if="message != null || this.errorAction != null">
                <MessAgeComponent :message="message" :errorAction="errorAction" />
            </div>
            <div class="pl-[20px] mt-[10px]">
                <p v-if="demandeId != null" class="font-[500]"> Voulez-vous vraiment {{ `${statut == 1 ? "accepter" :
                    "refuser"}` }} cette demande ? </p>
                <p v-if="terrainId != null" class="font-[500]"> Voulez-vous vraiment {{ `${statut == 1 ? "accepter" :
                    "refuser"}` }} ce terrain ? </p>
                <p v-if="contratId != null" class="font-[500]"> Voulez-vous vraiment segner ce contrat ? </p>
            </div>
            <div class="flex justify-end mt-[40px]">
                <button type="button" @click="changeStatutDemande()"
                    class="w-[120px]  text-white bg-black hover:bg-black focus:outline-none focus:ring-2 focus:ring-black font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Oui</button>
                <button type="button" @click="emitsButtonNon()"
                    class="w-[120px] text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Non</button>
            </div>
        </div>
    </div>
</template>


<script>
import EnvoyerForm from "@/mixins/EnvoyerForm"
import MessAgeComponent from "@/components/MessAge.vue"

export default {
    mixins: [EnvoyerForm],
    emits: ["changerVisibilite",],
    components: {
        MessAgeComponent
    },
    props: {
        demandeId: {
            type: Number
        },
        terrainId: {
            type: Number
        },
        contratId: {
            type: Number
        },
        statut: {  // pour savoir est ce que le demande est accepté (1) ou refusé (0)
            type: Number
        },
        api: {
            type: String
        }

    },
    methods: {
        emitsButtonNon() {
            this.$emit('changerVisibilite');  // pour cacher le component contient les buttons (ce component)
        },

        async changeStatutDemande() {
            const id = this.demandeId != null ? this.demandeId : (this.terrainId != null ? this.terrainId : this.contratId)
            await this.envoyer({ statut: this.statut }, "put", this.api, id, false)

            setTimeout(() => {
                this.emitsButtonNon()  // pour cacher ce component
            }, 3002);
        }
    },
}

</script>