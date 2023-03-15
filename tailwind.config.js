/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{html,js}",
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  theme: {
    backgroundColor: theme => ({
      ...theme('colors'),
      //'blue': '#011e98',
      'lightblue': '#5875f1',
      'bluesky': '#9cacef',
    }),


    extend: {
      fontFamily: {
        source: ["Source Sans Pro"],
      },
    },
  },

  plugins: [
    require ('tw-elements/dist/plugin', '@tailwindcss/forms')
  ],
}

