<?php
  // Connect to the database
  require '../Controller/listmousepad.php';
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

    <main class="container flex-grow sm:my-12 mx-auto px-4 md:px-12">
      <div class="flex flex-wrap justify-center gap-8">
        <?php
          foreach ($mp as $mps):
        ?>
            
        <div class="w-72">
          <a href="detail_mousepad.php?id=<?= $mps['mousepad_id'] ?>">
            <img src="../Assets Mousepad/<?= $mps['merk_name'] ?>/<?= $mps['mousepad_img'] ?>"  class="container mx-auto h-64">
            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
              <p class="text-primary text-xl font-medium"><?= $mps['mousepad_name'] ?></p>
            </header>
          </a>
        </div>

        <?php
          endforeach;
        ?>
      </div>
    </main>

    <footer class="bg-primary text-center">
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        © 2023 KEIPAD. All Rights Reserved.
      </div>
    </footer>

  </body>

  
</html>
