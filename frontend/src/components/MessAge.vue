<template>
    <div :class="`${message != null ? 'text-green-600' : 'text-red-600'}`"
        class="divMessage bg-white rounded-lg py-[15px] px-[5px] mt-[15px] flex items-center justify-center w-full">
        <p class="tracking-[1px] text-center ">{{ message != null ? message : errorAction }}</p>
    </div>
</template>

<script>
export default {
    props: {
        message: {
            type: String
        },
        errorAction: {
            type:String
        }
    }
}
</script>


<style scoped>
.divMessage{
    animation: bounce 1s infinite;
    animation-iteration-count: 1.5;
}

@keyframes bounce {

    0%,
    100% {
        transform: translateY(-25%);
        animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
    }

    50% {
        transform: translateY(0);
        animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
    }
}
</style>
