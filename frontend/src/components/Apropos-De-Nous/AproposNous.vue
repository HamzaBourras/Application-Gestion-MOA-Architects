<template>
    <div class="bg-[#062a74] h-[89vh] flex items-center ">
        <div class="row w-[82%] grid gap-[50px] overflow-x-hidden m-auto py-[5rem] px-0 text-white">
            <div class="overflow-hidden group">
                <img class="w-full h-full object-cover duration-300 group-hover:scale-[1.25]" src="@/assets/pres1.png"
                    alt="">
            </div>
            <div class=" w-full flex items-center justify-center text-left pl-30px">
                <div>
                    <span class=" text-[20px] capitalize flex justify-self-start items-center gap-[15px] mb-[20px]">
                        <span class="inline-block bg-blue-300 w-[70px] h-[5px]"></span>Charafi Hamza
                    </span>
                    <h2 class="text-[40px] font-[700]  pb-[20px]">Moroccan Office of Architecture</h2>
                    <p class="text-[16px] leading-[25px] pb-[25px]">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Esse, consequuntur nesciunt at
                        laboriosam
                        soluta architecto cum vero, sapiente omnis quos dolores ad id, quam non placeat labore minus
                        molestiae veniam.</p>
                    <a class="inline-block uppercase bg-blue-400 text-white py-[15px] px-[40px] tracking-[1px] select-none"
                        href="">Décorer votre maison</a>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped >
.row{
    grid-template-columns: repeat(2,1fr);
}


</style>
