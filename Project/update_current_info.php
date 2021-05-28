<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Info</title>
</head>


<body>
  <?php

    //Set variables from POST
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_SESSION['user'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $phone_number = $_POST['phone_number'];


    //MySQL login
    $serverName = "localhost";
    $username = "capstone";
    $password = "";
    $dbname = "project_data";

    if ($first_name == '' || $last_name == '' || $email == '' || $address == '' || $city == '' || $state == '' ||
        $zip_code == '' || $phone_number == '')
      {
        header("Location: /customer_info.php?foundAnEmpty=".urlencode('TRUE'));
      }

    // If not a new user then update info
    elseif($_SESSION["first_time_user"] != 'true'){
      try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE customers SET first_name='$first_name',last_name='$last_name',address='$address',city='$city',zip_code='$zip_code',phone_number='$phone_number' WHERE email='$email'");
            $stmt->execute();
            header('Location: /customer_info.php');
          }
          //Connection Error?
      catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
    // If new user then insert user as customer
    elseif ($_SESSION["first_time_user"] == 'true'){
      try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO customers (first_name,last_name,email,address,city,state,zip_code,phone_number)
              VALUES ('$first_name','$last_name','$email','$address','$city','$state','$zip_code','$phone_number')");
            $stmt->execute();
            $_SESSION["first_time_user"] = 'false';
            header('Location: /dashboard.php');
          }
          //Connection Error?
      catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
    


  ?>

</body>
</html>

  