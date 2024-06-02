<template>
    <div class="bg-blue-950 text-white h-max">
        <div class="flex flex-col justify-between items-start py-[30px] px-[30px]">
            <div class="w-full flex items-center justify-between mb-[20px]">
                <div class="flex items-center">
                    <img class="h-16 " src="@/assets/logo-charafi.png" alt="">
                    <p class="w-2/3 pl-1 pt-2 text-left text-[13px] font-[200] tracking-[0.5px]">
                        Architecte d'ENA, Master « Sustainable, resilient and smart design and city planning » à L'UM6P
                        Benguerir
                    </p>
                </div>
                <div class="relative w-1/3">
                    <input type="text" class="bg-white text-black h-11 w-full px-4 pr-20 rounded-md focus:outline-none "
                        placeholder="votre addresse email...">
                    <button
                        class="h-8 rounded bg-[#182444] absolute top-2 text-sm right-2 px-3 text-white hover:bg-gray-900 ">S'abonnez</button>
                </div>
            </div>

            <div class="flex items-center justify-between w-full my-[20px]">
                <div class="flex flex-col items-start pl-5">
                    <p class="mb-3 text-[15px] tracking-[1px] font-[200]">Suivez-nous</p>
                    <div class="flex items-center justify-between space-x-6">
                        <p>
                            <img src="@/assets/logo-facebook.png"
                                class="h-10 bg-white rounded-md cursor-pointer hover:translate-y-[4px]" alt="">
                        </p>
                        <p>
                            <img src="@/assets/logo-instagram.png"
                                class="h-10 rounded-md cursor-pointer hover:translate-y-[4px]" alt="">
                        </p>
                        <p><img src="@/assets/logo-linkedin.png"
                                class="h-10 rounded-sm cursor-pointer hover:translate-y-[4px]" alt="">
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-start justify-center tracking-[1px]">
                    <h2 class=" font-[600] mb-4 text-[17px]">Liens</h2>
                    <ul class="flex flex-col items-start text-sm space-y-2 text-[#ffffffb3]">
                        <li>Accueil</li>
                        <li>Experiences</li>
                        <li>Conatez-nous</li>
                        <li>A propos de nous</li>
                    </ul>
                </div>
                <div>
                    <h2 class=" font-[600] mb-4 text-[17px]">Services</h2>
                    <ul class="flex flex-col items-start text-sm space-y-2 text-[#ffffffb3]">
                        <li>Activité d’architecture</li>
                        <li>Urbanisme</li>
                        <li>Décoration</li>
                        <li>Aménagement</li>
                        <li>Rénovation</li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-left font-[600] mb-4 text-[17px]">Contact</h2>
                    <ul class="flex flex-col items-start text-sm space-y-2 text-[#ffffffb3]">
                        <li class="font-bold text-[15px] tracking-[0.2px]">Architecte Charafi Hamza </li>
                        <li>hamzacharafi@gmail.com</li>
                        <li>Tel- 05-24-43-77-61</li>
                        <li class="text-justify">27, Appt. 16 Imm. Nakhla, n° 91/89, 2ème étage,<br> Av. Zerktouni,
                            Guéliz, Marrakech </li>
                    </ul>

                </div>
            </div>
            <hr class="text-white h-2 w-full mt-4">
        </div>
    </div>
</template>
