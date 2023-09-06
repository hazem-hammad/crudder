/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      './resources/**/*.blade.php',
      './src/Modules/**/Resources/**/*.blade.php',
      './src/Foundation/Resources/**/*.blade.php'
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

