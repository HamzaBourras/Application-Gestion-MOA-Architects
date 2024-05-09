<template>
    <div class="container h-[100vh] pb-[20px]  flex items-center justify-center">
        <div class=" w-full flex flex-col items-center ">
            <div class=" pt-[15px] rounded-t-2xl w-[55%] flex justify-between items-center">
                <div>
                    <button @click="authentifier = 'seconnecter'"
                    :class="`${authentifier === 'seconnecter' ? 'actif' : ''}`"
                    class="w-[180px] py-2 px-5 mb-[3px] bg-[#f3f4f6] border rounded-t-xl hover:bg-[#ffffffd5] hover:text-black duration-300">Se connecter
                    </button>
                     <!-- <span class="inline-block w-4 h-full border-b-4 border-l-2 border-blue-600 rounded-bl-xl translate-y-[2px]" ></span> -->
                    <button @click="authentifier = 'sinscrire'"
                        :class="`${authentifier === 'sinscrire' ? 'actif' : ''}`"
                        class="w-[180px] py-2 px-5 mb-[3px] ml-2 bg-[#f3f4f6] border rounded-t-xl hover:bg-[white] hover:text-black duration-300">S'inscrire
                    </button>
                </div>
                <div>
                    <router-link to="/accueil" >
                        <button
                        class="btn  w-[180px] py-2 px-5 ml-2 bg-[#f3f4f6] rounded-t-xl  hover:bg-white   hover:text-black duration-300">Accueil
                    </button>
                    </router-link>
                </div>
            </div>
            <div
                class="bg-[#f3f4f6] flex items-center justify-between w-[55%] h-[80vh] rounded-b-2xl py-[30px]  px-[10px] ">
                <SeConnecter v-if="authentifier === 'seconnecter'" />
                <!-- Image -->
    <div class="w-[50%] h-full mx-[10px]">
        <img class="h-full rounded-2xl " src="@/assets/authentifier-image.jpg" alt="">
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
            authentifier: "seconnecter"
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
    outline-width: 3px ;
    outline-style: solid;
    outline-color: rgb(37, 99, 235);
    transition: 0s;
}

.btn:hover{
    outline-width: 3px ;
    outline-style: solid;
    outline-color: rgb(37, 99, 235);
    transition: 0s;
    margin-bottom:3px;
}

</style>