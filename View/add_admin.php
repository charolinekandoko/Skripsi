<?php
// Connect to the database
require '../Controller/add_admin.php';
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
    <header class="flex justify-center  text-sm sm:text-2xl font-semibold text-primary">
      <a href="../index.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">home</button></a>
      <a href="brand_mousepad.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">mousepad</button></a>        
      <a class="cta" href="recommendation.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">recommendation</button></a>
      <a href="login.php"><button class="p-2 sm:p-4 mt-16 uppercase hover:text-black">login</button></a>
    </header>
          
    <form class="flex-grow mt-28" method="POST">
      <div class="flex flex-col rounded-lg max-w-md p-6 space-y-4 text-center bg-gray-300 mx-auto ">
        <div>
            <label for="email" class="block text-primary text-2xl font-semibold p-2">Email</label>
            <input name= "email" type="email" id="email" class="shadow-sm text-midnight text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="example@gmail.com" required>
        </div>
    
        <div>
            <label for="password" class="block text-primary text-2xl font-semibold p-2">Password</label>
            <input name= "password" type="password" id="password" class="shadow-sm text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>

        <button name="submit" type="submit" class="bg-primary text-xl font-bold p-2 px-4 py-2 rounded-md text-white hover:text-black hover:bg-white">Register</button>
      </div>
    </form>

    <footer class="bg-primary text-center">
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        © 2023 KEIPAD. All Rights Reserved.
      </div>
    </footer>
  </body>
  
</html>

