/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      container: {
        center: true,
        padding: "16px",
      },
      fontFamily: {
        nunito: ["Nunito"],
        monserrat: ["Montserrat"],
      },
      colors: {
        primary: "#9E0000",
        background_light: "#f8f7f4",
        heading: "#616161",
        primary_teks: "#313131",
        secondary_teks: "#919191",
      },
      screens: {
        "2xl": "1320px",
      },
    },
  },
  plugins: [],
}

