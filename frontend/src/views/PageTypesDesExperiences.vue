<template>
    <NavBar />
    <ExperiencesEntre />
    <FooTer />
    
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import FooTer from "@/components/FooTer.vue";
import ExperiencesEntre from "@/components/Experiences/TypesDesExperiences.vue";

export default {
    components: {
        NavBar,
        FooTer,
        ExperiencesEntre
    }
}
</script>