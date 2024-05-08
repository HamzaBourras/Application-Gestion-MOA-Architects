<template>
    <div class="bg-[#062a74] h-[90vh] flex items-center ">
        <div class="contactUs relative w-[90%] m-auto pb-[20px] px-[100px] ">
            <div class="title flex justify-center items-center text-[2em] ">
                <h2 class="text-white font-[700] tracking-[0.5px] pb-[20px] text-left w-full">Rester en contact</h2>
            </div>
            <div class="box relative grid  ">
                <!-- Form Box -->
                <div class=" form p-[30px] bg-[#fff] shadow-[0 5px 35px ] ">
                    <h3 class="text-blue-400 font-[500] text-[1.3em] mb-[10px] text-left ">Envoyer un message</h3>
                    <form action="">
                        <div class="formBox relative w-full  ">
                            <div class="row50 flex gap-[20px]">
                                <div class="inputBox flex flex-col mb-[10px] w-1/2 ">
                                    <span
                                        class="text-blue-400 pl-2 text-left mt-[10px] mb-[5px] font-[500] ">Prénom</span>
                                    <input
                                        class="p-[10px] text-[1em] outline-none border-[1px] border-solid border-[#333]  "
                                        type="text" placeholder="votre prénom ...">
                                </div>
                                <div class="inputBox flex flex-col mb-[10px] w-1/2 ">
                                    <span class="text-blue-400 pl-2 text-left mt-[10px] mb-[5px] font-[500] ">Nom</span>
                                    <input
                                        class="p-[10px] text-[1em] outline-none border-[1px] border-solid border-[#333]  "
                                        type="text" placeholder="votre nom ...">
                                </div>
                            </div>

                            <div class="row50 flex gap-[20px]">
                                <div class="inputBox flex flex-col mb-[10px] w-1/2 ">
                                    <span
                                        class="text-blue-400 pl-2 text-left mt-[10px] mb-[5px] font-[500] ">Telephone</span>
                                    <input
                                        class="p-[10px] text-[1em] outline-none border-[1px] border-solid border-[#333]  "
                                        type="text" placeholder="06 12 34 56 78 ...">
                                </div>
                                <div class="inputBox flex flex-col mb-[10px] w-1/2 ">
                                    <span
                                        class="text-blue-400 pl-2 text-left mt-[10px] mb-[5px] font-[500] ">Email</span>
                                    <input
                                        class="p-[10px] text-[1em] outline-none border-[1px] border-solid border-[#333]  "
                                        type="email" placeholder="example@gmail.com ...">
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox flex flex-col mb-[10px] w-full ">
                                    <span
                                        class="text-blue-400 pl-2 text-left mt-[10px] mb-[5px] font-[500] ">Message</span>
                                    <textarea
                                        class="p-[10px] text-[1em] outline-none border-[1px] border-solid border-[#333] resize-none min-h-[120px] mb-[10px]"
                                        name="" placeholder="votre message ici ..." id=""></textarea>
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox flex flex-col mb-[10px] w-full ">
                                    <input
                                        class="bg-blue-400 hover:rounded-lg duration-200 text-white border-none text-[1em] max-w-[120px] font-[500] cursor-pointer py-[14px] px-[15px]"
                                        type="submit" value="envoyer">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Infos Box -->
                <div class=" info p-[30px] bg-blue-400 ">
                    <h3 class="text-white font-[500] text-[1.3em] mb-[10px] text-left ">Coordonnées</h3>
                    <div class="infoBox flex flex-col items-start space-y-[10px]">
                        <div class="flex mb-[10px] items-center justify-between">
                            <span
                                class="min-w-[40px] h-[40px] text-white bg-[#333] flex justify-center items-center text-[1.2em] rounded-[50%] mr-[15px]  "><i
                                    class="fa-solid fa-phone"></i></span>
                            <a href="tel:+212524437761">+212 524-437761</a>
                        </div>
                        <div class="flex mb-[10px] items-center justify-between">
                            <span
                                class="min-w-[40px] h-[40px] text-white bg-[#333] flex justify-center items-center text-[1.2em] rounded-[50%] mr-[15px]  "><i
                                    class="fa-solid fa-envelope"></i></span>
                            <a href="mailto:hamzacharafi@gmail.com">hamzacharafi@gmail.com</a>
                        </div>
                        <div class="flex mb-[10px] items-center justify-between">
                            <span
                                class="min-w-[40px] h-[40px] text-white bg-[#333] flex justify-center items-center text-[1.2em] rounded-[50%] mr-[15px]  "><i
                                    class="fa-solid fa-location-dot"></i></span>
                            <p class="text-left">27, Appt. 16 Imm. Nakhla, n° 91/89, 2ème étage,Av. Zerktouni, Guéliz,
                                Marrakech</p>
                        </div>

                    </div>
                </div>

                <!-- Map Box -->
                <div class=" map bg-[#fff] shadow-[0 5px 35px ] ">
                    <iframe class="w-full h-full"  src="https://www.google.com/maps?q=(Moroccan Office of Architecture)&output=embed"
                        frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</template>
<!--  -->
"https://www.google.com/maps?q=encodeURIComponent("marrakech")&output=embed"
<style scoped>
.box {
    grid-template-columns: 2fr 1fr;
    grid-template-rows: 5fr 4fr;
    grid-template-areas: "form info" "form map";
    grid-gap: 10px;
}

.form {
    grid-area: form;
}

.info {
    grid-area: info;
}

.map {
    grid-area: map;
}

.inputBox ::placeholder {
    color: #999;
}
</style>