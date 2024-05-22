<template>
    <div class="relative h-[86.7vh]">
        <div v-if="length != null && length == 0" class=" py-4 pl-8 text-left">
            <p class="text-lg">Ils n'y a pas des demandes à afficher</p>
        </div>

        <div class="flex flex-wrap items-center justify-around pt-[30px] px-[10px] ">
            <div v-for="(demande,i) in demandesDesClients" :key="demande.id"
                class="bg-slate-50 text-justify m-3 py-[20px] px-[30px] space-y-[20px] w-[30%]">
                <p class="font-bold text-xl text-center"> {{ `demande N° ${i+1}`.toUpperCase() }} </p>
                <div>
                    <span class="font-semibold">Titre du projet : </span>
                    <p class="inline font-[500]">{{ demande.nom_projet }}</p>
                </div>
                <div>
                    <span class="font-semibold">User : </span>
                    <p class="inline font-[500]">{{`${demande.userNom} ${demande.userPrenom}`}}</p>
                </div>
                <div class=" space-x-3">
                    <button type="button"
                        class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Detail</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import EnvoyerForm from "@/mixins/EnvoyerForm"
import { TOUS_DEMANDES } from "@/api/api"

export default {
    mixins: [EnvoyerForm],
    data() {
        return {
            demandesDesClients: [],
            length: null // la taille du tableau demandesDesClients
        }
    },
    methods: {
        async recevoirDemandes() {
            await this.envoyer(null, "get", TOUS_DEMANDES, null)
            this.demandesDesClients = this.returnData
            this.length = this.demandesDesClients?.length
        }
    },
    async mounted() {
        await this.recevoirDemandes()
    }
}
</script>