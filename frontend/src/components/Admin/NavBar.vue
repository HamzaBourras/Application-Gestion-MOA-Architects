<template>
    <div class=" w-full h-full flex flex-col justify-between bg-[#fbfaff]">
        <div class=" h-[85%]">
            <div class="flex justify-start pl-5 py-[20px]">
                <button @click="this.$router.go(-1)"><img class="w-[110px] h-[60px] cursor-pointer"
                        src="@/assets/logo-charafi.png" alt="..."></button>

            </div>
            <div class="">
                <ul class="text-left w-[85%] mx-auto">
                    <li @click="$emit('changerLienActif','Dashboard')" :class="`${lienActifNav == 'Dashboard' ? 'actif' : ''}`"
                        class="text-gray-600 py-3 pl-5 my-2 font-[500] hover:bg-slate-100 duration-200 cursor-default">
                        <span class="mr-3"><i class="fa-solid fa-house"></i></span>
                        <span>Dashboard</span>
                    </li>
                    <li @click="$emit('changerLienActif','Demandes')" :class="`${lienActifNav == 'Demandes' ? 'actif' : ''}`"
                        class="text-gray-600 py-3 pl-5 my-2  font-[500] hover:bg-slate-100 duration-200 cursor-default">
                        <span class="mr-3"><i class="fa-solid fa-code-pull-request"></i></span>
                        <span>Demandes</span>
                    </li>
                    <li @click="$emit('changerLienActif','Clients')" :class="`${lienActifNav == 'Clients' ? 'actif' : ''}`"
                        class="text-gray-600 py-3 pl-5 my-2  font-[500] hover:bg-slate-100 duration-200 cursor-default">
                        <span class="mr-3"><i class="fa-solid fa-user-secret"></i></span>
                        <span>Clients</span>
                    </li>
                    <li @click="$emit('changerLienActif','Contrats')" :class="`${lienActifNav == 'Contrats' ? 'actif' : ''}`"
                        class="text-gray-600 py-3 pl-5 my-2  font-[500] hover:bg-slate-100 duration-200 cursor-default">
                        <span class="mr-3"><i class="fa-solid fa-file-contract"></i></span>
                        <span>Contrats</span>
                    </li>
                    <li @click="$emit('changerLienActif','Projets')" :class="`${lienActifNav == 'Projets' ? 'actif' : ''}`"
                        class="text-gray-600 py-3 pl-5 my-2  font-[500] hover:bg-slate-100 duration-200 cursor-default">
                        <span class="mr-3"><i class="fa-solid fa-diagram-project"></i></span>
                        <span>Projets</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-[10%] flex items-center border-t-[1px] border-black ">
            <div class="flex  justify-start items-center w-full mx-auto">
                <button
                    class="font-[500] text-gray-600 w-[90%] mx-auto hover:text-blue-500 hover:bg-slate-100 duration-200 px-5 py-3 rounded-md"><span
                        class="mr-3"><i class="fa-solid fa-right-from-bracket"></i></span>se
                    deconnecter</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    emits:["changerLienActif"],
    props: {
        lienActifNav: {
            type:String
        }
    }
}
</script>

<style scoped>
.actif {
    color: rgb(59 130 246);
    border-left: 3px solid rgb(59, 130, 246);
    font-weight: 700;
    transform: scale(1.01);
}
</style>