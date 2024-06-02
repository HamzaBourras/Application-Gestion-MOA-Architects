<template>
    <div class="relative h-[86.7vh]">

        <div v-if="length != null && length == 0" class="text-white py-4 pl-8 text-left">
            <p class="text-lg">Pas de rendez-vous à afficher !</p>
        </div>

        <div class="flex flex-wrap items-center justify-around mt-[30px] ">
            <div v-for="rendezVous in tousRendezVous" :key="rendezVous.id"
                class="flex flex-col justify-between bg-slate-50 h-[250px] m-3 py-[20px] px-[30px]  w-[30%] text-left">
                <div class="space-y-[20px] w-full">
                    <p class="font-bold text-xl text-center"> {{ `Rendez-vous N° : ${rendezVous.id}`.toUpperCase() }}
                    </p>
                    <div>
                        <span class="font-semibold">Client : </span>
                        <p class="inline font-[500]">{{ rendezVous.user.toUpperCase() }}</p>
                    </div>
                    <div>
                        <span class="font-semibold">Date de rendez-vous : </span>
                        <p class="inline font-[500]">{{ rendezVous.date.split(' ')[0] }}</p>
                    </div>
                    <div>
                        <span class="font-semibold">Temps de rendez-vous : </span>
                        <p class="inline font-[500]">{{ rendezVous.date.split(' ')[1] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { TOUS_RENDEZVOUS } from "@/api/api.js"
import EnvoyerForm from "@/mixins/EnvoyerForm"

export default {
    mixins: [EnvoyerForm],
    data() {
        return {
            tousRendezVous: [],
            length: null, // la taille dyu tableau mesDemandes
        }
    },
    methods: {
        async recevoirRendezVous() {
            await this.envoyer(null, "get", TOUS_RENDEZVOUS, null, false)
            this.tousRendezVous = this.returnData
            this.length = this.tousRendezVous?.length
        },

    },
    async mounted() {
        await this.recevoirRendezVous()
    }
}
</script>