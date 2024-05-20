import { createRouter, createWebHashHistory } from "vue-router";
import PageAccueil from "@/views/PageAccueil.vue";
import PageTypesDesExperiences from "@/views/PageTypesDesExperiences.vue";
import PageProjetsDuType from "@/views/PageProjetsDuType.vue";
import PageContactezNous from '@/views/PageContactezNous.vue';
import PageAproposNous from "@/views/PageAproposNous.vue";
import PageAuthentification from "@/views/PageAuthentification.vue";

import EspaceAdmin from "@/views/Admin/EspaceAdmin.vue";
import EspaceClient from "@/views/Client/EspaceClient.vue"

// import PageRacine from "@/views/PageRacine"

import TestComp from "@/components/Admin/HeaDer"


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
    beforeEnter: (to,from, next) => {
      const user = JSON.parse(localStorage.getItem("userAuth"));
      if (user != null) {
        return next(from.fullPath)
      }
      next();
    },
  },

  {
    name: "espace admin",
    path: "/espace/admin",
    component: EspaceAdmin,
    beforeEnter: (to, from, next) => {
      const token = localStorage.getItem("token");
      if (token == null) {
        return next({
          name: "authentification",
        });
      }
      next();
    },
  },

  {
    name: "espace client",
    path: "/espace/client",
    component: EspaceClient,
    beforeEnter: (to, from, next) => {
      const token = localStorage.getItem("token");
      if (token == null) {
        return next({
          name: "authentification",
        });
      }
      next();
    },
  },

  {
    name: "test",
    path: "/test",
    component: TestComp,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
