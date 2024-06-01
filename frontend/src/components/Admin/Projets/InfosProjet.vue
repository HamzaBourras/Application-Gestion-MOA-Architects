<template>
    <div class="relative h-max pb-[40px] ">
        <div class="py-[10px] flex items-center justify-between pr-[20px] ">
            <div class=" flex justify-start items-end pl-[15px] mb-[5px] ">
                <h1 class="text-[30px] font-[900] text-white"> {{ projet.nom_projet.toUpperCase() }} </h1>
                <span v-if="projet.termine == 0" class="inline text-blue-500 font-[600] ml-1 italic ">En cours
                    d'exécution ...</span>
                <span v-if="projet.termine == 1" class="inline text-green-400 font-[700] ml-1 italic "> Projet
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
                        <span class=" font-[500]"> {{ projet.type }} </span>
                    </p>
                    <p>
                        <span class="font-semibold">Prix prévu : </span>
                        <span class=" font-[500]"> {{ projet.prix }} DH </span>
                    </p>
                    <p>
                        <span class="font-semibold">Date de termination prévu : </span>
                        <span class=" font-[500]"> {{ projet.date_termination.split(' ')[0] }} </span>
                    </p>
                </div>
                <div class="flex items-start justify-between mt-4 ">
                    <p class="w-1/2 flex items-start space-x-1 ">
                        <span class="font-semibold block w-[17%] ">Description : </span>
                        <span class=" font-[500] block w-[83%] "> {{ projet.description }} </span>
                    </p>
                    <p>
                        <span class="font-semibold">Numero de la demande : </span>
                        <span class=" font-[500]"> {{ projet.numero_demande }} </span>
                    </p>
                    <p>
                        <span class="font-semibold">Numero du contrat : </span>
                        <span class=" font-[500]"> {{ projet.numero_contrat }} </span>
                    </p>
                </div>
                <div class="mt-[35px]">
                    <h1 class="font-[800] text-xl">Terrain</h1>
                    <div class="flex items-center justify-between mt-2 ">
                        <p>
                            <span class="font-semibold">Adresse : </span>
                            <span class=" font-[500]"> {{ projet.terrain.adresse }} </span>
                        </p>
                        <p>
                            <span class="font-semibold">Longeur : </span>
                            <span class=" font-[500]"> {{ projet.terrain.longeur }} m </span>
                        </p>
                        <p>
                            <span class="font-semibold">Largeur: </span>
                            <span class=" font-[500]"> {{ projet.terrain.largeur }} m </span>
                        </p>
                    </div>
                    <div class="flex items-center justify-around w-full mt-3">
                        <img class="hover:w-[32%] hover:h-[250px]  w-[22%] h-[150px] rounded-md "
                            v-for="(image, i) in projet.terrain.images_terrain " :key="i"
                            :src="`http://localhost:8000/storage/${image}`" alt="">
                    </div>
                </div>
            </div>

            <!-- images du projet -->
            <div class="h-max w-[99%] mx-auto py-[20px] px-[10px] relative">
                <!-- Component pour marqué le projet terminé -->
                <ConfirmationComp v-if="afficheComConfirmation == true" :projetId="projet.id"
                    @changerVisibilite="afficheComConfirmation = false" />

                <!-- Component pour ajouter un commentaire -->
                <AjouterCommentaire v-if="userRole == 'client' && afficheComAjouterCommentaire == true"
                    @changerVisibilite="afficheComAjouterCommentaire = false" />

                <div class="flex w-full mt-2 mb-3 items-center">
                    <div class="w-1/4">
                        <h1 class="font-[800] text-2xl text-left text-white">Images</h1>
                    </div>

                    <div v-if="userRole == 'admin' && projet.termine == 0"
                        class="w-3/4 flex items-center justify-between">
                        <button type="button" @click="afficheComAjouterImages = true; projetId = projet.id"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajouter
                            image</button>
                        <button @click="afficheComConfirmation = true"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Projet terminé
                        </button>
                    </div>

                    <div v-if="userRole == 'client' && projet.termine == 1" class="w-3/4 flex items-center justify-end">
                        <button @click="afficheComAjouterCommentaire = true"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Ajouter un commentaire
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
import AjouterCommentaire from './../../Client/MesProjets/AjouterCommentaire.vue'

export default {
    mixins: [EnvoyerForm],
    components: {
        AjouterImages,
        ConfirmationComp,
        AjouterCommentaire
    },
    props: {
        projetRecu: {
            type: Object
        },
        userRole: {
            type: String  // pour ne pas afficher le button d'ajouter des images au client
        }
    },
    emits: ["changerVisibilite"],
    data() {
        return {
            telecharge: 0,
            imagesProjet: [],
            projet: this.projetRecu,
            length: null,
            afficheComAjouterImages: false, // pour controler l'affichage du component d'ajout des images au projet
            afficheComConfirmation: false, 
            afficheComAjouterCommentaire: false, // pour controler l'affichage du component d'ajout de commentaire
            projetId: null
        }
    },
    methods: {
        // async recevoirProjet() {
        //     await this.envoyer(null, "get", TOUS_PROJETS, null, false) 
        //     const tousProjets = this.returnData  
        //     this.projet = tousProjets.filter(it => it.id == this.projet.id)
        // },
        async recevoirImages() {
            await this.envoyer(null, "get", TOUS_IMAGES_PROJET, this.projet.id, false)
            this.imagesProjet = this.returnData
            this.length = this.imagesProjet?.length
        }
    },
    async mounted() {
        await this.recevoirImages()
    },
}
</script>