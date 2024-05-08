<template>
    <div class="container h-[100vh] py-[20px] flex items-center justify-center">
        <div class="bg-[#f3f4f6] flex items-center justify-between w-[55%] h-[80vh] rounded-2xl py-[30px] px-[10px] ">
            <!-- form -->
            <div class="h-full flex flex-col items-center justify-center pl-[20px]">
                <div>
                    <h1 class="text-2xl text-[#002D74] font-bold text-left ">Se connecter</h1>
                    <p class="text-sm mt-4 text-[#002D74]">Si vous avez un compte, veuillez vous connecter</p>
                </div>
                <form class="w-full mt-6" action="">
                    <div class="flex flex-col items-start w-full ">
                        <div class="flex flex-col items-start w-full">
                            <label class="font-[450] block mb-2 text-gray-700" for="email">Adresse e-mail</label>
                            <input
                                class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                type="email" id="email">
                        </div>
                        <div class="flex flex-col items-start w-full mt-3">
                            <label class="font-[450] block mb-2 text-gray-700" for="motpasse">Mot de passe</label>
                            <input
                                class="w-full px-4 py-2.5 rounded-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none "
                                type="password" id="motpasse">
                        </div>
                    </div>
                    <div
                        class="flex justify-end mt-4 font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700 text-sm">
                        <a href="#">Mot de passe oublié ?</a>
                    </div>
                    <div class="mt-6">
                        <input
                            class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3"
                            type="submit" value="Se connecter">
                    </div>
                </form>

                <div class="mt-7 grid grid-cols-3 items-center text-gray-500 w-full ">
                    <hr class="border-gray-500" />
                    <p class="text-center text-sm">OR</p>
                    <hr class="border-gray-500" />
                </div>

                <!-- avec google -->
                <div class="w-full">
                    <button
                        class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 ">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            class="w-6 h-6" viewBox="0 0 48 48">
                            <defs>
                                <path id="a"
                                    d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                            </defs>
                            <clipPath id="b">
                                <use xlink:href="#a" overflow="visible" />
                            </clipPath>
                            <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                            <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                            <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                            <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                        </svg>
                        <span class="ml-4">Se connecter avec google</span>
                    </button>
                </div>

                <div class="text-sm flex justify-between items-center mt-5">
                    <p>Si vous n'avez pas un compte..</p>
                    <button
                        class="py-2 px-5 ml-3 bg-white border rounded-xl hover:scale-110 duration-300 border-blue-400  ">S'inscrire</button>
                </div>
            </div>

            <!-- Image -->
            <div class="w-[50%] h-full mx-[10px]">
                <img class="h-full rounded-2xl " src="@/assets/authentifier-image.jpg" alt="">
            </div>
        </div>
    </div>
</template>