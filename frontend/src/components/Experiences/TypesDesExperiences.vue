<template>
    <div class="bg-[#062a74] text-white py-[20px]">
        <h1 class="text-center pt-[1%] mb-[40px] relative text-[45px] font-[700] tracking-[1px] ">Experiences</h1>
        <div class="flex flex-col items-center h-full justify-center">
            <div class=" w-[90%] h-[318px] my-[20px] border-2 border-blue-400 overflow-hidden  rounded-none"
                v-for="(exper, i) in experiences" :key="i">
                <div class="flex h-full items-center justify-between ">
                    <div :class="`${i % 2 == 0 ? 'order-first' : 'order-last'} w-1/2`">
                        <img class="h-full w-full object-cover" :src="exper.image" alt="">
                    </div>
                    <div class="w-1/2 h-full flex flex-col space-y-[40px] justify-around">
                        <div class="space-y-5 flex flex-col justify-around">
                            <h2 class="text-[32px] tracking-[1px] font-[500]">{{ exper.title }}</h2>
                            <p class="text-justify w-2/3 m-auto tracking-[0.5px]">{{ exper.description }}</p>
                        </div>
                        <div>
                            <button
                                @click="$emit('changeComponentAafficher', 'ProjetsDuType'); $emit('changeTypeChoisi',exper.title) "
                                class=" text-white bg-blue-400 py-[10px] px-[30px] mb-[20px] cursor-pointer
                                hover:px-[45px] duration-300 ">Voir
                                les projets</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
import { Experiences } from '@/data/data1.js';

export default {
    emits:["changeComponentAafficher","changeTypeChoisi"],
    data() {
        return {
            experiences: Experiences,
        }
    },
    methods: {
        
    },
}
</script>

<style scoped>
h1::after {
    content: "";
    background: rgb(96, 165, 250);
    width: 350px;
    height: 5px;
    position: absolute;
    bottom: 4px;
    left: 50%;
    transform: translateX(-50%);
}
</style>
