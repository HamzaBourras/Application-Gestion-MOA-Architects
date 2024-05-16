import { createRouter, createWebHashHistory } from "vue-router";
import PageAccueil from "@/views/PageAccueil.vue";
import PageTypesDesExperiences from "@/views/PageTypesDesExperiences.vue";
import PageProjetsDuType from "@/views/PageProjetsDuType.vue";
import PageContactezNous from '@/views/PageContactezNous.vue';
import PageAproposNous from "@/views/PageAproposNous.vue";
import PageAuthentification from "@/views/PageAuthentification.vue";

import EspaceAdmin from "@/views/Admin/EspaceAdmin.vue";
import EspaceClient from "@/views/Client/EspaceClient.vue"

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
    component: PageAuthentification,
  },

  {
    name: "espace admin",
    path: "/espace/admin",
    component: EspaceAdmin,
  },

  {
    name: "espace client",
    path: "/espace/client",
    component: EspaceClient,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
