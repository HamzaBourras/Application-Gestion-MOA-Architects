<template>
    <div class="flex">
        <div class="w-1/6 h-[100vh]">
            <NavBar :lienActifNav="lienActif" @changeLienEmit="changeLienActif" :liens="liens" />
        </div>
        <div class="w-5/6 ">
            <div>
                <HeaDer :titre="lienActif" @afficherProfile="afficheCompProfile = true" />
            </div>
            <div>
                <InfosProfile v-if="afficheCompProfile == true" />
            </div>
            <div v-if="afficheCompProfile == false ">
                <DashBoard v-if="lienActif == 'Dashboard'" />
                <DemAndes v-if="lienActif == 'Demandes'" />
                <CliEnts v-if="lienActif == 'Clients'" />
                <ConTrats v-if="lienActif == 'Contrats'" />
                <ProJets v-if="lienActif == 'Projets'" />
                <RendezVous v-if="lienActif == 'Rendez-vous'" />
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
            afficheCompProfile: true,
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
        }
    },
    mounted() {
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