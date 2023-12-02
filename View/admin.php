<?php
// Connect to the database
require '../Include/database.php';
$take= query("SELECT * FROM mousepad");


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
		<link href="../dist/output.css" rel="stylesheet">

		<script src="https://cdn.tailwindcss.com"></script>

	</head>

	<body class="container mx-auto font-body">
		<div class="container flex flex-col font-bold text-primary mx-auto">
			<h1 class="text-center text-4xl p-4 mt-10">Welcome, admin!</h1>
			<p class="text-center text-xl">Glad to see you again</p>

			<div class="text-end text-2xl mt-10 pr-10">
				<a href="../Controller/logout.php?>">Logout</a>
			</div>
		</div>

		<div class="container p-2 mx-auto sm:p-4">
			<div class="overflow-x-auto">
				<table class="min-w-full text-md">
					<thead>
						<tr class="text-left bg-primary">
							<th class="p-3">Merk Mousepad</th>
							<th class="p-3">Bahan</th>
							<th class="p-3">Jahitan</th>
							<th class="p-3">Ketebalan</th>
							<th class="p-3">Ukuran</th>
							<th class="p-3">Harga</th>
							<th class="p-3">Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach ($take as $in):      
						?>
							<tr class="border-b border-opacity-20">
								<td class="p-3">
									<p><?= $in['mousepad_name']?></p>
								</td>
								<td class="p-3">
									<p><?= $in['bahan']?></p>
								</td>
								<td class="p-3">
									<p><?= $in['jahitan']?></p>
								</td>
								<td class="p-3">
									<p><?= $in['ketebalan']?></p>
								</td>
								<td class="p-3">
									<p><?= $in['ukuran']?></p>
								</td>
								<td class="p-3">
									<p><?= $in['mousepad_harga']?></p>
								</td>
								<td class="grid gap-2 p-3 text-center">
									<a class="bg-primary rounded-md p-2 font-semibold" href="edit_mousepad.php?id=<?= $in['mousepad_id']?>">Edit</a>
									<a class="bg-primary rounded-md p-2 font-semibold" href="../Controller/delete_mousepad.php?id=<?= $in['mousepad_id']?>">Delete</a>
								</td>
							</tr>
						<?php
						endforeach;
						?>
					</tbody>
				</table>

				<div class="mt-3 flex justify-end">    
					<button class="px-4 py-2 border rounded-md text-primary hover:text-black mr-3">
						<a href="add_mousepad.php">Add Mousepad</a>
					</button>
					
					<button class="px-4 py-2 border rounded-md text-primary hover:text-black">
						<a href="add_admin.php">Add Admin</a>
					</button>
				</div>
			</div>
		</div>
	</body>
</html>

