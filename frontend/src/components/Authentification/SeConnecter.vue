<template>
    <!-- form -->
    <div class=" pulse h-full overflow-hidden connect w-[50%] mr-[30px] ml-[20px] p-[10px] ">
        <div class="h-full w-full flex flex-col items-start pt-[5px] ">
            <div class="w-full">
                <h1 class="text-2xl text-[#002D74] font-bold text-left ">Se connecter</h1>
                <!-- affichage du message après la modification du mot de passe -->
                <div v-if="messageRecu != false " class="text-left pt-3 text-[16px] text-green-500 font-[500] ">
                    <p>{{ messageRecu }} </p>
                </div>
                <p v-if="message == null && errorAction == null" class="text-sm text-left mt-4 text-[#002D74]">Si vous
                    avez un
                    compte, veuillez vous
                    connecter</p>
                <div class="w-full" v-else>
                    <MessAgeComponent :message="message" :errorAction="errorAction" />
                </div>
            </div>
            <form class="w-full mt-4 " action="" @submit.prevent="connecter">
                <div class="flex flex-col items-start w-full ">
                    <div class="flex flex-col items-start w-full">
                        <label class="font-[450] block text-gray-700" for="email">Adresse e-mail</label>
                        <input v-model="client.email"
                            class="border-none mt-1 w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                            type="email" id="email">
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.email"><span
                                v-for="(error, i) in errors?.email" :key="i">{{ error }} </span></p>
                    </div>
                    <div class="flex flex-col items-start w-full mt-[30px]">
                        <label class="font-[450] block  text-gray-700" for="password">Mot de passe</label>
                        <div class="relative w-full ">
                            <input v-model="client.password"
                                class="border-none mt-1 w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                :type="`${affichePasse ? 'text' : 'password' }`" id="password">
                            <p class="absolute right-4 top-1/3">
                                <button @click="affichePasse = !affichePasse" v-if="!affichePasse"
                                    class="cursor-pointer"><i
                                        class="fa-solid fa-eye text-gray-800 hover:text-gray-500 duration-100 text-[17px] "></i></button>
                                <button @click="affichePasse = !affichePasse" v-if="affichePasse"
                                    class="cursor-pointer"><i
                                        class="fa-solid fa-eye-slash text-gray-800 hover:text-gray-500 duration-100 text-[17px] "></i></button>
                            </p>
                        </div>
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.password"><span
                                v-for="(error, i) in errors?.password" :key="i">{{ error }} </span></p>
                    </div>
                </div>
                <div
                    class="flex justify-end mt-[40px] font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700 text-sm">
                    <a href="http://127.0.0.1:8002/forgot-password">Mot de passe oublié ?</a>
                </div>
                <div class="mt-5">
                    <input
                        class="w-full block bg-blue-400 hover:bg-blue-500 focus:bg-blue-500 text-white font-semibold rounded-lg px-4 py-3"
                        type="submit" value="Se connecter">
                </div>
            </form>

            <div class="mt-7 grid grid-cols-3 items-center text-gray-500 w-full ">
                <hr class="border-gray-500" />
                <p class="text-center text-sm">OR</p>
                <hr class="border-gray-500" />
            </div>

            <!-- avec google -->
            <div class="w-full">
                <button
                    class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6"
                        viewBox="0 0 48 48">
                        <defs>
                            <path id="a"
                                d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                        </defs>
                        <clipPath id="b">
                            <use xlink:href="#a" overflow="visible" />
                        </clipPath>
                        <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                        <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                        <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                        <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                    </svg>
                    <span class="ml-4">Se connecter avec google</span>
                </button>
            </div>


        </div>
    </div>


</template>


<script>
import EnvoyerForm from '@/mixins/EnvoyerForm'
import MessAgeComponent from "@/components/MessAge.vue"
import { CONNECTER_API } from "@/api/api.js"
export default {
    mixins: [EnvoyerForm],
    components: {
        MessAgeComponent
    },

    data() {
        return {
            client: {
                email: "",
                password: ""
            },
            messageRecu: false, // message renvoyé après la modification du mot de passe
            affichePasse: false, // pour controler l'affichage du mot de passe
        }
    },

    methods: {
        async connecter() {
            await this.envoyer(this.client, "post", CONNECTER_API, null,false)
            const userAuth = this.returnData
            const token = this.token
            if (userAuth) {
                localStorage.setItem("userAuth", JSON.stringify(userAuth));
                localStorage.setItem("token", token);

                if (userAuth.role == "admin") {
                    this.$router.push('/espace/admin');
                }
                else if (userAuth.role == "client") {
                    this.$router.push('/espace/client');
                }
            }
        },
        getMessageFromUrl() {
            const hash = window.location.hash;
            const params = new URLSearchParams(hash.substring(hash.indexOf('?'))); // Extract query parameters from the fragment
            const message = params.get('message');
            this.messageRecu = message ? decodeURIComponent(message) : null;

            if(message !== null){
                this.messageRecu = decodeURIComponent(message);
            }

            setTimeout(() => {
                this.messageRecu = false;
            }, 1500 );
        }
    },
    mounted() {
        this.getMessageFromUrl()
    }

}
</script>


<style scoped>
.connect {
    animation: pulse 0.4s cubic-bezier(0.4, 0, 0.6, 1) 1;
}

@keyframes pulse {
    0% {
        opacity: 0;
    }

    25% {
        opacity: .25;
    }

    50% {
        opacity: .5;
    }

    75% {
        opacity: .75;
    }

    100% {
        opacity: 1;
    }
}
</style>