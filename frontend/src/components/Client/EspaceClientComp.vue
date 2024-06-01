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
                        <DashBoard v-if="lienActif == 'Dashboard'" />
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

import EnvoyerForm from "@/mixins/EnvoyerForm"

import { TOUS_MES_RENDEZVOUS } from "@/api/api.js"
import { TOUS_MES_DEMANDES } from "@/api/api.js"
import { TOUS_MES_PROJETS } from "@/api/api.js"

export default {
    mixins: [EnvoyerForm],
    data() {
        return {
            lienActif: "Dashboard",
            liens: [
                { lien: 'Dashboard', span: 'fa-solid fa-house' },
                { lien: 'Mes demandes', span: 'fa-solid fa-code-pull-request' },
                { lien: 'Mes contrats', span: 'fa-solid fa-file-signature' },
                { lien: 'Mes projets', span: 'fa-solid fa-diagram-project' },
                { lien: 'Mes rendez-vous', span: 'fa-solid fa-calendar-check' }
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
        MesRendezVous,
        InfosProfile
    },
    methods: {
        changeLienActif(lien) {
            this.lienActif = lien
        },
        async recevoirMesDemandes() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id
            await this.envoyer(null, "get", TOUS_MES_DEMANDES, user_id, false)
            const mesDemandes = this.returnData
            localStorage.setItem("MesDemandes", JSON.stringify(mesDemandes))
        },
        async recevoirMesRendezVous() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id
            await this.envoyer(null, "get", TOUS_MES_RENDEZVOUS, user_id, false)
            const mesRendezVous = this.returnData
            localStorage.setItem("MesRendezVous", JSON.stringify(mesRendezVous))
        },
        async recevoirMesProjets() {
            const user_id = JSON.parse(localStorage.getItem("userAuth")).id
            await this.envoyer(null, "get", TOUS_MES_PROJETS, user_id, false)
            const mesProjets = this.returnData
            localStorage.setItem("MesProjets", JSON.stringify(mesProjets))
        },
        async recevoirMesContrats() {
            let mesContrats = []
            JSON.parse(localStorage.getItem("MesDemandes"))?.forEach(demande => {
                if (demande.contrat) mesContrats.push(demande.contrat)
            });
            localStorage.setItem("MesContrats", JSON.stringify(mesContrats))
        }
    },
    async mounted() {
        await this.recevoirMesDemandes()
        await this.recevoirMesRendezVous()
        await this.recevoirMesProjets()
        await this.recevoirMesContrats()

        // choisi le lien actif est Dashboard
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
    background: linear-gradient(rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.1)), url('@/assets/dash2.jpg');
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