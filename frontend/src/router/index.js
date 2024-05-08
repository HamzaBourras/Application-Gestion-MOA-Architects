import { createRouter, createWebHashHistory } from "vue-router";
import PageAccueil from "@/views/PageAccueil.vue";
import PageTypesDesExperiences from "@/views/PageTypesDesExperiences.vue";
import PageProjetsDuType from "@/views/PageProjetsDuType.vue";
import PageContactezNous from '@/views/PageContactezNous.vue';
import PageAproposNous from "@/views/PageAproposNous.vue";
import PageAuthentification from "@/views/PageAuthentification";
const routes = [
  {
    name: "Accueil",
    path: "/accueil",
    component: PageAccueil,
  },
  {
    name: "types des experiences",
    path: "/types-des-experiences",
    component: PageTypesDesExperiences,
  },
  {
    name: "Type's Projects",
    path: "/projets-du-type/:typeExperience",
    component: PageProjetsDuType,
  },
  {
    name: "contactez-nous",
    path: "/contact",
    component: PageContactezNous,
  },
  {
    name: "à propos de nous ",
    path: "/apropos",
    component: PageAproposNous,
  },
  {
    name: "authentification",
    path: "/authentifier",
    component: PageAuthentification
  }
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
