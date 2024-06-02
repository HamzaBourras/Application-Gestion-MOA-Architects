<template>
    <div class="flex h-[100vh] ">
        <div class="w-1/6 h-full">
            <NavBar :lienActifNav="lienActif" @changeLienEmit="changeLienActif" :liens="liens" />
        </div>
        <div class="w-5/6 ">
            <div>
                <HeaDer :titre="lienActif" @changeLienEmit="changeLienActif" />
            </div>
            <div class="container3 h-[89.8vh] ">
                <div class="content">
                    <div>
                        <InfosProfile v-if="lienActif == 'Profile'" @changeLienEmit="changeLienActif" />
                    </div>
                    <div>
                        <DashBoard v-if="lienActif == 'Dashboard'" @changeLienEmit="changeLienActif" />
                        <DemAndes v-if="lienActif == 'Demandes'" />
                        <CliEnts v-if="lienActif == 'Clients'" />
                        <ConTrats v-if="lienActif == 'Contrats'" />
                        <ProJets v-if="lienActif == 'Projets'" />
                        <RendezVous v-if="lienActif == 'Rendez-vous'" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import NavBar from "@/components/Admin/NavBar"
import HeaDer from '@/components/Admin/HeaDer'
import DashBoard from "@/components/Admin/DashBoard"
import DemAndes from "@/components/Admin/Demandes/DemAndes"
import CliEnts from "@/components/Admin/CliEnts"
import ConTrats from "@/components/Admin/ConTrats"
import ProJets from "@/components/Admin/Projets/ProJets"
import RendezVous from "@/components/Admin/RendezVous"

import InfosProfile from "@/components/InfosProfile"

export default {
    data() {
        return {
            lienActif: "",
            liens: [
                { lien: 'Dashboard', span: 'fa-solid fa-house' },
                { lien: 'Demandes', span: 'fa-solid fa-code-pull-request' },
                { lien: 'Clients', span: 'fa-solid fa-user-secret' },
                { lien: 'Contrats', span: 'fa-solid fa-file-signature' },
                { lien: 'Projets', span: 'fa-solid fa-diagram-project' },
                { lien: 'Rendez-vous', span: 'fa-solid fa-calendar-check' }     
            ]
        }
    },
    components: {
        NavBar,
        HeaDer,
        DashBoard,
        DemAndes,
        CliEnts,
        ConTrats,
        ProJets,
        RendezVous,
        InfosProfile
    },
    methods: {
        changeLienActif(lien) {
            this.lienActif = lien
        },
        changeAncienLienActif(ancienLien) {
            this.ancienlienActif = ancienLien
        },
        
    },
    async mounted() {
        const lienActifStocker = localStorage.getItem("lienActif");
        if (lienActifStocker) {
            this.lienActif = lienActifStocker;
        } else {
            localStorage.setItem("lienActif", "Dashboard");
            this.lienActif = "Dashboard";
        }

    },
    beforeUnmount() {
        localStorage.removeItem("lienActif")
    },
}
</script>


<style scoped>
.container3 {
    background: linear-gradient(rgba(255, 255, 255, 0.1), rgba(247, 246, 246, 0.1)), url('@/assets/dash2.jpg');
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
