<template>
    <div class="container h-[100vh] py-[20px] flex items-center justify-center">
        <div class=" w-full flex flex-col items-center ">
            <div class=" pt-[15px] rounded-t-2xl w-[57%] flex justify-between items-end ">
                <div class=" flex items-end">
                    <button @click="authentifier = 'seconnecter'"
                        :class="`${authentifier === 'seconnecter' ? 'actif' : ''}`"
                        class="w-[180px] relative bg-[#f3f4f6] py-2 px-5  rounded-t-xl hover:bg-[white] hover:text-black duration-300">Se
                        connecter
                    </button>
                    <!-- <span class="inline-block w-4 h-full border-b-4 border-l-2 border-blue-600 rounded-bl-xl translate-y-[2px]" ></span> -->
                    <button @click="authentifier = 'sinscrire'"
                        :class="`${authentifier === 'sinscrire' ? 'actif' : ''}`"
                        class="w-[180px] relative bg-[#f3f4f6] py-2 px-5 ml-1 rounded-t-xl hover:bg-[white] hover:text-black duration-300">S'inscrire
                    </button>
                </div>
                <div>
                    <router-link to="/accueil">
                        <button
                            class="relative btn w-[180px] py-2 px-5 bg-[#f3f4f6] rounded-t-xl  hover:bg-white h-[47px] font-semibold hover:text-black duration-300">Accueil
                        </button>
                    </router-link>
                </div>
            </div>

            <div
                class="bg-[#f3f4f6] flex items-center justify-between w-[57%] h-[80vh] rounded-b-2xl pb-[30px] pt-[20px]  px-[10px] ">
                <SeConnecter class="" v-if="authentifier === 'seconnecter'" />
                <!-- Image -->
                <div class="w-[50%] h-full mx-[10px] " v-if="authentifier === 'seconnecter'">
                    <img class=" h-full rounded-2xl object-cover" src="@/assets/authentifier-image.jpg" alt="">
                </div>
                <SinscRire v-if="authentifier === 'sinscrire'" />
            </div>

        </div>

    </div>
</template>

<script>

import SeConnecter from '@/components/Authentification/SeConnecter.vue';
import SinscRire from '@/components/Authentification/SinscRire.vue'
export default {
    data() {
        return {
            authentifier: "sinscrire"
        }
    },
    components: {
        SeConnecter,
        SinscRire
    }
}
</script>


<style scoped>
.container {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, .1)), url('@/assets/pres1.png');
}

.actif{
    background:#f3f4f6;
    border-top-left-radius:12px;
    border-top-right-radius:12px;
    border-top-width:4px;
    border-style:solid;
    border-color:rgb(59 130 246);
    transition:0s;
    height:50px;
}

</style>