<template>
    <div class="bg-[#fff] w-full flex items-center justify-between shadow-sm mb-1 py-[20px] ">
        <div>
            <p class="text-[23px] pl-[20px] font-[600] text-blue-700 tracking-[0.5px]">{{titre}}</p>
        </div>
        <div class="flex items-center space-x-[22px] mr-[20px] ">
            <p><i class="fa-solid fa-gear text-[24px] hover:text-blue-700 hover:rotate-45 "></i></p>
            <div class="border-[3.5px] border-blue-700 rounded-[50%] cursor-pointer">
                <p class="flex items-center justify-center p-[5.5px] bg-[#dddddd] rounded-[50%] m-1 ">
                    <i class="fa-solid fa-user text-lg"></i>
                </p>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props: {
        titre: {
            type:String
        }
    }
}
</script>