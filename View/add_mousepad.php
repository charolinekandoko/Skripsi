<?php
// Connect to the database
require '../Controller/add_mousepad.php';
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
    <div class="container flex flex-col font-bold text-primary mx-auto">
      <h1 class="text-center text-4xl p-4 mt-10">Welcome, admin!</h1>
      <p class="text-center text-xl mb-8">Glad to see you again</p>

      <div class="text-end text-xl hover:text-black mt-4 sm:mt-10 pr-10">
        <a href="../View/admin.php">Back to Admin's Page</a>
      </div>
    </div>

    <form method="POST" enctype="multipart/form-data" novalidate="" action="" class="container text-primary flex flex-col flex-grow mx-auto space-y-12 p-10 ng-untouched ng-pristine ng-valid">
        <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
          <div class="col-span-full sm:col-span-3">
            <label for="merk" class="font-semibold text-lg">Merk Mousepad</label>
            <select name="merk" id="merk" type="text" placeholder="Mousepad merk" class="w-full bg-sky-800/25 rounded-lg p-2 mt-2 text-black">
                  <?php 
                  $label = query("SELECT * FROM merk");

                  foreach($label as $merk):
                  ?>
                  <Option value="" disabled selected></Option>
                  <option value="<?=$merk['merk_id']?>"><?= $merk['merk_name']?></option>
                  <?php
                  endforeach;
                  ?>
                  
                  </select>
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="tipe" class="font-semibold text-lg">Mousepad Name</label>
            <input name="tipe" id="tipe" type="text" placeholder="Mousepad Name" class="w-full bg-sky-800/25 rounded-lg p-2 mt-2 text-black">
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="ukuran_name" class="font-semibold text-lg">Ukuran</label>
            <input name="ukuran_name" id="ukuran_name" type="text" placeholder="350x270/450x400/.." class="w-full bg-sky-800/25 rounded-lg p-2 mt-2 text-black">
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="ukuran" class="font-semibold text-lg">Ukuran</label>
              <select name="ukuran" id="ukuran" type="text" placeholder="Ukuran" class="w-full bg-sky-800/25 rounded-lg p-2 mt-2 text-black">
                <?php 
                  $ukr = query("SELECT * FROM ukuran");

                  foreach($ukr as $size):
                  ?>
                  <Option value="" disabled selected></Option>
                  <option value="<?=$size['ukuran_id']?>"><?= $size['min_ukuran']?> - <?= $size['max_ukuran']?></option>
                  <?php
                  endforeach;
                ?>
              </select>
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="jahitan" class="font-semibold text-lg">Jahitan</label>
              <select name="jahitan" id="jahitan" type="text" placeholder="Jahitan" class="w-full bg-sky-800/25 rounded-lg p-2 mt-2 text-black">
                <?php 
                  $jht = query("SELECT * FROM jahitan");

                  foreach($jht as $jhtn):
                  ?>
                  <Option value="" disabled selected></Option>
                  <option value="<?=$jhtn['jahitan_id']?>"><?= $jhtn['min_jahitan']?></option>  
                  <?php
                  endforeach;
                ?>
              </select> 
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="bahan" class="font-semibold text-lg">Bahan</label>
              <select name="bahan" id="bahan" type="text" placeholder="Bahan" class="w-full bg-sky-800/25 rounded-lg p-2 mt-2 text-black">
                <?php 
                  $bhn = query("SELECT * FROM bahan");

                  foreach($bhn as $bh):
                  ?>
                  <Option value="" disabled selected></Option>
                  <option value="<?=$bh['bahan_id']?>"><?= $bh['min_bahan']?></option>  
                  <?php
                  endforeach;
                ?>
              </select> 
          </div>     
          
          <div class="col-span-full sm:col-span-3">
            <label for="ketebalan" class="font-semibold text-lg">Ketebalan</label>
              <input name="ketebalan" id="ketebalan" type="text" placeholder="Ketebalan" class="w-full bg-sky-800/25 rounded-lg p-2 mt-2 text-black">
            </select>
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="harga" class="font-semibold text-lg">Harga</label>
            <input name="harga" id="harga" type="text" placeholder="Harga" class="w-full bg-sky-800/25 rounded-lg p-2 mt-2 text-black">
          </div>

          <div class="col-span-full sm:col-span-6">
            <label for="img" class="font-semibold text-lg">Mousepad Image</label>
            <input name="img" id="img" type="file" placeholder="" class="w-full bg-sky-800/25 rounded-lg p-2 mt-2 text-black">
          </div>

          <div class="col-span-full items-center space-x-2 ">
            <button name="submit" type="submit" class="px-4 py-2 border rounded-md hover:text-black">Submit</button>
          </div>
          </div>
    </form>

    <footer class="bg-primary text-center">
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        © 2023 KEIPAD. All Rights Reserved.
      </div>
    </footer>
</body>
  
</html>

