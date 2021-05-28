<!DOCTYPE html>
<html>
<head>
  	<title>Insert Inventory</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="style.css">
</head>


<body>
  	<?php
  		if ($_GET){
  			$inserted_flag=$_GET['inserted'];
  			if($inserted_flag == 'TRUE'){
  				echo '<script>alert("Insertion Successful")</script>'; 
  			}
  			$empty_flag=$_GET['foundAnEmpty'];
  			if($empty_flag == 'TRUE'){
  				echo '<script>alert("Insertion Failed: A textbox was left blank")</script>'; 
  			}
  		}
  		if (isset($_POST['title'])){
	    	$title = $_POST['title'];
		}
		else{
			$title = '';
		}
		if (isset($_POST['author'])){
	    	$author = $_POST['author'];
		}
		else{
			$author = '';
		}
		if (isset($_POST['ISBN'])){
	    	$ISBN = $_POST['ISBN'];
		}
		else{
			$ISBN = '';
		}

  
echo"
    <div id='header'>
		<h2>Inventory Managment</h2>
	</div>
	<hr>
		<div id='form-container'>
		<h2>Insert New Book</h2>
		<div id='input-container'>
			<form id='form' action = 'insert_inventory_redirect.php' method = 'post'>
			<div id='title'>
				<label for='title'>Title:</label>
					<input type='text' id='title' name='title' value='$title'>
			</div>
			<div>
				<label for='author'>Author:</label>
					<input type='text' id='author' name='author' value='$author'>
			</div>
			<div>
				<label for='ISBN'>ISBN:</label>
					<input type='text' id='ISBN' name='ISBN' value='$ISBN'>
			</div>
			<div>
				<label for='avg_rating'>Average Rating:</label>
					<input type='text' id='avg_rating' name='avg_rating'>
			</div>
			<div>
				<label for='ISBN13'>ISBN13:</label>
					<input type='text' id='ISBN13' name='ISBN13'>
			</div>
			<div>
				<label for='lang_code'>Language Code:</label>
					<input type='text' id='lang_code' name='lang_code'>
			</div>
			<div>
				<label for='num_pages'>Number of Pages:</label>
					<input type='text' id='num_pages' name='num_pages'>
			</div>
			<div>
				<label for='ratings_count'>Ratings Count:</label>
					<input type='text' id='ratings_count' name='ratings_count'>
			</div>
			<div>
				<label for='text_reviews_count'>Text Reviews Count:</label>
					<input type='text' id='text_reviews_count' name='text_reviews_count'>
			</div>
			<div>
				<label for='publication_date'>Publication Date:</label>
					<input type='text' id='publication_date' name='publication_date'>
			</div>
			<div>
				<label for='publisher'>Publisher:</label>
					<input type='text' id='publisher' name='publisher'>
			</div>
				<div id='button-container'>
					<button type='submit'>Insert</button>
					<button type='submit' formaction='inventory_management.php'>Return to Inventory Managment</button>
				</div>
			</form>
		</div>
		</div>
		";
		?>
		</body>
</html>