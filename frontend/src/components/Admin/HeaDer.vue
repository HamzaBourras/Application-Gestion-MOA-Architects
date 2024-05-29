<template>
    <div class="bg-[#fff] w-full flex items-center justify-between shadow-sm mb-1 py-[20px] ">
        <div>
            <p class="text-[23px] pl-[20px] font-[600] text-blue-700 tracking-[0.5px]">{{ titre }}</p>
        </div>

        <div class="w-1/6 pr-3 relative ">
            <div class="flex justify-end">
                <img v-if="user.image != null" id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                    data-dropdown-placement="bottom-start" class="w-10 h-12 rounded-full cursor-pointer"
                    :src="`http://localhost:8000/storage/${user.image}`" alt="" @click="toggleDropdown">
                <p v-else class="bg-slate-200 flex justify-center items-center p-2 rounded-[50%] cursor-pointer "
                    @click="toggleDropdown">
                    <i class="fa-solid fa-user text-2xl"></i>
                </p>

            </div>

            <!-- Dropdown menu -->
            <div id="userDropdown" ref="dropdown"
                class="z-10 w-full hidden absolute mt-2  text-left bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div class="uppercase">{{ user.nom + " " + user.prenom }}</div>
                    <div class="font-medium truncate">{{ user.email }}</div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                    <li>
                        <button @click="changeLien('Profile'); toggleDropdown()"
                            class=" block text-left h-full w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600
                            dark:hover:text-white">
                            Parametres
                        </button>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Se
                        deconnecter</a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    emits: ["changeLienEmit"],
    props: {
        titre: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            user: {},
        };
    },
    methods: {
        toggleDropdown() {
            this.$refs.dropdown.classList.toggle("hidden")
            this.recevoirUser()  // pour recharger le user lorsque il est changé
        },
        recevoirUser() {
            this.user = JSON.parse(localStorage.getItem("userAuth"))  
        },
        changeLien(lienActif) {
            // enregistrer l'ancien lien Actif dans localStorage
            const ancienLienActif = localStorage.getItem('lienActif')
            if (ancienLienActif != 'Profile') localStorage.setItem("ancienLienActif", ancienLienActif)

            //enregistrer le nouveau lien
            this.$emit("changeLienEmit", lienActif);
            if (typeof localStorage !== 'undefined') {
                localStorage.setItem('lienActif', lienActif);
            } else {
                console.error('LocalStorage n\'est pas disponible.');
            }
        },
    },
    mounted() {
        this.recevoirUser()
    }
}
</script>

