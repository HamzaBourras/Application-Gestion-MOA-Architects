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
                <MesDemandes v-if="lienActif == 'Mes demandes'" />
                <MesContrats v-if="lienActif == 'Mes contrats'" />
                <MesProjets v-if="lienActif == 'Mes projets'" />
                <MesRendezVous v-if="lienActif == 'Mes rendez-vous'" />
            </div>
        </div>
    </div>
</template>

<script>

import NavBar from "@/components/Admin/NavBar"
import HeaDer from '@/components/Admin/HeaDer'
import DashBoard from "@/components/Admin/DashBoard"
import MesDemandes from "@/components/Client/MesDemandes"
import MesContrats from "@/components/Client/MesContrats"
import MesProjets from "@/components/Client/MesProjets"
import MesRendezVous from "@/components/Client/MesRendezVous"

export default {
    data() {
        return {
            lienActif: "Mes demandes",
            liens: [
                { lien: 'Dashboard', span: 'fa-solid fa-house' },
                { lien: 'Mes demandes', span: 'fa-solid fa-code-pull-request' },
                { lien: 'Mes contrats', span: 'fa-solid fa-file-signature' },
                { lien: 'Mes projets', span: 'fa-solid fa-diagram-project' },
                { lien: 'Mes rendez-vous', span: 'fa-solid fa-calendar-check'}    
            ]
        }
    },

    components: {
        NavBar,
        HeaDer,
        DashBoard,
        MesDemandes,
        MesContrats,
        MesProjets,
        MesRendezVous
    },

    methods: {
        mettreAjourLienActif(lien) {
            this.lienActif = lien
        }
    },
}
</script>