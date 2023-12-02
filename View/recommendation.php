<?php
// Connect to the database
require '../Controller/rekomendasi.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KEIPAD</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="../Assets/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet"/>
    <link href="../dist/output.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="flex flex-col h-screen font-body">
    <header class="flex justify-center text-sm sm:text-2xl font-semibold text-primary mb-10">
      <a href="../index.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">home</button></a>
      <a href="brand_mousepad.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">mousepad</button></a>        
      <a class="cta" href="recommendation.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">recommendation</button></a>
      <a href="login.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">login</button></a>
    </header>

    <form method="POST" class="container flex-grow mx-auto p-8 text-primary">
      <div class="relative z-0 w-full mb-6 group">
        <label for="harga" class="font-semibold text-xl sm:text-2xl">Harga</label>
        <select name="harga" id="harga" class="block my-2 p-2 w-full bg-sky-800/25 rounded-lg text-black text-lg" required >
          <Option value="" disabled selected></Option>
          <Option value="1"> < 600.000 </Option>
          <Option value="2"> 600.000 - 1.199.999 </Option>
          <Option value="3"> 1.200.000 - 1.799.999 </Option>
          <Option value="4"> 1.800.000 - 3.000.000 </Option>
          <Option value="5"> > 3.000.000 </Option>
        </select>
      </div>

      <div class="relative z-0 w-full mb-6 group">
        <label for="ukuran" class="font-semibold text-xl sm:text-2xl">Ukuran</label>
        <select name="ukuran" id="ukuran" class="block my-2 p-2 w-full bg-sky-800/25 rounded-lg text-black text-lg" required >
          <Option value="" disabled selected></Option>
          <Option value="1">Pergerakan tangan kecil dan seadanya</Option>
          <Option value="2">Pergerakan tangan yang tidak terlalu mementingkan kecepatan dan luas</Option>
          <Option value="3">Pergerakan tangan yang tidak luas</Option>
          <Option value="4">Pergerakan tangan yang luas dan cepat tetapi efisien</Option>
          <Option value="5">Pergerakan tangan yang luas dan memakan tempat</Option>
        </select>
      </div>

      <div class="relative z-0 w-full mb-6 group">
        <label for="bahan" class="font-semibold text-xl sm:text-2xl">Bahan</label>
        <select name="bahan" id="bahan" class="block my-2 p-2 w-full bg-sky-800/25 rounded-lg text-black text-lg" required >
          <Option value="" disabled selected></Option>
          <Option value="1">Clothpad</Option>
          <Option value="2">Hardpad</Option>
        </select>
      </div>
  
      <div class="relative z-0 w-full mb-6 group">
        <label for="jahitan" class="font-semibold text-xl sm:text-2xl">Jahitan</label>
        <select name="jahitan" id="jahitan" class="block my-2 p-2 w-full bg-sky-800/25 rounded-lg text-black text-lg" required >
          <Option value="" disabled selected></Option>
          <Option value="1">Ada</Option>
          <Option value="2">Tidak ada</Option>
        </select>
      </div>

      <div class="relative z-0 w-full mb-6 group">
        <label for="ketebalan" class="font-semibold text-xl sm:text-2xl">Ketebalan</label>
        <select name="ketebalan" id="ketebalan" class="block my-2 p-2 w-full bg-sky-800/25 rounded-lg text-black text-lg" required >
          <Option value="" disabled selected></Option>
          <Option value="1">Permukaan meja yang rata</Option>
          <Option value="2">Permukaan meja yang lumayan rata</Option>
          <Option value="3">Permukaan meja yang sangat tidak rata</Option>
        </select>
      </div>
      </div>
      <button name="search" type="submit" class="px-4 py-2 border font-semibold rounded-md text-primary text-lg sm:text-xl hover:text-black">Search</button>
    </form>

    <footer class="bg-primary text-center">
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        © 2023 KEIPAD. All Rights Reserved.
      </div>
    </footer>
  </body>
</html>
