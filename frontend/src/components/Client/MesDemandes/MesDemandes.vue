<template>
    <div class="relative h-[86.7vh]">
        <div class="py-[15px] pr-[20px] flex justify-end h-[10vh] ">
            <button @click="affichedivAjouter = true" :class="affichedivAjouter ? 'hidden' : 'block'"
                class="bg-blue-600 h-max text-white w-[150px] py-2 px-3.5 rounded-[10px] font-[600] tracking-[0.5px] hover:bg-blue-500 duration-300">Ajouter
                <i class="fa-solid fa-plus ml-2"></i>
            </button>
        </div>

        <div :class="!affichedivAjouter ? 'hidden' : 'block'">
            <AjouterDemande @changerVisibilite="affichedivAjouter = false" @mettreAjourDemandes="recevoirDemandes" />
        </div>

        <div v-if="mesDemandes.length == 0" class=" py-4 pl-8 text-left">
            <p class="text-lg">Vous n'avez pas des demandes à afficher</p>
        </div>
        <div class="flex items-center">
            <div v-for="demande in mesDemandes" :key="demande.id"
                class="bg-slate-50 m-3 py-[20px] px-[30px] space-y-[20px]">
                <p class="font-bold text-xl"> {{ demande.nom_projet.toUpperCase() }} </p>
                <div>
                    <span class="font-semibold">statut : </span>
                    <p class="inline text-blue-500 font-[500]" v-if="demande.accepter == null">En cours ...</p>
                    <p class="inline text-green-500 font-[500]" v-else-if="demande.accepter == 1">Accepté <i
                            class="fa-solid fa-check"></i> </p>
                    <p class="inline text-red-500 font-[500]" v-else>Refusé <i class="fa-solid fa-xmark"></i></p>

                </div>
                <div class=" space-x-3">
                    <button
                        class="border-2 border-red-500 text-black w-[120px] py-1 px-3 rounded-[5px] font-[400] tracking-[0.5px] hover:bg-red-600 hover:text-white duration-300 ">supprimer</button>
                    <button
                        class="border-2 border-green-600 bg-green-600 text-white w-[120px] py-1 px-3 rounded-[5px] font-[400] tracking-[0.5px] hover:bg-inherit hover:text-black  duration-300 ">modifier</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script >
import { TOUS_DEMANDES_CLIENT } from "@/api/api.js"
import RecevoirData from "@/mixins/RecevoirData"
import AjouterDemande from "@/components/Client/MesDemandes/AjouterDemande"

export default {
    mixins: [RecevoirData],
    components: {
        AjouterDemande
    },
    data(){
        return {
            mesDemandes: [],
            affichedivAjouter: false
        }
    },
    methods: {
        async recevoirDemandes() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id
            await this.recevoir(TOUS_DEMANDES_CLIENT, user_id)
            this.mesDemandes = this.data
        }
    },
    async mounted() {
        await this.recevoirDemandes()
    }
}
</script>