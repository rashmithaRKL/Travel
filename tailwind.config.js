/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.html",
    "./js/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'sl-green': '#2E8B57',
        'sl-light': '#F5F5F5',
      }
    }
  },
  plugins: [],
}
