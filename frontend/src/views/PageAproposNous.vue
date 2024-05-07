<template>
    <div>
        <NavBar />
        <AproposNous />
        <FooTer />
    </div>
</template>


<script>
import NavBar from "@/components/NavBar.vue";
import FooTer from "@/components/FooTer.vue";
import AproposNous from "@/components/Apropos-De-Nous/AproposNous.vue"
export default {
    components: {
        NavBar,
        AproposNous,
        FooTer
    }
}

</script>