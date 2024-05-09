<template>
  <header>
    <nav class="flex h-20 justify-between items-center mx-auto ">
      <div>
        <button @click="this.$router.go(-1)"><img class="w-24 cursor-pointer" src="@/assets/logo-charafi.png"
            alt="..."></button>
      </div>
      <div ref="navLinks"
        class="text-[17.5px] duration-500 md:static md:bg-inherit bg-white md:shadow-none shadow-md md:min-h-fit min-h-[60vh] right-0 top-[113px] md:w-auto  w-[45vw] flex items-center justify-center md:pt-0 pt-10 px-5">
        <ul class="flex md:flex-row flex-col md:items-center justify-start md:gap-[4vw] gap-8">
          <li>
            <router-link class="font-normal" to="/accueil"><span
                class="inline-block rounded text-[#0000008e] py-1 cursor-pointer">Accueil</span></router-link>
          </li>
          <li>
            <router-link class="font-normal" to="/types-des-experiences"><span
                class="inline-block rounded text-[#0000008e] py-1 cursor-pointer">Experiences</span></router-link>
          </li>
          <li>
            <router-link class="font-normal" to="/contact"><span
                class="inline-block rounded text-[#0000008e]  py-1 cursor-pointer">Contactez-nous</span></router-link>
          </li>
          <li>
            <router-link class="font-normal" to="/apropos"><span
                class="inline-block rounded text-[#0000008e] py-1 cursor-pointer">A propos de
                nous</span></router-link>
          </li>
        </ul>
      </div>
      <div class="flex items-center gap-6 ">
        <div>
          <router-link to="/authentifier" ><button
              class="border bg-blue-500 text-white font-normal tracking-[0.5px] hover:bg-blue-600 px-5 py-2 rounded-xl text-[16px] focus:ring-blue-700 focus:ring-2 focus:outline-none">Se
              connecter</button></router-link>
        </div>
        <!-- <ion-icon @click="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon> -->
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

<style scoped>
li span {
  position: relative;
}

li span::after {
  content: '';
  background: rgb(96 ,165 ,250);
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0%;
  height: 3px;
  transition: 0.3s;
}

li span:hover {
  color: black
}

li span:hover:after {
  width: 50%
}

.router-link-active {
  font-weight: 600;
  span::after {
    content: '';
    background: rgb(96, 165, 250);
    position: absolute;
    bottom: 0;
    left: 0;
    width: 80%;
    height: 3px;
  }

  span {
      color: #333
  }

}
</style>
