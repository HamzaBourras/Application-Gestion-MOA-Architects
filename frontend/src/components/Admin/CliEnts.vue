<template>
    <div class="relative h-[86.7vh]">
        <div v-if="length != null && length == 0" class=" py-4 pl-8 text-left">
            <p class="text-lg">Ils n'y a pas des clients à afficher</p>
        </div>
        <div class="relative w-[98%] mt-[20px] mx-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
                <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="" class="px-6 py-3">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nom du client
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Prenom du client
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telephone
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="client in tousClients" :key="client.id"
                        class="bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ client.id }}
                        </th>
                        <td class="px-6 py-4 uppercase">
                            {{ client.nom }}
                        </td>
                        <td class="px-6 py-4 uppercase">
                            {{ client.prenom }}
                        </td>
                        <td class="px-6 py-4">
                            {{ client.email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ client.telephone }}
                        </td>
                        <!-- <td class="px-6 py-4">
                            <button type="button" 
                                class="focus:outline-none border-2 border-blue-500 bg-white text-blue-600  hover:bg-blue-50 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-4 py-2 ">
                                Voir plus </button>
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>


<script>
import {TOUS_CLIENTS} from "@/api/api"
import EnvoyerForm from "@/mixins/EnvoyerForm"


export default {
    mixins: [EnvoyerForm],
    data() {
        return {
            tousClients: [],
            length: null
        }
    },
    methods: {
        async recevoirClients() {
            await this.envoyer(null, "get", TOUS_CLIENTS, null, false)
            this.tousClients = this.returnData
            this.length = this.tousClients?.length
        }
    },
    async mounted() {
        await this.recevoirClients()
        console.log(this.tousClients);
    }
}
</script>