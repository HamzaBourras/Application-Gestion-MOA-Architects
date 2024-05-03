<template>
  <header>
    <nav class="flex h-20 justify-between items-center mx-auto ">
      <div>
        <img class="w-24 cursor-pointer" src="@/assets/logo-charafi.png" alt="...">
      </div>
      <div ref="navLinks"
        class="text-[17.5px] duration-500 md:static md:bg-inherit bg-white md:shadow-none shadow-md absolute md:min-h-fit min-h-[60vh] right-0 top-[113px] md:w-auto  w-[45vw] flex items-center justify-center md:pt-0 pt-10 px-5">
        <ul class="flex md:flex-row flex-col md:items-center justify-start md:gap-[4vw] gap-8">
          <li>
            <span class="inline-block rounded text-[#0000008e] py-1 cursor-pointer">Accueil</span>
          </li>
          <li>
            <span class="inline-block rounded text-[#0000008e] py-1 cursor-pointer">Experiences</span>
          </li>
          <li>
            <span class="inline-block rounded text-[#0000008e]  py-1 cursor-pointer">Contactez-nous</span>
          </li>
          <li>
            <span class="inline-block rounded text-[#0000008e] py-1 cursor-pointer">A propos de nous</span>
          </li>
        </ul>
      </div>
      <div class="flex items-center gap-6">
        <div>
          <button
            class="border bg-blue-700 text-white hover:bg-blue-800 px-5 py-2 rounded-xl text-[16px] focus:ring-blue-500 focus:ring-2">Se
            connecter</button>
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

<style scoped>
li span {
  position: relative;
}
li span::after {
  content: '';
  background: #303ef7;
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

li span:hover::after {
  width: 50%
}

.button {
  display: inline-block;
  padding: 12px 28px;
  margin: 10px;
  font-size: 24px;
  font-weight: bold;
  text-transform: uppercase;
  color: #fff;
  background-image: linear-gradient(to bottom right, #00c6ff, #0072ff);
  border: none;
  border-radius: 40px;
  box-shadow: 0px 4px 0px #0072ff;
  transition: all 0.2s ease-in-out;
  cursor: pointer;
}

.button:hover {
  transform: translateY(-2px);
  box-shadow: 0px 6px 0px #0072ff;
}

.button:active {
  transform: translateY(0px);
  box-shadow: none;
  background-image: linear-gradient(to bottom right, #0072ff, #00c6ff);
}

.button:before,
.button:after {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
}

.button:before {
  top: -3px;
  left: -3px;
  border-radius: 40px;
  border-top: 3px solid #fff;
  border-left: 3px solid #fff;
}

.button:after {
  bottom: -3px;
  right: -3px;
  border-radius: 40px;
  border-bottom: 3px solid #fff;
  border-right: 3px solid #fff;
}

</style>

