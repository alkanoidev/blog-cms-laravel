/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  important: true,
  theme: {
    extend: {
      colors: {
        primary: "#FA6341",
      }
    },
  },
  plugins: [],
}