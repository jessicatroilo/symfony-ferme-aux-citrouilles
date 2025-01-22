/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./src/**/*.php",
  ],
  theme: {
    colors: {
      'pearl': "#fbfcf8",
      'pumpkin': "#fdaa57",
      'pumpkin-dark': "#DF985E",
      'pumpkin-btn' : "#d16900",
      'leaf': "#739d7d",
      'farm-blue': "#3f646f",
      'form-error': '#cb0c0c'
    },
    fontFamily: {
      'title': ['"Cagliostro"', 'sans-serif'],
      'text': ['"Amiko"', 'sans-serif'],
    },
    extend: {
      backgroundImage: {
        'hero-pattern': "url('/public/images/champs-citrouilles.avif')",
      }
    },
  },
  plugins: [],
}

