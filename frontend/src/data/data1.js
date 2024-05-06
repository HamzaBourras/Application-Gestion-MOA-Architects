const Experiences = [
  {
    title: "Concours",
    image: require("@/assets/concours.jpg"),
    description:
      " Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, ea perferendis temporibus repellendus, rerum eum sit rem, aliquam laborum repellat ab quasi labore enim quia culpa Natus ratione libero accusamus ",
  },
  {
    title: "Consultation",
    image: require("@/assets/consultation.png"),
    description:
      " Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, ea perferendis temporibus repellendus, rerum eum sit rem, aliquam laborum repellat ab quasi labore enim quia culpa Natus ratione libero accusamus ",
  },
  {
    title: "Villa",
    image: require("@/assets/villa.png"),
    description:
      " Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, ea perferendis temporibus repellendus, rerum eum sit rem, aliquam laborum repellat ab quasi labore enim quia culpa Natus ratione libero accusamus ",
  },
  {
    title: "Projets divers",
    image: require("@/assets/projet-divers.png"),
    description:
      " Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, ea perferendis temporibus repellendus, rerum eum sit rem, aliquam laborum repellat ab quasi labore enim quia culpa Natus ratione libero accusamus ",
  },
];



const Concours = {
  titre: "Concours",
  projets: [
    {
      id: 1,
      title: "projet-Concours-1",
      image: require("@/assets/pres1.png"),
    },
    {
      id: 2,
      title: "projet-Concours-2",
      image: require("@/assets/pres2.jpg"),
    },
    // Répéter les mêmes images pour les nouveaux projets
    {
      id: 3,
      title: "projet-Concours-3",
      image: require("@/assets/pres1.png"),
    },
    {
      id: 4,
      title: "projet-Concours-4",
      image: require("@/assets/pres2.jpg"),
    },
  ],
};

const Consultation = {
  titre: "Consultation",
  projets: [
    {
      id: 1,
      title: "projet-Consultation-1",
      image: require("@/assets/pres1.png"),
    },
    {
      id: 2,
      title: "projet-Consultation-2",
      image: require("@/assets/pres2.jpg"),
    },
    // Répéter les mêmes images pour les nouveaux projets
    {
      id: 3,
      title: "projet-Consultation-3",
      image: require("@/assets/pres1.png"),
    },
    {
      id: 4,
      title: "projet-Consultation-4",
      image: require("@/assets/pres2.jpg"),
    },
  ],
};

const Villa = {
  titre: "Villa",
  projets: [
    {
      id: 1,
      title: "projet-Villa-1",
      image: require("@/assets/pres1.png"),
    },
    {
      id: 2,
      title: "projet-Villa-2",
      image: require("@/assets/pres2.jpg"),
    },
    // Répéter les mêmes images pour les nouveaux projets
    {
      id: 3,
      title: "projet-Villa-3",
      image: require("@/assets/pres1.png"),
    },
    {
      id: 4,
      title: "projet-Villa-4",
      image: require("@/assets/pres2.jpg"),
    },
  ],
};

const ProjetsDivers = {
  titre: "Projets divers",
  projets: [
    {
      id: 1,
      title: "projet-ProjetsDivers-1",
      image: require("@/assets/pres1.png"),
    },
    {
      id: 2,
      title: "projet-ProjetsDivers-2",
      image: require("@/assets/pres2.jpg"),
    },
    // Répéter les mêmes images pour les nouveaux projets
    {
      id: 3,
      title: "projet-ProjetsDivers-3",
      image: require("@/assets/pres1.png"),
    },
    {
      id: 4,
      title: "projet-ProjetsDivers-4",
      image: require("@/assets/pres2.jpg"),
    },
  ],
};

export { Concours, Consultation, Villa, ProjetsDivers, Experiences };

