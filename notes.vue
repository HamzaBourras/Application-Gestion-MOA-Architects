<template>
    <div class="container">
        <div class="site-container">
            <div class="space-y-[-13%] pt-[-10%]">
                <p class="text-[200px] text-white font-bold tracking-[20px]">MOA</p>
                <p class="text-gray-400 font-semibold text-[22px] tracking-[5.2px]">Moroccan Office of Architecture</p>
            </div>
            <div>
                <p class="text-white text-2xl font-semibold">with</p>
            </div>
            <div class="space-y-[-13%] bg-red-500 overflow-hidden">
                <p class="text-[200px] text-white font-bold tracking-[20px]">Mr. </p>
                <div>
                    <p class="text-gray-200 font-semibold text-[22px] tracking-[5.2px]">Mohamed Larbi Charafi</p>
                    <p class="text-gray-400 font-semibold text-[22px] tracking-[5.2px]">Architecte DENA</p>
                </div>
            </div>
            <!-- <div>
                <p>Bienvenue à</p>
                <div class="flex items-center justify-between">
                    <div>
                        <h1>MOA <span>Moroccan Office Of Architecture</span> </h1>
                    </div>
                    <div>
                        <h1>&</h1>
                    </div>
                    <div>
                        <h1>Mr. Charafi <span>Architecte DNA</span></h1>
                    </div>
                </div>
            </div> -->


        </div>
        <div>

        </div>
    </div>
</template>


<style scoped lang="scss">
*,*::before,*::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    outline: none;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.container {
    text-align: left;
    position: relative;
    height: 90vh;
    width: 100%;
    height: 89vh;
    padding: 0 8%;
}

.site-container {
    position: absolute;
    bottom: 10%;
    color: #fff;

    

    h1{
        font-size: 120px;
        line-height: 120px;
        margin-left: -10px;
        font-weight: 900;
    }

    h1 span{
        font-size: 25px;
        font-weight: 200;
    }
}


</style>





<template>
    <div class=" font-[Poppins] flex flex-col justify-center items-center py-[4vh]">
        <div>
            <h1 class="text-4xl font-bold tracking-[5px] mb-3">Services</h1>
        </div>
        <div class="flex flex-wrap w-[80%] justify-between items-center ">
            <div class="card shadow">
                <h2 class="text-xl font-semibold tracking-[2px]">Service 1</h2>
                <p class="text-justify py-3 px-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                    labore voluptatum consectetur
                    praesentium quod nesciunt saepe, quisquam perferendis quis consequatur ipsa atque, nihil nam,
                    placeat
                    provident consequuntur corporis commodi hic.</p>
            </div>
            <div class="w-[40%] my-2">
                <h2 class="text-xl font-semibold tracking-[2px]">Service 2</h2>
                <p class="text-justify py-3 px-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                    labore voluptatum consectetur
                    praesentium quod nesciunt saepe, quisquam perferendis quis consequatur ipsa atque, nihil nam,
                    placeat
                    provident consequuntur corporis commodi hic.</p>
            </div>
            <div class="w-[40%] my-2">
                <h2 class="text-xl font-semibold tracking-[2px]">Service 3</h2>
                <p class="text-justify py-3 px-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                    labore voluptatum consectetur
                    praesentium quod nesciunt saepe, quisquam perferendis quis consequatur ipsa atque, nihil nam,
                    placeat
                    provident consequuntur corporis commodi hic.</p>
            </div>
            <div class="w-[40%] my-2">
                <h2 class="text-xl font-semibold tracking-[2px]">Service 4</h2>
                <p class="text-justify py-3 px-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                    labore voluptatum consectetur
                    praesentium quod nesciunt saepe, quisquam perferendis quis consequatur ipsa atque, nihil nam,
                    placeat
                    provident consequuntur corporis commodi hic.</p>
            </div>

        </div>
    </div>
</template>


<style scoped>
.card {
    width: 40%;
    background: white;
    border-radius: 10px;
    transition: border-radius 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.shadow {
    box-shadow: inset 0 -3em 3em rgba(0, 0, 0, 0.1),
        0 0 0 2px rgb(190, 190, 190),
        0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
}
</style>



<template>
    <div class="w-full bg-[rgba(0,0,0,0.9)] py-4">
        <div class="py-[1%] px-[8%]">
            <div class="flex flex-col items-center">
                <h1 class=" pb-[10px] text-[3rem] font-bold tracking-[4px] ">Services</h1>
                <div class="cards grid gap-[60px] mt-[20px]">
                    <div
                        class="card h-[300px] w-[400px] py-[3%] px-[8%] border-[0.2px] border-solid border-white rounded-[8px] transition-[6s] flex items-center flex-col overflow-hidden">
                        <h2 class="text-[#fff] text-[24px] font-[600] tracking-[1px] py-1">Service 1</h2>
                        <p class="text-justify w-full my-[16px] text-[#ffffffa2]">Lorem ipsum dolor, sit
                            amet consectetur adipisicing elit. Voluptatem unde eum corrupti
                            perferendis delectus fuga similique maiores neque error odio, provident nulla aperiam
                            commodi distinctio aliquid ullam ab excepturi eveniet?</p>
                    </div>




                </div>
            </div>
        </div>

    </div>
</template>

<style scoped lang="scss">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins';
}

h1 {
    -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: transparent;
    background: #fff;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.cards {
    grid-template-columns: repeat(2,1fr);
}

.card{
    position: relative;

    background-color: black;
}

.card:hover{
    background: transparent;
    transform: translateY(-8px) ;
    border-color: #567330;
}

.card:after {
    content: "";
    position: absolute;
    top: 150%;
    left: -200px;
    width: 120%;
    transform: rotate(50deg);
    background-color: #fff;
    height: 18px;
    filter: blur(30px);
    opacity: 0.5;
    transition: 1s;
}

.card:hover:after {
    width: 225%;
    top: -100%;

}


</style>



<template>
    <div class="h-[90vh] bg-[#062a74] flex items-center justify-center">
        <div class="h-[85%] flex items-center justify-between gap-0 w-full p-[40px] ">
            <div class=" h-full w-[45%]">
                <img class="h-full" src="@/assets/pres1.png" alt="">
            </div>
            <div class="bg-red-500 h-full w-[50%] flex flex-col items-start justify-between">
                <div class="h-1/2 flex flex-col items-start  bg-yellow-200 w-full">
                    <div class="flex items-center py-[10px]">
                        <p class="w-[100px] h-[2px] bg-black inline mr-[10px]"></p>
                        <h3 class="font-semibold text-[22px]">Charafi Hamza</h3>
                    </div>
                    <h1 class="text-[50px] font-bold tracking-[1px] text-left py-[30px] leading-[70px]">Moroccan Office
                        of
                        <br> Architecture
                    </h1>
                </div>
                <div class="h-1/2 flex flex-col items-start justify-around bg-sky-200 w-full">
                    <p class="text-left leading-6 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                        earum, quibusdam non vero
                        excepturi
                        quia deleniti, numquam perspiciatis at expedita aspernatur, voluptate libero magni corporis
                        itaque
                        molestias autem error! Minima.</p>
                    <button class="bg-gray-800 px-[30px] py-3 text-gray-100 w-1/2">Décorer votre maison</button>
                </div>
            </div>
        </div>
    </div>
</template>






<style>
.actif::before {
    content:'';
    position:absolute;
    left:-20px;
    bottom:0px;
    width:20px;
    height:20px;
    border-bottom-right-radius:20px;
    box-shadow: 4px 4px 0 4px #f3f4f6;
    
}

.actif::after {
    content:'';
    position:absolute;
    right:-15px;
    bottom:0px;
    width:15px;
    height:20px;
    border-bottom-left-radius:20px;
    box-shadow: -4px 4px 0 4px #f3f4f6;
}

</style>








<template>
    <div class="h-max py-[10px] ">
        <div class="w-[50%] py-[20px] mx-auto bg-slate-50 px-[10px] ">

            <div class="w-[85%] mx-auto " v-if="message != null || this.errorAction != null">
                <MessAgeComponent :message="message" :errorAction="errorAction" />
            </div>

            <div class="mb-[30px]">
                <div class="relative h-[150px] w-[150px] mx-auto rounded-[50%] ">
                    <img v-if="user.image != null" id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                        data-dropdown-placement="bottom-start" class="w-full h-full cursor-pointer"
                        :src="`http://localhost:8000/storage/${user.image}`" alt="" @click="toggleDropdown">
                    <p v-else
                        class="bg-slate-200 flex justify-center items-center rounded-[50%] w-full h-full p-2 cursor-pointer "
                        @click="toggleDropdown">
                        <i class="fa-solid fa-user text-[60px]"></i>
                    </p>
                    <p class="absolute bottom-0 right-4 bg-white flex justify-center items-center rounded-[50%] w-[30px] h-[30px] cursor-pointer "
                        @click="telechargerImage">
                        <i class="fa-solid fa-camera text-lg "></i>
                        <input type="file" class="hidden" ref="profileImage" @change="ajouterImage">
                    </p>
                </div>
            </div>
            <form @submit.prevent="modifierProfile">
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
                        <input type="password" id="motpasse"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required v-model="password" />
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.password"><span
                                v-for="(error, i) in errors?.password" :key="i">{{ error }} </span></p>
                        <label for="motpasse"
                            class="peer-focus:font-medium absolute text-sm  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Nouveau mot de passe</label>
                    </div>
                    <div class="w-1/2 mx-[10px] relative z-0 mb-5 group  text-left">
                        <input type="password" id="motpasseverif"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required v-model="motpasseverif" />
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
    data() {
        return {
            user: {},
            image: null,
            password: null,
            motpasseverif: null
        }
    },
    methods: {
        ajouterImage(event) {
            this.image = event.target.files[0]

        },
        telechargerImage() {
            this.$refs.profileImage.click()
        },
        recevoirUser() {
            this.user = JSON.parse(localStorage.getItem("userAuth"))
        },
        async modifierProfile() {
            if (this.image) {
                const formData = new FormData();

                formData.append('nom', this.user.nom);
                formData.append('prenom', this.user.prenom);
                formData.append('email', this.user.email);
                formData.append('telephone', this.user.telephone);
                formData.append('password', this.password);
                formData.append('motpasseverif', this.motpasseverif);

                formData.append('image', this.image); // Ajoutez l'image si elle est sélectionnée

                await this.envoyer(formData, "put", MODIFIER_PROFILE_API, this.user.id, true);
            }

            else {

                this.user.password = this.password,
                    this.user.motpasseverif = this.motpasseverif


                await this.envoyer(this.user, "put", MODIFIER_PROFILE_API, this.user.id, false);
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











<template>
    <div class="relative h-max pb-[40px] ">
        <div class="py-[10px] flex items-center justify-between pr-[20px] ">
            <div class=" flex justify-start items-end pl-[15px] mb-[5px] ">
                <h1 class="text-[30px] font-[900] text-black"> {{ projet?.nom_projet?.toUpperCase() }} </h1>
                <span v-if="projet?.termine == 0" class="inline text-blue-500 font-[600] ml-1 italic ">En cours
                    d'exécution ...</span>
                <span v-if="projet?.termine == 1" class="inline text-green-500 font-[600] ml-1 italic "> Projet
                    terminé</span>
            </div>
            <button type="button" @click="this.$emit('changerVisibilite')"
                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Fermer</button>
        </div>

        <!-- Component pour ajouter des images au projet -->
        <AjouterImages v-if="afficheComAjouterImages == true" :projetId="projetId"
            @changerVisibilite="afficheComAjouterImages = false" @mettreAjourImages="recevoirImages()" />

        <div>
            <!-- infos du projet -->
            <div class=" text-left bg-slate-50 text-black h-max w-[99%] mx-auto py-[20px] px-[10px] ">
                <div class="flex items-center justify-between">
                    <p>
                        <span class="font-semibold">Type : </span>
                        <span class=" font-[500]"> {{ projet?.type }} </span>
                    </p>
                    <p>
                        <span class="font-semibold">Prix prévu : </span>
                        <span class=" font-[500]"> {{ projet?.prix }} DH </span>
                    </p>
                    <p>
                        <span class="font-semibold">Date de termination prévu : </span>
                        <span class=" font-[500]"> {{ projet?.date_termination?.split(' ')[0] }} </span>
                    </p>
                </div>
                <div class="flex items-start justify-between mt-4 ">
                    <p class="w-1/2 flex items-start space-x-1 ">
                        <span class="font-semibold block w-[17%] ">Description : </span>
                        <span class=" font-[500] block w-[83%] "> {{ projet?.description }} </span>
                    </p>
                    <p>
                        <span class="font-semibold">Numero de la demande : </span>
                        <span class=" font-[500]"> {{ projet?.numero_demande }} </span>
                    </p>
                    <p>
                        <span class="font-semibold">Numero du contrat : </span>
                        <span class=" font-[500]"> {{ projet?.numero_contrat }} </span>
                    </p>
                </div>
                <div class="mt-[35px]">
                    <h1 class="font-[800] text-xl">Terrain</h1>
                    <div class="flex items-center justify-between mt-2 ">
                        <p>
                            <span class="font-semibold">Adresse : </span>
                            <span class=" font-[500]"> {{ projet?.terrain?.adresse }} </span>
                        </p>
                        <p>
                            <span class="font-semibold">Longeur : </span>
                            <span class=" font-[500]"> {{ projet?.terrain?.longeur }} m </span>
                        </p>
                        <p>
                            <span class="font-semibold">Largeur: </span>
                            <span class=" font-[500]"> {{ projet?.terrain?.largeur }} m </span>
                        </p>
                    </div>
                    <div class="flex items-center justify-around w-full mt-3">
                        <img class="hover:w-[32%] hover:h-[250px]  w-[22%] h-[150px] rounded-md "
                            v-for="(image, i) in projet?.terrain?.images_terrain " :key="i"
                            :src="`http://localhost:8000/storage/${image}`" alt="">
                    </div>
                </div>
            </div>

            <!-- images du projet -->
            <div class="h-max w-[99%] mx-auto py-[20px] px-[10px] relative">
                <!-- Component pour marqué le projet terminé -->
                <ConfirmationComp v-if="afficheComConfirmation == true" :projetId="projetId"
                    @changerVisibilite="afficheComConfirmation = false" @mettreAjourProjet="recevoirProjet" />

                <div class="flex w-full mt-2 mb-3 items-center justify-between ">
                    <div class="w-1/4 flex items-center justify-between">
                        <h1 class="font-[800] text-2xl text-left">Images</h1>
                        <button v-if="userRole == 'admin' && projet?.termine == 0" type="button"
                            @click="afficheComAjouterImages = true;"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajouter
                            image</button>
                    </div>
                    <div>
                        <button v-if="projet?.termine == 0" @click="afficheComConfirmation = true"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Projet terminé
                        </button>
                    </div>
                </div>
                <div class="mt-2">
                    <div v-if="length != null && length == 0" class="pl-8 text-left">
                        <p class="text-lg font-[500]">Vous n'avez pas des images à afficher</p>
                    </div>
                    <div v-else>
                        <div v-if="userRole == 'client'" class="my-2">
                            <p class="text-md font-[500] text-left">Voici l'état arrivé de votre projet</p>
                        </div>
                        <div class="w-full flex justify-between">
                            <img class="w-[32%] h-[250px] object-cover " v-for="(image, i) in imagesProjet " :key="i"
                                :src="`http://localhost:8000/storage/${image.chemin}`" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import EnvoyerForm from "@/mixins/EnvoyerForm"
import { TOUS_IMAGES_PROJET } from "@/api/api"
import AjouterImages from '@/components/Admin/Projets/AjouterImages'
import ConfirmationComp from '@/components/Admin/Projets/ConfirmationComp'

export default {
    mixins: [EnvoyerForm],
    components: {
        AjouterImages,
        ConfirmationComp
    },
    props: {
        projetId: {
            type: Number
        },
        userRole: {
            type: String  // pour ne pas afficher le button d'ajouter des images au client
        }
    },
    emits: ["changerVisibilite"],
    data() {
        return {
            projet: {},
            imagesProjet: [],
            length: null,
            afficheComAjouterImages: false, // pour controler l'affichage du component d'ajout des images au projet
            afficheComConfirmation: false, // pour controler l'affichage du component d'ajout des images au projet
            
        }
    },
    methods: {
        recevoirProjet() {
            const tousProjets = JSON.parse(localStorage.getItem("Projets"));
            
            this.projet =  tousProjets.filter(it => it.id == this.projetId)
        },
        async recevoirImages() {
            await this.envoyer(null, "get", TOUS_IMAGES_PROJET, this.projetId, false)
            this.imagesProjet = this.returnData
            this.length = this.imagesProjet?.length
        }
    },
    async mounted() {
        this.recevoirProjet()
        console.log(this.projet);
        await this.recevoirImages()
    }
}
</script>