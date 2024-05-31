<template>
    <div class="flex flex-col justify-center bg-[#062a74] text-white">
        <div class="flex items-center justify-between py-4 pl-4 border-b-2  border-blue-400">
            <h1 @click="$emit('changeComponentAafficher', 'ExperiencesEntreprise')"
                class="text-[35px] font-bold w-1/4 text-blue-400 cursor-pointer">{{ typeExperienceChoisi }}</h1>
            <div class="w-1/3">
                <form class="flex items-center max-w-sm mx-auto">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="rechercher un projet ..." required />
                    </div>
                    <button type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-500 rounded-lg border border-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-700 ">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="flex justify-between items-center flex-wrap mt-[30px] p-[30px] h-max">
            <div @click="$emit('changeComponentAafficher', 'ImagesProjet'); $emit('changeProjet', projet) "
                class="flex flex-col items-center justify-center w-[48%] h-max cursor-pointer "
                v-for="projet in projets" :key="projet.id">
                <img class="object-cover h-[250px] w-[70%] rounded-md"
                    :src="`http://localhost:8000/storage/${projet.images[0]}`" alt="">
                <h2 class="text-xl font-bold mt-4 ">{{projet.titre}}</h2>
            </div>
        </div>

    </div>
</template>

<script>
import {TOUS_PROJETS_DU_TYPE} from "@/api/api"
import EnvoyerForm from "@/mixins/EnvoyerForm"
export default {
    emits: ["changeComponentAafficher","changeProjet"],
    mixins: [EnvoyerForm],
    props: {
        typeExperienceChoisi: {
            type: String
        }
    },
    data() {
        return {
            projets : [],
        }
    },
    methods: {
        async recevoirProjets() {
            await this.envoyer(null, "get", TOUS_PROJETS_DU_TYPE, this.typeExperienceChoisi, false)
            this.projets = this.returnData
        }
    },
    async mounted() {
        await this.recevoirProjets()
        // console.log(this.TypesDesExperiences);

    },
}
</script>