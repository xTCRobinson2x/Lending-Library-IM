<?php
	session_start();
	$name = $_SESSION["user_name"];
?>
<!DOCTYPE html>

<html>
<head>
	<title>Lending-Library Inventory Managment System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="header">
		<h2>Lending-Library IMS</h2>
	</div>
	<hr>
	<div id='form-container'>
		<h2>Dashboard</h2>

	<div id="input-container">
		<form id='form' method="POST">
			<div id='button-container'>
			<button type="submit" formaction="inventory_management.php">Inventory Management</button>
			<button type="submit" formaction="customer_info.php">Customer Info</button>
			<button type="submit" formaction="analytics.php">Analytics</button>
		</div>
		</form>
	</div>
	<?php 
	echo "<h3>Logged in as: $name </h3>";?>
</div>
</body>
</html>