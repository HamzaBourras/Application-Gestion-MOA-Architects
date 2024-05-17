<template>
    <div class="flex">
        <div class="w-1/6 h-[100vh]">
            <NavBar :lienActifNav="lienActif" @changeLienEmit="changeLienActif"  />
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

export default {
    data() {
        return {
            lienActif: ""
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
    },
    methods: {
        changeLienActif() {
            this.lienActif = localStorage.getItem("lienActif")
        }
    },
    beforeMount(){  // choisi le lien actif est Dashboard
        localStorage.setItem("lienActif", "Dashboard");
        this.changeLienActif()
    },
    
}
</script>