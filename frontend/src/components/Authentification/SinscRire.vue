<template>
    <div class="pulse h-[100%] flex items-center py-[10px] inscrire w-[100%] ml-[30px] mr-[20px]">
        <!-- form -->
        <div class=" flex flex-col items-center w-full h-full ">
            <div class="flex items-center justify-between w-full ">
                <div class=" w-1/2 ">
                    <h1 class="text-2xl text-[#002D74] font-bold text-left">S' inscrire</h1>
                    <p class="text-sm mt-2 text-[#002D74] text-left">Veuillez créer un compte</p>
                </div>
                <div class="w-1/2" v-if="message != null || errorAction!= null">
                    <MessAgeComponent :message="message" :errorAction="errorAction" />
                </div>
            </div>
            <form class="w-full mt-4 mb-4" @submit.prevent="inscrire">
                <div class="flex flex-col items-start w-full ">

                    <div class="flex space-x-3 mt-[15px] w-full">
                        <div class="flex flex-col items-start w-full">
                            <label class="font-[450] block  text-gray-700" for="prenom">Votre prénom</label>
                            <input v-model="client.prenom"
                                class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                type="text" id="prenom">
                            <p class="text-sm text-red-500 mt-1" v-if="errors?.prenom"><span
                                    v-for="(error, i) in errors?.prenom" :key="i">{{ error }} </span></p>

                        </div>
                        <div class="flex flex-col items-start w-full">
                            <label class="font-[450] block text-gray-700" for="nom">Votre nom</label>
                            <input v-model="client.nom"
                                class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                type="text" id="nom">
                            <p class="text-sm text-red-500 mt-1" v-if="errors?.nom"><span
                                    v-for="(error, i) in errors?.nom" :key="i">{{ error }} </span></p>
                        </div>
                    </div>

                    <div class="flex space-x-3 mt-[35px] w-full">
                        <div class="flex flex-col items-start w-full">
                            <label class="font-[450] block text-gray-700" for="email">Adresse e-mail</label>
                            <input v-model="client.email"
                                class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                type="email" id="email">
                            <p class="text-sm text-red-500 mt-1" v-if="errors?.email"><span
                                    v-for="(error, i) in errors?.email" :key="i">{{ error }} </span></p>
                        </div>

                        <div class="flex flex-col items-start w-full">
                            <label class="font-[450] block text-gray-700" for="telephone">Télephone</label>
                            <input v-model="client.telephone"
                                class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                type="text" id="telephone">
                            <p class="text-sm text-red-500 mt-1" v-if="errors?.telephone"><span
                                    v-for="(error, i) in errors?.telephone" :key="i">{{ error }} </span></p>
                        </div>
                    </div>

                    <div class="flex space-x-3 mt-[35px] w-full">
                        <div class="flex flex-col items-start w-1/2">
                            <label class="font-[450] block text-gray-700" for="password">Mot de passe</label>
                            <input v-model="client.password"
                                class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                type="password" id="password">
                            <p class="text-sm text-red-500 mt-1" v-if="errors?.password"><span
                                    v-for="(error, i) in errors?.password" :key="i">{{ error }} </span></p>
                        </div>
                        <div class="flex flex-col items-start w-1/2">
                            <label class="font-[450] block text-gray-700" for="motpasseverif">Vérification</label>
                            <input v-model="client.motpasseverif"
                                class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                type="password" id="motpasseverif">
                            <p class="text-sm text-red-500 mt-1" v-if="errors?.motpasseverif"><span
                                    v-for="(error, i) in errors?.motpasseverif" :key="i">{{ error }} </span></p>
                        </div>
                    </div>
                </div>
                <div class="mt-[60px]">
                    <input
                        class="w-full block bg-blue-400 hover:bg-blue-500 focus:bg-blue-500 text-white font-semibold rounded-lg px-4 py-3"
                        type="submit" value="S' inscrire">
                </div>


            </form>
        </div>
    </div>
</template>


<script>
import { INSCRIRE_API } from "@/api/api.js";
import EnvoyerForm from "@/mixins/EnvoyerForm"
import MessAgeComponent from "@/components/MessAge.vue"

export default {
    components: {
        MessAgeComponent
    },
    mixins: [EnvoyerForm],

    data() {
        return {
            client: {
                nom: "",
                prenom: "",
                email: "",
                telephone: "",
                password: "",
                motpasseverif: "",
            },
        }
    },
    methods: {
        async inscrire() {
            await this.envoyer(this.client, "post", INSCRIRE_API, null, null)
            this.client = {}
        }
    }
    }
</script>



<style scoped>
.inscrire {
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