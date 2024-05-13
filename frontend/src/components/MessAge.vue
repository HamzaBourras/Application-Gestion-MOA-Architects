<template>
    <div class="divMessage bg-white border-2 border-green-600 rounded-lg py-[20px] flex items-center justify-center">
        <p class="tracking-[1px]">{{message}}</p>
    </div>
</template>

<script>
export default {
    props: {
        message: {
            type: String
        }
    }
}
</script>


<style scoped>
.divMessage{
    animation: bounce 1s infinite;
    animation-iteration-count: 3;
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
