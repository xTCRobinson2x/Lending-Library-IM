<?php
	session_start();
	$name = $_SESSION["user_name"];
	$name_split = explode(" ", $name);
	$first_name = $name_split[0];
	$last_name = $name_split[1];
	$email = $_SESSION["user"];
	//MySQL login
    $serverName = "localhost";
    $username = "capstone";
    $password = "";
    $dbname = "project_data";
?>
<!DOCTYPE html>

<html>
<head>
	<title>Customer Info</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="header">
		<h2>Customer Information</h2>
	</div>
	<hr>
	<?php
		if ($_GET){
  			$empty_flag=$_GET['foundAnEmpty'];
  			if($empty_flag == 'TRUE'){
  				echo '<script>alert("Insertion Failed: A textbox was left blank")</script>'; 
  			}
  			if($empty_flag == 'SEARCH'){
  				echo '<script>alert("Name and Email cannot both be left blank")</script>'; 
  			}
  		}
		if ($_SESSION['user_type'] == 'admin'){
		echo "<div id='form-container'>
		<h2>Search for Customer</h2>
		<div id='input-container'>
			<form id='form' action = 'search_customer.php' method = 'POST' >
			<div>
				<label for='name'>Name:</label>
					<input type='text' id='name' name='name'>
			</div>
			<div>
				<label for='email'>Email:</label>
					<input type='text' id='email' name='email'>
			</div>
				<div id='button-container'>
					<button type='submit'>Search</button>
					<button type='submit' formaction='insert_customer.php'>Insert</button>
					<button type='submit' formaction='dashboard.php'>Return to Dashboard</button>
				</div>
			</form>
			</div>
			</div>";
			}

			elseif($_SESSION["first_time_user"] == 'true'){
				 echo "<h2>Your information:</h2>
				<div class='book-form'>
				<form action = 'update_current_info.php' method = 'post'>
				<label for='first_name'>First Name:</label>
					<input type='text' id='first_name' name='first_name' value='$first_name'>
				<label for='last_name'>Last Name:</label>
					<input type='text' id='last_name' name='last_name' value='$last_name'>
				<label for='address'>Address:</label>
					<input type='text' id='address' name='address'>
				<label for='city'>City:</label>
					<input type='text' id='city' name='city'>
				<label for='state'>State:</label>
					<input type='text' id='state' name='state'>
				<label for='zip_code'>Zip Code:</label>
					<input type='text' id='zip_code' name='zip_code'>
				<label for='phone_number'>Phone Number:</label>
					<input type='text' id='phone_number' name='phone_number'>
				<input type='hidden' id='new_user' name='new_user' value='TRUE'>
				<div class='button'>
					<button type='submit'>Submit Info</button>
				</div>
				</form>
				</div>";
  			}

		else {
			try {
		        $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
		        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		        $stmt = $conn->prepare("Select first_name,last_name, email, address,city,state,zip_code, phone_number from customers WHERE email = '$email'");
		        $stmt->execute();
		        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		        $array = $stmt->fetchAll();
		        #print_r($array[0]['first_name']);
		        $first_name = $array[0]['first_name'];
		        $last_name = $array[0]['last_name'];
		        $email = $array[0]['email'];
		        $address = $array[0]['address'];
		        $city = $array[0]['city'];
		        $state = $array[0]['state'];
		        $zip_code = $array[0]['zip_code'];
		        $phone_number = $array[0]['phone_number'];
			echo "<div id ='form-container'>
				<h2>Your information:</h2>
				<div id ='input-container'>
				<form id='form' action = 'update_current_info.php' method = 'post'>
				<div id='first_name'>
				<label for='first_name'>First Name:</label>
					<input type='text' id='first_name' name='first_name' value='$first_name'>
				</div>
				<div id='last_name'>
				<label for='last_name'>Last Name:</label>
					<input type='text' id='last_name' name='last_name' value='$last_name'>
				</div>
				<div id='address'>
				<label for='address'>Address:</label>
					<input type='text' id='address' name='address' value='$address'>
				</div>
				<div id='city'>
				<label for='city'>City:</label>
					<input type='text' id='city' name='city' value='$city'>
				</div>
				<div id='state'>
				<label for='state'>State:</label>
					<input type='text' id='state' name='state' value='$state'>
				</div>
				<div id='zip_code'>
				<label for='zip_code'>Zip Code:</label>
					<input type='text' id='zip_code' name='zip_code' value='$zip_code'>
				</div>
				<div id='phone_number'>
				<label for='phone_number'>Phone Number:</label>
					<input type='text' id='phone_number' name='phone_number' value='$phone_number'>
				</div>
				<div id='button-container'>
					<button type='submit'>Update Info</button>
					<button type='submit' formaction='dashboard.php'>Return to Dashboard</button>
				</div>
			</form>
		</div></div>";
		}
		catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
    }
	?>				

	
</body>
</html>