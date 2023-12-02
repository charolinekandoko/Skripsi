/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/main.css",
    "index.php",
    "./View/add_admin.php",
    "./View/add_mousepad.php",
    "./View/admin.php",
    "./View/detail_mousepad.php",
    "./View/edit_mousepad.php",
    "./View/footer.php",
    "./View/login.php",
    "./View/mousepad.php",
    "./View/brand_mousepad.php",
    "./View/navbar.php",
    "./View/recommendation.php",
    "./View/result_recommend.php",
],
  theme: {
    fontFamily:{
      'body': ['Montserrat', 'sans-serif'],
    },
    colors: {
      'primary': '#61AAC0',
      'black': '#000000',
      'white': '#FFFFFF',
    },
    extend: {
    },
  },
  plugins: [],
}

