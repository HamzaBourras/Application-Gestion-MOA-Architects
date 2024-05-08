<template>
    <div>
        <SeConnecter />
        <SinscRire />
     </div>
</template>

<script>

import SeConnecter from '@/components/Authentification/SeConnecter.vue';
import SinscRire from '@/components/Authentification/SinscRire.vue'
export default {
    components: {
        SeConnecter,
        SinscRire
    }
}
</script>


<style scoped>
.container{
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, .1)), url('@/assets/pres1.png');
}
</style>