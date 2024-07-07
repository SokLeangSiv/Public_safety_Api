import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';


/** @type {import('tailwindcss').Config} */

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/jubeki/laravel-alpine-animations/resources/**/*.blade.php"
  ],
  theme: {
    extend: {},
  },
  daisyui: {
     themes: ["cupcake"],
  },
  plugins: [require("daisyui")],
};
