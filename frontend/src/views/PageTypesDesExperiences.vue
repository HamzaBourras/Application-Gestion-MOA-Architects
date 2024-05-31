<template>
    <NavBar />
    <ExperiencesEntre v-if="componentAafficher == 'ExperiencesEntreprise' " @changeComponentAafficher="changeComponent"
        @changeTypeChoisi="changeType" />
    <ProjetsDuType v-if="componentAafficher == 'ProjetsDuType' " :typeExperienceChoisi="typeChoisi"
        @changeComponentAafficher="changeComponent" @changeProjet="changeProjet" />
    <ImagesProjet v-if="componentAafficher == 'ImagesProjet'" :projet="projet"
        @changeComponentAafficher="changeComponent" />
    <FooTer />

</template>

<script>
import NavBar from "@/components/NavBar.vue";
import FooTer from "@/components/FooTer.vue";
import ExperiencesEntre from "@/components/Experiences/TypesDesExperiences.vue";
import ProjetsDuType from "@/components/Experiences/ProjetsDuType.vue";
import ImagesProjet from "@/components/Experiences/ImagesProjet.vue";

export default {
    components: {
        NavBar,
        FooTer,
        ExperiencesEntre,
        ProjetsDuType,
        ImagesProjet
    },
    data() {
        return {
            componentAafficher: "ExperiencesEntreprise", // pour controler le component a afficher
            typeChoisi: null, // le type choisi pour afficher ces projets lorsque je clique sur voir les projets dans la page du type des experiences
            projet: {}  // projet à afficher ces images
        }
    },
    methods: {
        changeComponent(affiche) {
            this.componentAafficher = affiche
        },
        changeType(type) {
            this.typeChoisi = type
        },
        changeProjet(projet) {
            this.projet = projet
        }
    }
}
</script>