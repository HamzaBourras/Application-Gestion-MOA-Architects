<template>
  <div class="container-1">
    <NavBar />
    <PresEntrep />
  </div>
  <div>
    <ServiceEntrep />
  </div>
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import PresEntrep from "@/components/Accueil/PresentationEntreprise.vue"
import ServiceEntrep from "@/components/Accueil/ServicesEntreprise.vue"
export default {
  components: { NavBar, PresEntrep, ServiceEntrep },
};
</script>

<style>
.container-1 {
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, .1)), url('@/assets/preseentre.png');
  background-size: cover;
  background-position: center;
}
</style>
