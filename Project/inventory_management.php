<?php
	session_start();
?>
<!DOCTYPE html>

<html>
<head>
	<title>Inventory Managment</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta charset='UTF-8'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen&display=swap' rel='stylesheet'> 
	<link rel='stylesheet' href='style.css'>
</head>
<body>
	<div id='header'>
		<h2>Inventory Managment</h2>
	</div>
	<hr>
		<div id='form-container'>
			<h2>Insert New Book</h2>
			<div id='input-container'>
			<form id='form' action = 'search_inventory.php' method = 'post'>
				<div>
				<label for='title'>Title:</label>
					<input type='text' id='title' name='title'>
				</div>
				<div>
				<label for='author'>Author:</label>
					<input type='text' id='author' name='author'>
				</div>
				<div>
				<label for='ISBN'>ISBN:</label>
					<input type='text' id='ISBN' name='ISBN'>
				</div>
				<div id='button-container'>
					<button type='submit'>Search</button>
					<?php
						if ($_SESSION['user_type'] == 'admin'){
							echo "<button type='submit' formaction='insert_inventory.php'>Insert</button>";
						}
						else{}
					?>					
					<button type='submit' formaction='dashboard.php'>Return to Dashboard</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>