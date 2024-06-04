<template>
    <div class="flex h-[100vh] relative ">
        <div class="w-1/6 h-full">
            <NavBar :lienActifNav="lienActif" @changeLienEmit="changeLienActif" :liens="liens" />
        </div>
        <div class="w-5/6 ">
            <div>
                <HeaDer :titre="lienActif" @changeLienEmit="changeLienActif" />
            </div>
            <div class="container3 h-[89.8vh] ">
                <div class="">
                    <div>
                        <InfosProfile v-if="lienActif == 'Profile'" @changeLienEmit="changeLienActif" />
                    </div>
                    <div>
                        <DashBoard v-if="lienActif == 'Dashboard'" @changeLienEmit="changeLienActif" />
                        <MesDemandes v-if="lienActif == 'Mes demandes'" />
                        <MesContrats v-if="lienActif == 'Mes contrats'" />
                        <MesProjets v-if="lienActif == 'Mes projets'" />
                        <MesRendezVous v-if="lienActif == 'Mes rendez-vous'" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import NavBar from "@/components/Admin/NavBar"
import HeaDer from '@/components/Admin/HeaDer'
import DashBoard from "@/components/Client/DashBoard"
import MesDemandes from "@/components/Client/MesDemandes/MesDemandes"
import MesContrats from "@/components/Client/MesContrats"
import MesProjets from "@/components/Client/MesProjets/MesProjets"
import MesRendezVous from "@/components/Client/MesRendezVous/MesRendezVous"

import InfosProfile from "@/components/InfosProfile"

export default {
    data() {
        return {
            lienActif: "",
            liens: [
                { lien: 'Dashboard', span: 'fa-solid fa-house' },
                { lien: 'Mes demandes', span: 'fa-solid fa-code-pull-request' },
                { lien: 'Mes contrats', span: 'fa-solid fa-file-signature' },
                { lien: 'Mes projets', span: 'fa-solid fa-diagram-project' },
                { lien: 'Mes rendez-vous', span: 'fa-solid fa-calendar-check' }
            ],
            mesDemandes: null,
            mesRendezVous: null,
            mesContrats: null,
            mesProjets: null
        }
    },

    components: {
        NavBar,
        HeaDer,
        DashBoard,
        MesDemandes,
        MesContrats,
        MesProjets,
        MesRendezVous,
        InfosProfile
    },
    methods: {
        changeLienActif(lien) {
            this.lienActif = lien
        },
    },

    mounted() {
        // choisi le lien actif est Dashboard en vérifiant si les données on était insérer
        const lienActifStocker = localStorage.getItem("lienActif");
        if (lienActifStocker) {
            this.lienActif = lienActifStocker;
        } else {
            localStorage.setItem("lienActif", "Dashboard");
            this.lienActif = "Dashboard";
        }

    },
    async beforeUnmount() {
        localStorage.removeItem("lienActif")


    },

}
</script>



<style scoped>
.container3 {
    background: linear-gradient(to bottom right,
            rgba(202, 220, 246, 0.4) 10%,
            rgba(0, 0, 0, 0.2) 100%),
        url('@/assets/dash1.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    overflow: auto;
}

.content {
    height: 100%;
    /* Ensure the content takes the full height of the container */
    /* Optional: add some padding */
}
</style>