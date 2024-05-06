<template>
    <NavBar />
    <ExperiencesEntre />
    <FooTer />
    
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import FooTer from "@/components/FooTer.vue";
import ExperiencesEntre from "@/components/Experiences/ExperiencesEntreprise.vue";

export default {
    components: {
        NavBar,
        FooTer,
        ExperiencesEntre
    }
}
</script>