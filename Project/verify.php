<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify</title>
</head>


<body>
	<?php
		include('redirect.php');
		// $email = email -- $name = name

	    //MySQL login
	    $serverName = "localhost";
	    $username = "capstone";
	    $password = "";
	    $dbname = "project_data";

	    // check if login is in database
    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT type from logins WHERE email = '$email'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $array = $stmt->fetchAll();
        }
        //Connection Error?
    catch (PDOException $e) {
      	echo "Error: " . $e->getMessage();
    }

    if (empty($array)) {
  		try {
	        $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
	        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare("INSERT INTO logins (email, `name`, `type`) VALUES ('$email', '$name', 'customer')");
	        $stmt->execute();
	        $type = 'customer';
	        $_SESSION["user"] = $email;
	        $_SESSION["user_name"] = $name;
	        $_SESSION["user_type"] = $type;
	        $_SESSION["first_time_user"] = 'true';
        	header('Location: /customer_info.php');
        }
        //Connection Error?
    	catch (PDOException $e) {
      		echo "Error: " . $e->getMessage();
    	}
	}

	else{
		$type = ($array[0]['type']);
		$_SESSION["user"] = $email;
	    $_SESSION["user_name"] = $name;
	    $_SESSION["user_type"] = $type;
	    $_SESSION["first_time_user"] = 'false';
		header('Location: /dashboard.php');
	}

	?>

</body>
</html>

	