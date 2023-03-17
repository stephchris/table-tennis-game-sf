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
      'blue': '#313485',
      'yellow': '#ccd65c',
    }),


    extend: {
      colors: {
        'blue': '#313485',
        'yellow': '#ccd65c',
      },
      fontFamily: {
        source: ["Roboto"],
      },


    },
  },

  plugins: [
    require ('tw-elements/dist/plugin', '@tailwindcss/forms')
  ],
}

