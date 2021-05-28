<!DOCTYPE html>
<html>
<head>
  	<title>Insert Customer</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="style.css">
</head>


<body>
  	<?php
  		error_reporting(E_ERROR | E_WARNING | E_PARSE);
  		if ($_GET){
  			$flag=$_GET['inserted'];
  			if($flag == 'TRUE'){
  				echo '<script>alert("Insertion Successful")</script>'; 
  			}
  			$empty_flag = $_GET['foundAnEmpty'];
  			if($empty_flag == 'TRUE'){
  				echo '<script>alert("Insertion Failed: A textbox was left blank")</script>'; 
  			}

  		}
  		if (isset($_POST['name'])){
	    	$name = $_POST['name'];
	    	$name_split = explode(" ", $name);
			$first_name = $name_split[0];
			$last_name = $name_split[1];
		}
		else{
			$first_name = '';
			$last_name = '';
		}		

		if (isset($_POST['email'])){
	    	$email = $_POST['email'];
		}
		else{
			$email = '';
		}
	    

    	

  
echo"
    <div id='header'>
		<h2>Customer Information</h2>
	</div>
	<hr>
		<div id='form-container'>
		<h2>Insert New Customer</h2>
		<div id='input-container'>
			<form id='form' action = 'insert_customer_redirect.php' method = 'post'>
			<div>
				<label for='first_name'>First Name:</label>
					<input type='text' id='first_name' name='first_name' value='$first_name'>
			</div>
			<div>
				<label for='last_name'>Last Name:</label>
					<input type='text' id='last_name' name='last_name' value='$last_name'>
			</div>
			<div>
				<label for='email'>Email:</label>
					<input type='text' id='email' name='email' value='$email'>
			</div>
			<div>
				<label for='address'>Address:</label>
					<input type='text' id='address' name='address'>
			</div>
			<div>
				<label for='city'>City:</label>
					<input type='text' id='city' name='city'>
			</div>
			<div>
				<label for='state'>State:</label>
					<input type='text' id='state' name='state'>
			</div>
			<div>
				<label for='zip_code'>Zip Code:</label>
					<input type='text' id='zip_code' name='zip_code'>
			</div>
			<div>
				<label for='phone_number'>Phone Number:</label>
					<input type='text' id='phone_number' name='phone_number'>
			</div>
				<div id='button-container'>
					<button type='submit'>Insert</button>
					<button type='submit' formaction='customer_info.php'>Return to Search</button>
				</div>
			</form>
		</div>
		</div>
		";
		?>
		</body>
</html>