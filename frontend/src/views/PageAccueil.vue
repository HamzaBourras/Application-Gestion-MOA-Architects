<template>
    <NavBar />
    <PresEntrep />
    <ServiceEntrep />
    <FooTer />
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import PresEntrep from "@/components/Accueil/PresentationEntreprise.vue"
import ServiceEntrep from "@/components/Accueil/ServicesEntreprise.vue"
import FooTer from "@/components/FooTer.vue"
export default {
  components: { NavBar, PresEntrep, ServiceEntrep, FooTer },
};
</script>


