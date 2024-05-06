<template>
    <NavBar />
    <PresEntrep />
    <ServiceEntrep />
    <CommentairesClie />
    <FooTer />
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import PresEntrep from "@/components/Accueil/PresentationEntreprise.vue"
import ServiceEntrep from "@/components/Accueil/ServicesEntreprise.vue"
import CommentairesClie from "@/components/Accueil/CommentairesClients"
import FooTer from "@/components/FooTer.vue"
export default {
  components: { NavBar, PresEntrep, ServiceEntrep, FooTer, CommentairesClie },
};
</script>


