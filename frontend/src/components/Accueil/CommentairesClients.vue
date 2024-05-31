<template>
    <div class="w-full pt-[20px] pb-[40px] px-[8%] border-t-4 border-black">
        <h1 class="text-center pt-[2%] mb-[60px] relative text-[40px] font-[700]">Commentaires</h1>
        <div class="flex flex-wrap justify-center">
            <div>
                <button @click="scrollCommentaire(-1)">retourne</button>
            </div>

            <div class="w-[48%] flex flex-col bg-gray-50 m-3 p-[15px] shadow-md shadow-slate-300 ">
                <div class=" flex items-center justify-start py-[5px] ">
                    <img v-if="commentaireAafficher?.userImage != null" class="rounded-[50%] w-[30px] h-[30px] "
                        :src="`http://localhost:8000/storage/${commentaireAafficher?.userImage}`" alt="">
                    <p v-else
                        class="bg-slate-200 flex justify-center items-center h-[70px] w-[70px] p-2 rounded-[50%] cursor-pointer "
                        @click="toggleDropdown">
                        <i class="fa-solid fa-user text-2xl"></i>
                    </p>
                    <div class="text-start ml-2">
                        <p class="text-lg text-gray-800 font-[600]">{{ commentaireAafficher?.userNom + " " +
                            commentaireAafficher?.userPrenom }}</p>
                        <p class="text-sm text-gray-400">{{ commentaireAafficher?.userEmail }}</p>
                    </div>
                </div>
                <div class="text-start p-2 mt-1 ">
                    <p> {{ commentaireAafficher?.text }} </p>
                </div>
            </div>

            <div>
                <button @click="scrollCommentaire(1)" >suivant</button>
            </div>
        </div>
    </div>
</template>

<script>
import { TOUS_COMMENTAIRES } from "@/api/api"
import EnvoyerForm from "@/mixins/EnvoyerForm"
export default {
    mixins: [EnvoyerForm],
    data() {
        return {
            commentaires: [],
            commentIndex: 0,
            commentaireAafficher: null
        }
    },
    methods: {
        async recevoirCommentaires() {
            await this.envoyer(null, "get", TOUS_COMMENTAIRES, null, false)
            this.commentaires = this.returnData
            this.commentaireAafficher = this.commentaires[this.commentIndex]
        },
        scrollCommentaire(valeur) {
            this.commentIndex += valeur 
            if (this.commentIndex < 0) this.commentIndex = this.commentaires.length-1
            if (this.commentIndex > this.commentaires.length - 1) this.commentIndex = 0
            this.commentaireAafficher = this.commentaires[this.commentIndex]
        }
    },
    async mounted() {
        await this.recevoirCommentaires()
    },
}
</script>

<style scoped>
h1::after {
    content: "";
    background: rgb(147, 197, 253);
    width: 100px;
    height: 5px;
    position: absolute;
    bottom: -1px;
    left: 50%;
    transform: translateX(-50%);
}
</style>