import { createRouter, createWebHashHistory } from "vue-router";
import PageAccueil from "@/views/PageAccueil.vue";
const routes = [
  {
    name: "Accueil",
    path: "/accueil",
    component: PageAccueil,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
