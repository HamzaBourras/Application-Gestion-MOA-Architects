<template>
    <div class=" w-full h-full flex flex-col justify-between bg-white shadow-sm opacity-[0.9]">
        <div class=" h-[85%]">
            <div class="flex justify-start pl-2 py-[5px] shadow-sm mb-[20px] ">
                <div class=" flex items-center justify-start py-[5px] ">
                    <img v-if="user.image != null" class="rounded-[50%] w-[55px] h-[55px] object-cover "
                        :src="`http://localhost:8000/storage/${user.image}`" alt="">
                    <p v-else
                        class="bg-slate-200 flex justify-center items-center h-[55px] w-[55px] p-2 rounded-[50%] cursor-pointer ">
                        <i class="fa-solid fa-user text-xl"></i>
                    </p>
                    <div class="text-start ml-2">
                        <p class="text-md text-gray-800 font-[600]">{{ user?.nom?.toUpperCase() + " " +
                            user?.prenom?.toUpperCase() }}</p>
                        <p class="text-sm text-gray-400">{{ user?.email?.split('.')[0] }}...</p>
                    </div>
                </div>
            </div>
            <div class="mt-[30px]">
                <ul class="text-left w-[95%] mx-auto">
                    <li v-for="(lien, i) in liens" :key="i" @click="changeLien(lien.lien)"
                        :class="`${lienActifNav == lien.lien ? 'actif' : ''}`"
                        class="text-gray-600 py-3 pl-5 my-2 font-[500] hover:bg-slate-100 duration-200 cursor-default">
                        <span><i class="mr-3" :class="lien.span"></i></span>
                        <span>{{ lien.lien }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-[10%] flex items-center border-t-[1px] border-black ">
            <div class="flex  justify-start items-center w-full mx-auto">
                <button @click="deconnecter"
                    class="font-[500] text-gray-600 w-[90%] mx-auto hover:text-blue-500 hover:bg-slate-100 duration-200 px-5 py-3 rounded-md"><span
                        class="mr-3"><i class="fa-solid fa-right-from-bracket"></i></span>se
                    deconnecter</button>
            </div>
        </div>
    </div>
</template>

<script>
import { DECONNECTER_API } from "@/api/api.js"
import EnvoyerForm from "@/mixins/EnvoyerForm"

export default {
    $emits: ["changeLienEmit"],
    mixins: [EnvoyerForm],
    props: {
        lienActifNav: {
            type: String
        },
        liens: {
            type: Array
        }
    },
    data() {
        return {
            user: {}
        }
    },
    methods: {
        changeLien(lienActif) {
            this.$emit("changeLienEmit", lienActif);
            if (typeof localStorage !== 'undefined') {
                localStorage.setItem('lienActif', lienActif);
            } else {
                console.error('LocalStorage n\'est pas disponible.');
            }
        },

        async deconnecter() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id;
            await this.envoyer(null, "post", DECONNECTER_API, user_id, false)
            if (this.message != null) {
                localStorage.clear();
                this.$router.push('/authentifier');
            }
            
        }
    },
    mounted() {
        this.user = JSON.parse(localStorage.getItem("userAuth"))
    }
}
</script>

<style scoped>
.actif {
    color: rgb(59 130 246);
    border-left: 3px solid rgb(59, 130, 246);
    font-weight: 700;
    transform: scale(1.01);
}
</style>