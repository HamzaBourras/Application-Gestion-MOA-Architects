<template>
    <div class="bg-[#062a74] py-[40px] relative">
        <div
            class="flex justify-between items-center flex-wrap w-[65%] mx-auto absolute z-50 left-1/2 -translate-x-1/2 -translate-y-[20px]">
            <div class="h-[150px] w-[220px] flex flex-col items-center bg-[#fefefe] px-[5px]">
                <p class="pt-[5px] h-1/2 pb-[7px] flex items-center justify-center"><i
                        class="fa-solid fa-location-dot text-blue-300 text-[40px]"></i></p>
                <h2 class="font-[900] text-black pb-[5px] text-[14px]">NOTRE BUREAU PRINCIPAL</h2>
                <p class="text-[12px]">27, LOTISSEMENT DU CENTRE OUARZAZATE</p>
            </div>
            <div class="h-[150px] w-[220px] flex flex-col items-center bg-[#fefefe] px-[5px]">
                <p class="pt-[5px] h-1/2 pb-[7px] flex items-center justify-center"><i
                        class="fa-solid fa-mobile text-blue-300 text-[40px]"></i></p> 
                <h2 class="font-[900] text-black pb-[5px]">NUMÉRO DE TÉLÉPHONE</h2>
                <p>06-72-36-67-35</p>
            </div>
            <div class="h-[150px] w-[220px] flex flex-col items-center bg-[#fefefe] px-[5px]">
                <p class="pt-[5px] h-1/2 pb-[7px] flex items-center justify-center"><i
                        class="fa-solid fa-envelope text-blue-300 text-[40px]"></i></p>
                <h2 class="font-[900] text-black pb-[5px]">EMAIL</h2>
                <p>hamzacharafi@gmail.com</p>
            </div>
            <div class="h-[150px] w-[220px] flex flex-col items-center bg-[#fefefe] px-[5px]">
                <p class="pt-[5px] h-1/2 pb-[7px] flex items-center justify-center"><i
                        class="fa-solid fa-phone text-blue-300 text-[40px]"></i></p>
                <h2 class="font-[900] text-black pb-[5px]">NUMÉRO FIX</h2>
                <p>05-24-43-77-61</p>
            </div>

        </div>
        <div class="bg-blue-300 w-[45%] mx-auto pt-[80px] pb-[30px] relative mt-[80px]">
            <h1 class="text-[#062b73] text-[40px] font-bold">Contactez nous</h1>
            <div class="w-[50%] mx-auto ">
                <form action="" class="w-full">
                    <div>
                        <input class="bg-white px-3 py-2 focus:outline-none w-full my-[10px]" type="text"
                            placeholder="Entrez votre nom,prenom">
                    </div>
                    <div>
                        <input class="bg-white px-3 py-2 focus:outline-none w-full my-[10px]" type="email"
                            placeholder="Entrez votre email">
                    </div>
                    <div>
                        <textarea class="bg-white px-2 focus:outline-none py-1 w-full my-[10px]" name=""
                            placeholder="Votre message" id="" rows="6"></textarea>
                    </div>
                    <div>
                        <input type="submit"
                            class="border-[2px] border-white text-[#062b73] font-bold cursor-pointer hover:rounded-lg py-2 px-4 rounded-sm"
                            value="Envoyer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>