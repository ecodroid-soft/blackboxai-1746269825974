/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.php",
    "./components/**/*.php",
    "./services/**/*.php",
    "./locations/**/*.php"
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#4A90E2',
        'primary-dark': '#357ABD',
      },
      fontFamily: {
        'sans': ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
