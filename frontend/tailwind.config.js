/** @type {import('tailwindcss').Config} */
module.exports = {
  purge: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}", "./node_modules/flowbite/**/*.js"],
  content: [],
  theme: {
    extend: {},
  },
  plugins: [require("flowbite/plugin")],
};

