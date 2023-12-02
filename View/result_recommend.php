<?php
  // Connect to the database
  session_start();
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

  <body class="font-body">
    <header class="flex justify-center text-sm sm:text-2xl font-semibold text-primary mb-10 sm:mb-14">
      <a href="../index.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">home</button></a>
      <a href="brand_mousepad.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">mousepad</button></a>        
      <a class="cta" href="recommendation.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">recommendation</button></a>
      <a href="login.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">login</button></a>
    </header>

    <main class="container sm:my-12 mx-auto px-4 md:px-12">
      <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 w-full h-screen">
        <?php
          $saw_mousepads = $_SESSION["saw_mousepads_10"];

          $i = 1;
          foreach ($saw_mousepads as $saw_mousepad):
        ?>

          <a href="detail_mousepad.php?id=<?= $saw_mousepad['mousepad_id'] ?>">
            <div class="text-2xl text-primary font-semibold p-4">
              <?= $i ?>
            </div>
            <div class="flex items-center justify-center rounded overflow-hidden shadow-lg h-44 sm:h-80">
              <img class="w-full" src="../Assets Mousepad/<?= $saw_mousepad['mousepad_merk'] ?>/<?= $saw_mousepad['mousepad_img'] ?>">
            </div>
            <div class="px-6 py-4">
              <p class="text-gray-700 text-base">
                <?= $saw_mousepad['mousepad_merk'] ?>
              </p>
              <div class="font-bold text-lg sm:text-xl mb-2"><?= $saw_mousepad['mousepad_name'] ?></div>
            </div>
            <div class="text-primary font-semibold text-lg px-6 pt-4 pb-2">
                <?= "Rp " . number_format($saw_mousepad['mousepad_harga'],0,".",".") ?>
            </div>
          </a> 
        
        <?php
          $i++;
          endforeach; 
        ?>
      </div>
    </main>
  </body>

</html>
