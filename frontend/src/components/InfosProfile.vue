<template>
    <div class="h-max py-[30px] ">
        <div class="w-[50%] py-[20px] mx-auto bg-slate-50 px-[10px] relative ">

            <!-- pour fermer la modification du profile -->
            <button @click="changeLien()"
                class="absolute top-[-10px] right-[-10px] bg-gray-500 hover:bg-gray-800 duration-200 text-white flex justify-center items-center rounded-[50%] w-[30px] h-[30px] cursor-pointer ">
                <i class="fa-solid fa-x text-sm"></i>
            </button>

            <div class="w-[85%] mx-auto " v-if="message != null || this.errorAction != null">
                <MessAgeComponent :message="message" :errorAction="errorAction" />
            </div>
            <form @submit.prevent="modifierProfile">
                <div class="mb-[40px]">
                    <!-- modifier l'image -->
                    <div>
                        <div class="relative h-[150px] w-[150px] mx-auto rounded-[50%] ">
                            <img v-if="user.image != null"
                                class="w-full h-full cursor-pointer rounded-[50%] object-cover "
                                :src="`http://localhost:8000/storage/${user.image}`" alt="">
                            <p v-else
                                class="bg-slate-200 flex justify-center items-center rounded-[50%] w-full h-full p-2 cursor-pointer ">
                                <i class="fa-solid fa-user text-[60px]"></i>
                            </p>
                            <p class="absolute bottom-0 right-4 bg-white flex justify-center items-center rounded-[50%] w-[30px] h-[30px] cursor-pointer "
                                @click="telechargerImage">
                                <i class="fa-solid fa-camera text-lg "></i>
                                <input type="file" class="hidden" ref="profileImage" @change="ajouterImage">
                            </p>
                        </div>
                        <div v-if="image">
                            <p>{{ image?.name }}</p>
                            <p class="text-sm text-red-500 mt-1" v-if="errors?.image"><span
                                    v-for="(error, i) in errors?.image" :key="i">{{ error }} </span></p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-[20px]">
                    <div class="w-1/2 mx-[10px] relative z-0 mb-5 group  text-left">
                        <input type="text" id="nom"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required v-model="user.nom" />
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.nom"><span v-for="(error, i) in errors?.nom"
                                :key="i">{{ error }} </span></p>
                        <label for="nom"
                            class="peer-focus:font-medium absolute text-sm  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Nom</label>
                    </div>
                    <div class="w-1/2 mx-[10px] relative z-0 mb-5 group  text-left">
                        <input type="text" id="prenom"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required v-model="user.prenom" />
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.prenom"><span
                                v-for="(error, i) in errors?.prenom" :key="i">{{ error }} </span></p>
                        <label for="prenom"
                            class="peer-focus:font-medium absolute text-sm  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Prenom</label>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-[20px]">
                    <div class="w-1/2 mx-[10px] relative z-0 mb-5 group  text-left">
                        <input type="email" id="email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required v-model="user.email" />
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.email"><span
                                v-for="(error, i) in errors?.email" :key="i">{{ error }} </span></p>
                        <label for="email"
                            class="peer-focus:font-medium absolute text-sm  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Email</label>
                    </div>
                    <div class="w-1/2 mx-[10px] relative z-0 mb-5 group  text-left">
                        <input type="text" id="telephone"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required v-model="user.telephone" />
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.telephone"><span
                                v-for="(error, i) in errors?.telephone" :key="i">{{ error }} </span></p>
                        <label for="telephone"
                            class="peer-focus:font-medium absolute text-sm  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Telephone</label>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-[20px]">
                    <div class="w-1/2 mx-[10px] relative z-0 mb-5 group  text-left">
                        <div class="relative w-full ">
                            <input id="motpasse"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required v-model="password"
                                :type="`${affichePasse ? 'text' : 'password'}`">
                            <p class="absolute right-4 top-1/3">
                                <button @click="affichePasse = !affichePasse" v-if="!affichePasse"
                                    class="cursor-pointer"><i
                                        class="fa-solid fa-eye text-gray-800 hover:text-gray-500 duration-100 text-[17px] "></i></button>
                                <button @click="affichePasse = !affichePasse" v-if="affichePasse"
                                    class="cursor-pointer"><i
                                        class="fa-solid fa-eye-slash text-gray-800 hover:text-gray-500 duration-100 "></i></button>
                            </p>
                        </div>
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.password"><span
                                v-for="(error, i) in errors?.password" :key="i">{{ error }} </span></p>
                        <label for="motpasse"
                            class="peer-focus:font-medium absolute text-sm  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Nouveau mot de passe</label>
                    </div>
                    <div class="w-1/2 mx-[10px] relative z-0 mb-5 group  text-left">
                        <div class="relative w-full ">
                            <input id="motpasseverif"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required v-model="motpasseverif"
                                :type="`${affichePasse2 ? 'text' : 'password'}`">
                            <p class="absolute right-4 top-1/3">
                                <button @click="affichePasse2 = !affichePasse2" v-if="!affichePasse2"
                                    class="cursor-pointer"><i
                                        class="fa-solid fa-eye text-gray-800 hover:text-gray-500 duration-100 text-[17px] "></i></button>
                                <button @click="affichePasse2 = !affichePasse2" v-if="affichePasse2"
                                    class="cursor-pointer"><i
                                        class="fa-solid fa-eye-slash text-gray-800 hover:text-gray-500 duration-100 "></i></button>
                            </p>
                        </div>
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.motpasseverif"><span
                                v-for="(error, i) in errors?.motpasseverif" :key="i">{{ error }} </span></p>
                        <label for="motpasseverif"
                            class="peer-focus:font-medium absolute text-sm  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Confirmation</label>
                    </div>
                </div>
                <div class=" mt-[30px] space-x-[20px] flex justify-center pl-[20px]  ">
                    <button type="submit"
                        class="text-white w-1/2 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { MODIFIER_PROFILE_API } from "@/api/api"
import EnvoyerForm from "@/mixins/EnvoyerForm"
import MessAgeComponent from "@/components/MessAge.vue"

export default {
    mixins: [EnvoyerForm],
    components: {
        MessAgeComponent
    },
    emits: ["changeLienEmit"],
    data() {
        return {
            user: {},
            image: null,
            password: null,
            motpasseverif: null,
            affichePasse: false, // pour controler l'affichage du mot de passe
            affichePasse2: false, // pour controler l'affichage du mot de passe de vérification
        }
    },
    methods: {
        changeLien() {
            const lienActif = localStorage.getItem('ancienLienActif')
            this.$emit("changeLienEmit", lienActif);
            if (typeof localStorage !== 'undefined') {
                localStorage.setItem('lienActif', lienActif);
            } else {
                console.error('LocalStorage n\'est pas disponible.');
            }
        },
        telechargerImage() {
            this.$refs.profileImage.click()
        },
        recevoirUser() {
            this.user = JSON.parse(localStorage.getItem("userAuth"))
        },
        ajouterImage(event) {
            this.image = event.target.files[0]
        },
        async modifierProfile() {
            if (this.image) {
                console.log("image");
                const formData = new FormData();

                formData.append('nom', this.user.nom);
                formData.append('prenom', this.user.prenom);
                formData.append('email', this.user.email);
                formData.append('telephone', this.user.telephone);
                formData.append('password', this.password);
                formData.append('motpasseverif', this.motpasseverif);

                formData.append('image', this.image); // Ajoutez l'image si elle est sélectionnée

                await this.envoyer(formData, "post", MODIFIER_PROFILE_API, this.user.id, true);

                // this.image = null
            }

            else {

                this.user.password = this.password,
                this.user.motpasseverif = this.motpasseverif


                await this.envoyer(this.user, "post", MODIFIER_PROFILE_API, this.user.id, false);
            }

            
            if(this.returnData){
                localStorage.setItem("userAuth", JSON.stringify(this.returnData))
                    this.recevoirUser()
                
            }

            // console.log(this.returnData);

            // Affichage des entrées de FormData
            // for (const [key, value] of formData.entries()) {
            //     console.log(`${key}: ${value}`);
            // }

        },
    },
    mounted() {
        this.recevoirUser()

    },
}
</script>