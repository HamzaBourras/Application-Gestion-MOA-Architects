<template>
    <div class="w-full pt-[20px] pb-[60px]">
        <h1 class="text-center pt-[2%] mb-[60px] relative text-[40px] font-[700]">Nos Services</h1>
        <div class="flex justify-items-center justify-center flex-wrap">
            <div  v-for="(service,i) in services" :key="i"
                class="w-[30%] h-[150px] service group hover:bg-blue-400 hover:text-white hover:translate-y-[-8px] text-center py-6 px-4 m-2 rounded-lg text-sm cursor-pointer bg-transparent">
                <h2 class="font-semibold mb-[18px] text-lg">{{ service.titre.toUpperCase() }}</h2>
                <p class="group-hover:text-[#ffffffc0] text-justify tracking-[1px]">{{service.text}}</p>
            </div>


        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            services: [
                {
                    "titre": "Activité d’architecture",
                    "text": "Conception de bâtiments et création de designs graphiques pour accompagner les projets architecturaux."
                },
                {
                    "titre": "Urbanisme",
                    "text": "Planification et développement de zones urbaines, incluant la gestion de l'infrastructure et l'optimisation de l'espace."
                },
                {
                    "titre": "Décoration",
                    "text": "Aménagement intérieur des espaces, alliant esthétique et fonctionnalité."
                },
                {
                    "titre": "Aménagement",
                    "text": "Organisation et structuration des espaces extérieurs et intérieurs pour une utilisation optimale."
                },
                {
                    "titre": "Rénovation",
                    "text": "Réhabilitation de structures existantes pour améliorer leur fonctionnalité et leur apparence."
                },
                {
                    "titre": "Design",
                    "text": "Création de concepts esthétiques pour divers projets, englobant le design d'intérieur et d'extérieur."
                },
                {
                    "titre": "Maquette 3D",
                    "text": "Réalisation de maquettes tridimensionnelles pour visualiser les projets avant leur exécution."
                },
                {
                    "titre": "Animation 3D",
                    "text": "Production de séquences animées en 3D pour illustrer de manière dynamique les projets architecturaux."
                },
            ]

        }
    }
}
</script>

<style scoped>

h1::after {
    content: "";
    background: rgb(147, 197, 253);
    width: 100px;
    height: 5px;
    position: absolute;
    bottom: -1px;
    left: 50%;
    transform: translateX(-50%);
}

.service {
    transition: transform 0.5s, background 0.5s ;
    border: 1px solid rgb(147, 197, 253);
}

</style>