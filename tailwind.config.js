/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{html,js}",
    './src/pages/**/*.{html,js}',
    "./assets/**/*.js",
    './src/**/*.js',
    "./templates/**/*.html.twig",
    './pages/**/*.{html,js}',
    './components/**/*.{html,js}',
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
      blur: {
        xs: '3px',
      }

    },
  },

  plugins: [
    require ("tw-elements/dist/plugin", '@tailwindcss/forms')
  ],
}

