<template>
    <NavBar />
    <PresEntrep />
    <ServiceEntrep />
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import PresEntrep from "@/components/Accueil/PresentationEntreprise.vue"
import ServiceEntrep from "@/components/Accueil/ServicesEntreprise.vue"
export default {
  components: { NavBar, PresEntrep, ServiceEntrep },
};
</script>

