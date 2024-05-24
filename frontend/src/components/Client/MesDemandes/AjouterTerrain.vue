<template>
    <div class="absolute left-1/2 top-[40%] -translate-x-1/2 -translate-y-1/2 w-[45%] h-max ">
        <div class="w-full h-full bg-slate-100 text-left rounded-xl py-[20px]">
            <div class="w-[85%] mx-auto " v-if="message != null || this.errorAction != null">
                <MessAgeComponent :message="message" :errorAction="errorAction" />
            </div>

            <form class="w-[85%] mt-[10px] mx-auto" @submit.prevent="ajouterTearin">
                <div class="mt-4">
                    <label for="adresse" class="block mb-2 text-md font-medium text-gray-900 ">Adresse du
                        terrain</label>
                    <input type="text" id="adresse" v-model="terrain.adresse"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <p class="text-sm text-red-500 mt-1" v-if="errors?.adresse"><span
                            v-for="(error, i) in errors?.adresse" :key="i">{{ error }} </span></p>
                </div>
                <div class="mt-6 flex items-center justify-between">
                    <div>
                        <label for="nom-projet" class="block mb-2 text-md font-medium text-gray-900 ">Largeur du
                            terrain</label>
                        <input type="number" id="nom-projet" v-model="terrain.largeur"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.largeur"><span
                                v-for="(error, i) in errors?.largeur" :key="i">{{ error }} </span></p>
                    </div>
                    <div>
                        <label for="nom-projet" class="block mb-2 text-md font-medium text-gray-900 ">Longeur du
                            terrain</label>
                        <input type="number" id="nom-projet" v-model="terrain.longeur"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <p class="text-sm text-red-500 mt-1" v-if="errors?.longeur"><span
                                v-for="(error, i) in errors?.longeur" :key="i">{{ error }} </span></p>
                    </div>
                </div>
                <div class="mt-6">
                    <label for="nom-projet" class="block mb-2 text-md font-medium text-gray-900 ">Ajouter des
                        images <span class="text-sm font-[200] text-gray-700">(choisissez plusieurs images)</span>
                    </label>
                    <input multiple ref="inputImage" @change="ajouterImageInImagesArray"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file">
                    <p class="my-2 text-black">
                        <span v-for="(image, i) in terrain.images " :key="i">
                            {{ image.name }} **
                        </span>
                    </p>
                    <!-- affichage des ereurs global de images -->
                    <p class="text-sm text-red-500 mt-1" v-if="errors?.images">
                        <span v-for="(error, i) in errors?.images" :key="i">{{ error }} </span>
                    </p>
                    <!-- affichage des ereurs de chaque image -->
                    <div class="text-sm text-red-500 mt-1" v-if="imagesError != []">
                        <p v-for="(image, i) in imagesError" :key="i">
                            L'image {{ i + 1 }} : <span v-for="(errorI, i) in image" :key="i">{{ errorI }}-- </span>
                        </p>
                    </div>
                </div>
                <div class="mt-[40px] flex justify-end">
                    <input type="submit" value="Ajouter" class=" cursor-pointer text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4
                        focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">
                    <button type=" button" @click="emitsButtonAnnuler"
                        class="text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
import { INSERER_TERRAIN } from "@/api/api"
import EnvoyerForm from "@/mixins/EnvoyerForm"
import MessAgeComponent from "@/components/MessAge.vue"

export default {
    props: {
        demandeId: {
            type: Number,
        }
    },
    emits: ["changerVisibilite", "mettreAjourDemandes"],
    mixins: [EnvoyerForm],
    components: {
        MessAgeComponent
    },
    data() {
        return {
            terrain: {
                adresse: "",
                largeur: "",
                longeur: "",
                images: []
            },
            imagesError: []  // les images qui ont une erreur de validation
        }
    },
    methods: {
        ajouterImageInImagesArray(event) {
            this.terrain.images = Array.from(event.target.files)

        },
        emitsButtonAnnuler() {
            this.$emit("changerVisibilite")  // pour cacher le component contient le form (ce component)
            this.terrain = {}
            this.imageError = null
        },

        async ajouterTearin() {
            // construire le format du data
            const formData = new FormData();
            formData.append('adresse', this.terrain.adresse);
            formData.append('largeur', this.terrain.largeur);
            formData.append('longeur', this.terrain.longeur);
            this.terrain.images.forEach((image) => {
                formData.append('images[]', image)
            });

            await this.envoyer(formData, "post", INSERER_TERRAIN, this.demandeId)
            this.imagesError = []
            // enregistrer les images qui ont des erreurs
            if (this.errors?.['images.0'] || this.errors?.['images.1'] || this.errors?.['images.2']) {
                if (this.errors['images.0']) this.imagesError.push(this.errors['images.0'])
                if (this.errors['images.1']) this.imagesError.push(this.errors['images.1'])
                if (this.errors['images.2']) this.imagesError.push(this.errors['images.2'])
            }

            if (this.message != null) {
                setTimeout(() => {
                    this.emitsButtonAnnuler()
                    this.$emit('mettreAjourDemandes'); // pour recharger tous les demandes lorsque un nouveau terrain est ajouté
                }, 3002);
            }

        }
    },

}
</script>