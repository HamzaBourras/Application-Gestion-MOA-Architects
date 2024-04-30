<template>
  <header>
    <nav class="flex bg-white h-20 shadow-md justify-between items-center mx-auto ">
      <div>
        <img class="w-20 cursor-pointer" src="@/assets/logo.png" alt="...">
      </div>
      <div ref="navLinks"
        class=" duration-500 md:static bg-white md:shadow-none shadow-md absolute md:min-h-fit min-h-[60vh] right-0 top-[113px] md:w-auto  w-[45vw] flex items-center justify-center md:pt-0 pt-10 px-5">
        <ul class="flex md:flex-row flex-col md:items-center justify-start md:gap-[4vw] gap-8">
          <li>
            <span
              class="inline-block border border-white rounded hover:border-gray-200 text-black hover:bg-gray-200 py-2 px-4 cursor-pointer"
            >Accueil</span>
          </li>
          <li>
            <span class="inline-block border border-white rounded hover:border-gray-200 text-black hover:bg-gray-200 py-2 px-4 cursor-pointer">Experiences</span>
          </li>
          <li>
            <span class="inline-block border border-white rounded hover:border-gray-200 text-black  hover:bg-gray-200 py-2 px-4 cursor-pointer">Contactez-nous</span>
          </li>
          <li>
            <span class="inline-block border border-white rounded hover:border-gray-200 text-black hover:bg-gray-200 py-2 px-4 cursor-pointer">à propos de nous</span>
          </li>
        </ul>
      </div>
      <div class="flex items-center gap-6">
        <div>
          <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]">Se connecter</button>
        </div>
        <ion-icon @click="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  methods: {
    onToggleMenu(e) {
      e.name = e.name === 'menu' ? 'close' : 'menu'
      this.$refs.navLinks.classList.toggle('top-[9%]')
    }
  },
}

</script>
