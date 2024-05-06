<template>
    <div>
        <NavBar />
        <ProjetsDuType :typeExperienceChoisi="typeChoisi" />
        <FooTer />
    </div>
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import ProjetsDuType from '@/components/Projets-Du-Type/ProjetsDuType.vue';
import FooTer from "@/components/FooTer.vue"
// eslint-disable-next-line no-unused-vars
import {Concours,Consultation,Villa,ProjetsDivers} from "@/data/data1.js"

export default {
    components: {
        ProjetsDuType,
        NavBar,
        FooTer
    },
    data() {
        return {
            typeDExperience: "", // c'est le type cliqué, recu du route
            allTypes: [Concours, Consultation, Villa, ProjetsDivers],
            typeChoisi: null
        }
    },
    created() {
        this.typeDExperience = this.$route.params.typeExperience
        this.typeChoisi = this.findExperienceByType(this.typeDExperience)
    },
    methods: {
        findExperienceByType(type) {
            return this.allTypes.find(t => t.titre === type) || null
        }
    },
}

</script>