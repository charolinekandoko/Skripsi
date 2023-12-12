<?php
    // Connect to the database
    require '../Controller/edit_mousepad.php';
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

  <main class="flex-grow">
    <form method="POST" enctype="multipart/form-data" novalidate="" action="" class="container flex flex-col mx-auto space-y-12 p-10 ng-untouched ng-pristine ng-valid">
        <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
          <div class="col-span-full sm:col-span-3">
            <label for="merk" class="text-primary text-xl font-medium p-2">Merk Mousepad</label>
            <select name="merk" id="merk" type="text" placeholder="Merk Mousepad" class="w-full bg-sky-800/25 rounded-lg p-2 mt-2">
            <Option value="" disable ></Option>
              <?php
              $label = query("SELECT * FROM merk");
              
              foreach ($label as $merk) :
              ?>
                
                <option value="<?= $merk['merk_id'] ?>" 
                <?php if($merk['merk_id']==$mousepad['merk_id']){
                  echo 'selected';
                }
                ?>>
                <?= $merk['merk_name'] ?></option>
              <?php
              endforeach;
              ?>

            </select>
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="tipe" class="text-primary text-xl font-medium p-2">Mousepad Name</label>
            <input name="tipe" value="<?= $mousepad['mousepad_name'] ?>" id="tipe" type="text" placeholder="Mousepad Name" class="w-full bg-sky-800/25 rounded-lg p-1.5 mt-2">
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="ukuran_name" class="text-primary text-xl font-medium p-2">Ukuran</label>
            <input name="ukuran_name" value="<?= $mousepad['ukuran'] ?>" id="ukuran_name" type="text" placeholder="Ukuran" class="w-full bg-sky-800/25 rounded-lg p-1.5 mt-2">
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="ukuran" class="text-primary text-xl font-medium p-2">Ukuran</label>
            <select name="ukuran" id="ukuran" type="text" placeholder="Ukuran" class="w-full bg-sky-800/25 rounded-lg p-1.5 mt-2" require>
              <?php 
              $ukr = query("SELECT * FROM ukuran");

              foreach($ukr as $uk):
              ?>
              <option value="<?= $uk['ukuran_id'] ?>" 
                <?php if($uk['ukuran_id']==$mousepad['ukuran_id'])
                {
                  echo 'selected';
                }
                ?>>
                <?= $uk['min_ukuran'].' - '.$uk['max_ukuran']?>
              </option>
                <?php
              endforeach;
              ?>
            </select>
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="jahitan" class="text-primary text-xl font-medium p-2">Jahitan</label>
            <select name="jahitan" id="jahitan" type="text" placeholder="Jahitan" class="w-full bg-sky-800/25 rounded-lg p-1.5 mt-2" require>
              <?php 
              $jhtn = query("SELECT * FROM jahitan");

              foreach($jhtn as $jht):
              ?>
              <option value="<?= $jht['jahitan_id'] ?>" 
                <?php if($jht['jahitan_id']==$mousepad['jahitan_id'])
                {
                  echo 'selected';
                }
                ?>>
                <?= $jht['max_jahitan'] ?></option>
              </option>
                <?php
              endforeach;
              ?>
            </select>
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="bahan" class="text-primary text-xl font-medium p-2">Bahan</label>
            <select name="bahan" id="bahan" type="text" placeholder="Bahan" class="w-full bg-sky-800/25 rounded-lg p-1.5 mt-2">
            <?php 
              $bhn = query("SELECT * FROM bahan");

              foreach($bhn as $bh):
              ?>
              <option value="<?= $bh['bahan_id'] ?>" 
                <?php if($bh['bahan_id']==$mousepad['bahan_id'])
                {
                  echo 'selected';
                }
                ?>>
                <?= $bh['max_bahan'] ?></option>
              </option>
                <?php
              endforeach;
              ?>
            </select>
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="ketebalan" class="text-primary text-xl font-medium p-2">Ketebalan</label>
            <input name="ketebalan" value="<?= $mousepad['ketebalan'] ?>" id="ketebalan" type="text" placeholder="1280x720/1920x1080/..." class="w-full bg-sky-800/25 rounded-lg p-1.5 mt-2">
          </div>

          <div class="col-span-full sm:col-span-3">
            <label for="harga" class="text-primary text-xl font-medium p-2">Harga</label>
            <input name="harga" value="<?= $mousepad['mousepad_harga'] ?>" id="harga" type="text" placeholder="Harga" class="w-full bg-sky-800/25 rounded-lg p-1.5 mt-2">
          </div>
          
          <div class="col-span-full sm:col-span-6">
            <label for="img" class="text-primary text-xl font-medium p-2">Mousepad Image</label>
            <input name="img"  id="img" type="file" placeholder="" class="w-full bg-sky-800/25 rounded-lg p-1.5 mt-2">
          </div>
          <input type="hidden" value="<?= $mousepad['mousepad_img'] ?>" name="cek">

          <div class="col-span-full items-center space-x-2 ">
            <button name="edit" type="submit" class="px-4 py-2 border rounded-md border-primary text-primary font-semibold text-lg hover:text-black">Edit</button>
          </div>
        </div>
    </form>
  </main>

    <footer class="bg-primary text-center">
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        © 2023 KEIPAD. All Rights Reserved.
      </div>
    </footer>
</body>

</html>