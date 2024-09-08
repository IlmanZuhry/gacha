<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
	body{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		height: 100vh;
		margin: 0;
	}
	h2{
		
		text-align: center;
	}
	
	table{
		width: 40%;
		margin:10px;
		border-collapse: collapse;
	}
	th,td {
		border: 3px solid ;
		padding: 20px;
		text-align:center;
	}
	img{
		max-width: 100%;
		
		display: block;
		margin: 0 auto;
	}
	</style>
	<title>Gacor</title>
	</head>
	<body>
<h2>Gacorrrrrr</h2>
	<table border="3">
	<tr>
	   <th><img src="gambar/logoo.png" alt="" width="50" height="50"></th>
	   <th><img src="gambar/logo.jpg" alt="" width="50" height="50"></th>
	   <th><img src="gambar/logo2.jpg" alt="" width="50" height="50"></th>
	</tr>
	<tr>
	   <td><img src="gambar/ipol.jpg" alt="" width="50" height="50"></td>
	   <td><img src="gambar/dss.jpg" alt="" width="50" height="50"></td>
	   <td><img src="gambar/logoo.png" alt="" width="50" height="50"></td>
	</tr>
    <tr>
	   <td><img src="gambar/logoo.png" alt="" width="50" height="50"></td>
	   <td><img src="gambar/logoo.png" alt="" width="50" height="50"></td>
	   <td><img src="gambar/logoo.png" alt="" width="50" height="50"></td>
	</tr>	
	<tr>
	   <td><img src="gambar/logoo.png" alt="" width="50" height="50"></td>
	   <td><img src="gambar/logoo.png" alt="" width="50" height="50"></td>
	   <td><img src="gambar/logoo.png" alt="" width="50" height="50"></td>
	</tr>
	</table>
	<button class="btn btn-primary" type="button" data-dismiss="modal">Roll</button>
</body>
</html>	
<?php

// Array of items
$items = ['VZ', 'M7', 'MZ', 'Gacorrrrrr', 'DSS', 'Roll'];

// Function to simulate gacha
function gacha($items) {
    $gachaItems = [];
    for ($i = 0; $i < 10; $i++) { // Simulate 10 gacha pulls
        $randomItem = $items[array_rand($items)];
        $gachaItems[] = $randomItem;
    }
    return $gachaItems;
}

// Function to check for winning combination
function checkWin($gachaItems) {
    $counts = array_count_values($gachaItems);
    foreach ($counts as $item => $count) {
        if ($count >= 3) {
            return true;
        }
    }
    return false;
}

// Simulate gacha pulls
$gachaItems = gacha($items);

// Check for winning combination
if (checkWin($gachaItems)) {
    echo "Selamat, Anda memenangkan hadiah!";
} else {
    echo "Maaf, Anda tidak memenangkan hadiah ini.";
}

// Print out gacha results
echo "\nHasil gacha: " . implode(', ', $gachaItems);

?>