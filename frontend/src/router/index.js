import { createRouter, createWebHashHistory } from "vue-router";
import PageAccueil from "@/views/PageAccueil.vue";
import PageExperiences from "@/views/PageExperiences";
const routes = [
  {
    name: "Accueil",
    path: "/accueil",
    component: PageAccueil,
  },
  {
    name: "Experiences",
    path: "/experiences",
    component: PageExperiences
  }
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
