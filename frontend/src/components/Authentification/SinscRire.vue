<template>
    <div class="h-[95%] inscrire w-[50%] ml-[30px] mr-[20px]"  >
        <!-- form -->
        <div class=" flex flex-col items-center w-full h-full ">
            <div class="w-full">
                <h1 class="text-2xl text-[#002D74] font-bold text-left">S' inscrire</h1>
                <p class="text-sm mt-3 text-[#002D74] text-left">Veuillez créer un compte</p>
            </div>
            <form class="w-full mt-8 mb-4" action="">
                <div class="flex flex-col items-start w-full ">
                    <div class="flex flex-col items-start w-full">
                        <label class="font-[450] block  text-gray-700" for="prenom">Votre prénom</label>
                        <input
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                            type="password" id="prenom">
                    </div>
                    <div class="flex flex-col items-start w-full mt-3">
                        <label class="font-[450] block text-gray-700" for="nom">Votre nom</label>
                        <input
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                            type="password" id="nom">
                    </div>

                    <div class="flex flex-col items-start w-full mt-3">
                        <label class="font-[450] block text-gray-700" for="email">Adresse e-mail</label>
                        <input
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                            type="email" id="email">
                    </div>
                    <div class="flex items-center space-x-3 mt-3">
                        <div class="flex flex-col items-start w-1/2">
                            <label class="font-[450] block text-gray-700" for="motpasse">Mot de passe</label>
                            <input
                                class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                type="password" id="motpasse">
                        </div>
                        <div class="flex flex-col items-start w-1/2">
                            <label class="font-[450] block text-gray-700" for="cin">Votre CIN</label>
                            <input
                                class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                type="text" id="cin">
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <input
                        class="w-full block bg-blue-400 hover:bg-blue-500 focus:bg-blue-500 text-white font-semibold rounded-lg px-4 py-3"
                        type="submit" value="S' inscrire">
                </div>
            </form>

            <!-- <div class="text-sm flex justify-between items-center mt-5">
                    <p>Si vous avez un compte..</p>
                    <button
                        class="py-2 px-5 ml-3 bg-white border rounded-xl hover:scale-110 duration-300 border-blue-400  ">Se
                        connecter</button>
                </div> -->
        </div>
    </div>
</template>



<style scoped >
.inscrire{
    animation: pulse 0.4s cubic-bezier(0.4, 0, 0.6, 1) 1;
}

@keyframes pulse {
  0% {
    opacity: 0;
  }
  25%{
    opacity: .25;
  }
  50% {
    opacity: .5;
  }
  75%{
    opacity: .75;
  }
  100%{
    opacity:1;
  }
}
</style>