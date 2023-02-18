/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./node_modules/tw-elements/dist/js/**/*.js"
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
        'bg_table_tennis': "url('C:\\wamp64\\www\\patinoire\\table-tennis-game-sf\\public\\uploads\\bg_table_tennis.jpeg')",
      },
    },
  },

  plugins: [
      require('tw-elements/dist/plugin')
  ],
}

