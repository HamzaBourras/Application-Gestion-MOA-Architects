<template>
    <div class="flex">
        <div class="w-1/6 h-[100vh]">
            <NavBar :lienActifNav="lienActif" @changerLienActif="mettreAjourLienActif" :liens="liens" />
        </div>
        <div class="w-5/6 ">
            <div>
                <HeaDer :titre="lienActif" />
            </div>
            <div>
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
import DemAndes from "@/components/Admin/DemAndes"
import CliEnts from "@/components/Admin/CliEnts"
import ConTrats from "@/components/Admin/ConTrats"
import ProJets from "@/components/Admin/ProJets"
import RendezVous from "@/components/Admin/RendezVous"

export default {
    data() {
        return {
            lienActif: "Dashboard",
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
    },
    methods: {
        mettreAjourLienActif(lien) {
            this.lienActif = lien
        }
    },
}
</script>