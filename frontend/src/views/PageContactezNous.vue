<template>
    <div>
        <NavBar />
        <ContactezNous />
        <FooTer />
    </div>
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import FooTer from "@/components/FooTer.vue";
import ContactezNous from '@/components/Contactez-Nous/ContactezNous.vue'
export default {
    components: {
        NavBar,
        ContactezNous,
        FooTer,
    }
}
</script>