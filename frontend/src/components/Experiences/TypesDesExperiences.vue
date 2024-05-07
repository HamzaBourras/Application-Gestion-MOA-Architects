<template>
    <div class="bg-[#062a74] text-white py-[20px]">
        <h1 class="text-center pt-[2%] mb-[40px] relative text-[50px] font-[700] tracking-[1px] ">Experiences</h1>
        <div class="flex flex-col items-center justify-center">
            <div class=" w-[90%] h-[50vh] my-[20px] border-2 border-blue-300 rounded-lg"
                v-for="(exper,i) in experiences" :key="i">
                <router-link :to="'/projets-du-type/'+ exper.title">
                    <div class="flex items-center justify-between">
                        <div :class="`${i % 2 == 0 ? 'order-first' : 'order-last'} w-1/2`">
                            <img class="h-[50vh] w-full object-cover" :src="exper.image" alt="">
                        </div>
                        <div class="w-1/2 h-[50vh] flex items-center">
                            <div class="space-y-10 flex flex-col justify-around">
                                <h2 class="text-[32px] tracking-[1px] font-[400]">{{ exper.title }}</h2>
                                <p class="text-justify w-2/3 m-auto tracking-[0.5px]">{{ exper.description }}</p>
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>

        </div>
    </div>
</template>

<script>
import {Experiences} from '@/data/data1.js';

export default {
    data() {
        return {
            experiences: Experiences
        }
    },
}
</script>

<style scoped>
h1::after {
    content: "";
    background: rgb(147, 197, 253);
    width: 350px;
    height: 5px;
    position: absolute;
    bottom: -2px;
    left: 50%;
    transform: translateX(-50%);
}
</style>



