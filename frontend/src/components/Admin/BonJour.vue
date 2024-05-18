<template>
    <div class="bg-white w-full">
        <div class="">
            <p class="text-blue-700 py-[15px] text-left pl-[40px] text-[26px]">Bonjour <span
                    class="font-[900] text-[27px]">
                    {{ prenom.toUpperCase()+" " }},
                </span></p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            prenom : ""
        }
    },
    mounted() {
       this.prenom = JSON.parse(localStorage.getItem("userAuth")).prenom;
    },
}
</script>