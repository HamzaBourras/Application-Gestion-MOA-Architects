<template>
    <div class="flex flex-col justify-center bg-[#062a74] text-white">
        <div class="flex items-center justify-between py-4 pl-4 border-b-2  border-blue-400">
            <h1 @click="$emit('changeComponentAafficher','ProjetsDuType')"
                class="text-[35px] font-bold w-1/4 text-blue-400 cursor-pointer">{{
                projet.titre }}</h1>
        </div>
        <div class="flex justify-between items-center flex-wrap mt-[30px]">
            <div class="flex items-center justify-center flex-wrap w-full h-[450px] ">
                <img v-for="(image, i) in projet.images" :key="i" class="h-[350px] w-[40%] m-5 rounded-md"
                    :src="`http://localhost:8000/storage/${image}`" alt="">

            </div>
        </div>

    </div>
</template>

<script>
export default {
    emits: ["changeComponentAafficher"],
    props: {
        projet: {
            type:Object
        }
    }
}
</script>