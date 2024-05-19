<template>
    <div class=" w-full h-full flex flex-col justify-between bg-[#fbfaff]">
        <div class=" h-[85%]">
            <div class="flex justify-start pl-5 py-[20px]">
                <img class="w-[110px] h-[60px]" src="@/assets/logo-charafi.png" alt="...">
            </div>
            <div class="">
                <ul class="text-left w-[85%] mx-auto">
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
            await this.envoyer(null, "post", DECONNECTER_API, user_id)
            if (this.message != null) {
                localStorage.clear();
                this.$router.push('/authentifier');
            }
            
        }
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