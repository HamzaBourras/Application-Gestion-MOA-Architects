<template>
    <div class="relative h-[86.7vh]">
        <div class="flex flex-wrap items-center justify-around pt-[30px] px-[10px] ">
            <div v-for="contrat in contratsDesClients" :key="contrat.id"
                class=" flex flex-col justify-between bg-slate-50 h-[260px]  m-3 py-[20px] px-[30px] w-[30%]">
                <!-- div des informations -->
                <div class="text-justify w-full space-y-[18px]">
                    <p class="font-bold text-xl text-center"> {{ `contrat N° ${contrat.id}`.toUpperCase() }} </p>
                    <div>
                        <span class="font-semibold">Numero demande : </span>
                        <p class="inline font-[500]">{{ contrat.demande_id }}</p>
                    </div>
                    <div>
                        <span class="font-semibold">Date de signature : </span>
                        <p class="inline font-[500]">{{ contrat.date.split(' ')[0] }}</p>
                    </div>
                    <div>
                        <span class="font-semibold">Temps de signature : </span>
                        <p class="inline font-[500]">{{ contrat.date.split(' ')[1] }}</p>
                    </div>
                    <div>
                        <span class="font-semibold">Segné : </span>
                        <p class="inline text-blue-500 font-[500]" v-if="contrat.segne == 0">Non</p>
                        <p class="inline text-green-500 font-[500]" v-if="contrat.segne == 1">Oui</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import EnvoyerForm from "@/mixins/EnvoyerForm"
import { TOUS_CONTRATS } from '@/api/api'

export default {
    mixins: [EnvoyerForm],
    data() {
        return {
            contratsDesClients: [],
        }
    },
    methods: {
        async recevoirContrats() {
            await this.envoyer(null, "get", TOUS_CONTRATS, null, false)
            this.contratsDesClients = this.returnData
        }
    },
    async mounted() {
        await this.recevoirContrats()
    }
}

</script>