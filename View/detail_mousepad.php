<?php
  // Connect to the database
  require '../Include/database.php';
  $id=$_GET["id"];
  $detail= query("SELECT * FROM mousepad JOIN merk ON merk.merk_id = mousepad.merk_id WHERE mousepad_id=$id")[0];
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
    <header class="flex justify-center text-sm sm:text-2xl font-semibold text-primary sm:mb-16">
      <a href="../index.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">home</button></a>
      <a href="brand_mousepad.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">mousepad</button></a>        
      <a class="cta" href="recommendation.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">recommendation</button></a>
      <a href="login.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">login</button></a>
    </header>

    <div class="flex sm:flex-wrap flex-grow justify-center">
      <div class="grid sm:grid-cols-2">
        <img src="../Assets Mousepad/<?= $detail['merk_name'] ?>/<?= $detail['mousepad_img'] ?>" style="width:450px;" class="sm:mr-16">
          <div>
            <p class="justify-center text-primary text-center text-2xl font-bold"><?= $detail["mousepad_name"] ?></p>

            <div class="text-center sm:text-left">
              <div class="p-2 mt-4">
                <p class="text-lg sm:text-2xl font-semibold text-black">Ukuran</p>
                <p class="text-sm sm:text-lg text-black"><?= $detail["ukuran"] . " mm" ?></p>
              </div>

              <div class="p-2">
                <p class="text-lg sm:text-2xl font-semibold text-black">Bahan</p>
                <p class="text-sm sm:text-lg text-black"><?= $detail["bahan"]?></p>
              </div>

              <div class="p-2">
                <p class="text-lg sm:text-2xl font-semibold text-black">Jahitan</p>
                <p class="text-sm sm:text-lg text-black"><?= $detail["jahitan"]?></p>
              </div>

              <div class="p-2">
                <p class="text-lg sm:text-2xl font-semibold text-black">Ketebalan</p>
                <p class="text-sm sm:text-lg text-black"><?= $detail["ketebalan"] . " mm"?></p>
              </div>

              <div class="p-2">
                <p class="text-lg sm:text-2xl font-semibold text-black">Harga</p>
                <p class="text-sm sm:text-lg text-black"><?= "Rp " . number_format($detail["mousepad_harga"],0,".",".") ?></p>
              </div>
            </div>
          </div>
        </div>

    </div>

    <footer class="bg-primary text-center">
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        © 2023 KEIPAD. All Rights Reserved.
      </div>
    </footer>
  </body>
</html>
