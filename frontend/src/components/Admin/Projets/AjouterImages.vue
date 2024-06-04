<template>
    <div class="absolute z-50 left-1/2 bottom-[40%] -translate-x-1/2 -translate-y-1/2 w-[45%] h-max ">
        <div class="w-full h-full bg-slate-100 text-left rounded-xl py-[20px]">
            <div class="w-[85%] mx-auto " v-if="message != null || this.errorAction != null">
                <MessAgeComponent :message="message" :errorAction="errorAction" />
            </div>
            <form class="w-[85%] mt-[10px] mx-auto" @submit.prevent="ajouterImages">
                <div class="mt-4">
                    <input multiple @change="ajouterImageInImagesArray"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file">
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
                <div class="mt-5 flex justify-end">
                    <input type="submit" value="Ajouter" class=" cursor-pointer text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4
                        focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">
                    <button type=" button" @click="emitsButtonAnnuler()"
                        class="text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
import EnvoyerForm from "@/mixins/EnvoyerForm"
import { INSERER_IMAGES_PROJET } from "@/api/api"
import MessAgeComponent from "@/components/MessAge.vue"

export default {
    mixins: [EnvoyerForm],
    components: {
        MessAgeComponent
    },
    emits: ["changerVisibilite", "mettreAjourImages"],
    props: {
        projetId: {
            type: Number
        }
    },
    data() {
        return {
            images: [],
            imagesError: []  // les images qui ont une erreur de validation
        }
    },
    methods: {
        ajouterImageInImagesArray(event) {
            this.images = Array.from(event.target.files)

        },
        emitsButtonAnnuler() {
            this.$emit("changerVisibilite")  // pour cacher le component contient le form (ce component)
            this.images = []
            this.imageError = null
        },

        async ajouterImages() {
            // construire le format du data
            const formData = new FormData();
            this.images.forEach((image) => {
                formData.append('images[]', image)
            });

            await this.envoyer(formData, "post", INSERER_IMAGES_PROJET, this.projetId, true)
            this.imagesError = []
            // enregistrer les images qui ont des erreurs
            if (this.errors?.['images.0'] || this.errors?.['images.1'] || this.errors?.['images.2'] || this.errors?.['images.3']) {
                if (this.errors['images.0']) this.imagesError.push(this.errors['images.0'])
                if (this.errors['images.1']) this.imagesError.push(this.errors['images.1'])
                if (this.errors['images.2']) this.imagesError.push(this.errors['images.2'])
                if (this.errors['images.3']) this.imagesError.push(this.errors['images.3'])
            }

            if (this.message != null) {
                setTimeout(() => {
                    this.emitsButtonAnnuler()
                    this.$emit('mettreAjourImages'); // pour recharger tous les demandes lorsque un nouveau terrain est ajouté
                }, 1502);
            }

        }
    },
}

</script>
