<template>
    <div class="w-full pt-[20px] pb-[60px] px-[8%] border-t-4 border-black">
        <h1 class="text-center pt-[2%] mb-[60px] relative text-[40px] font-[700]">Commentaires</h1>
        <div class="flex flex-col items-center justify-center ">
            <div class="flex justify-around w-[80%] mx-4 " ref="comments" >
                <div class="w-[48%] flex flex-col bg-gray-50 m-3 p-[15px] shadow-md shadow-slate-300 ">
                    <div class=" flex items-center justify-start py-[5px] ">
                        <img v-if="commentaireAafficher1?.userImage != null" class="rounded-[50%] w-[30px] h-[30px] "
                            :src="`http://localhost:8000/storage/${commentaireAafficher1?.userImage}`" alt="">
                        <p v-else
                            class="bg-slate-200 flex justify-center items-center h-[70px] w-[70px] p-2 rounded-[50%] cursor-pointer "
                            @click="toggleDropdown">
                            <i class="fa-solid fa-user text-2xl"></i>
                        </p>
                        <div class="text-start ml-2">
                            <p class="text-lg text-gray-800 font-[600]">{{ commentaireAafficher1?.userNom + " " +
                                commentaireAafficher1?.userPrenom }}</p>
                            <p class="text-sm text-gray-400">{{ commentaireAafficher1?.userEmail }}</p>
                        </div>
                    </div>
                    <div class="text-start p-2 mt-1 ">
                        <p> {{ commentaireAafficher1?.text }} </p>
                    </div>
                </div>
                <div class="w-[48%] flex flex-col bg-gray-50 m-3 p-[15px] shadow-md shadow-slate-300 ">
                    <div class=" flex items-center justify-start py-[5px] ">
                        <img v-if="commentaireAafficher2?.userImage != null" class="rounded-[50%] w-[30px] h-[30px] "
                            :src="`http://localhost:8000/storage/${commentaireAafficher2?.userImage}`" alt="">
                        <p v-else
                            class="bg-slate-200 flex justify-center items-center h-[70px] w-[70px] p-2 rounded-[50%] cursor-pointer "
                            @click="toggleDropdown">
                            <i class="fa-solid fa-user text-2xl"></i>
                        </p>
                        <div class="text-start ml-2">
                            <p class="text-lg text-gray-800 font-[600]">{{ commentaireAafficher2?.userNom + " " +
                                commentaireAafficher2?.userPrenom }}</p>
                            <p class="text-sm text-gray-400">{{ commentaireAafficher2?.userEmail }}</p>
                        </div>
                    </div>
                    <div class="text-start p-2 mt-1 ">
                        <p> {{ commentaireAafficher2?.text }} </p>
                    </div>
                </div>
            </div>

            <div class=" w-[15%] flex items-center justify-center space-x-[30px] mt-2 " >
                <div>
                    <button
                        class="bg-slate-200 hover:bg-slate-300 duration-200 h-[30px] w-[30px] flex justify-center items-center p-3 rounded-[50%] "
                        @click="scrollCommentaire(-1)"><i class="fa-solid fa-angle-left text-md "></i></button>
                </div>
                <div>
                    <button
                        class="bg-slate-200 hover:bg-slate-300 duration-200 h-[30px] w-[30px] flex justify-center items-center p-3 rounded-[50%] "
                        @click="scrollCommentaire(1)"><i class="fa-solid fa-angle-right text-md "></i></button>
                </div>
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
            commentaireAafficher1: null,
            commentaireAafficher2: null,
            interval: null
        }
    },
    methods: {
        async recevoirCommentaires() {
            await this.envoyer(null, "get", TOUS_COMMENTAIRES, null, false)
            this.commentaires = this.returnData
            this.commentaireAafficher1 = this.commentaires[this.commentIndex]
            this.commentaireAafficher2 = this.commentaires[this.commentIndex + 1]
            
           
        },
        scrollCommentaire(valeur) {
            clearInterval(this.interval);

            this.commentIndex += valeur 
            if (this.commentIndex < 0) this.commentIndex = this.commentaires.length-2
            if (this.commentIndex > this.commentaires.length - 2) this.commentIndex = 0
            this.commentaireAafficher1 = this.commentaires[this.commentIndex]
            this.commentaireAafficher2 = this.commentaires[this.commentIndex + 1]

            this.interval = setInterval(() => {
                this.commentIndex += 1
                if (this.commentIndex > this.commentaires.length - 2) this.commentIndex = 0
                this.commentaireAafficher1 = this.commentaires[this.commentIndex]
                this.commentaireAafficher2 = this.commentaires[this.commentIndex + 1]
            }, 10000)
        }
    },
    async mounted() {
        await this.recevoirCommentaires()
        this.scrollCommentaire(0)
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