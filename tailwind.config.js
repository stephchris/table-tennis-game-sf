/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./node_modules/tw-elements/dist/js/**/*.js",
    //"./public/**/*.jpg"
  ],
  theme: {
    backgroundColor: theme => ({
      ...theme('colors'),
      'blue': '#011e98',
      'lightblue': '#5875f1',
      'bluesky': '#9cacef',
    }),

    extend: {
      backgroundImage: {
        'table_tennis': "url('/public/uploads/bg_table_tennis.jpg')",
      },
    },
  },

  plugins: [
    require ('tw-elements/dist/plugin')
  ],
}

