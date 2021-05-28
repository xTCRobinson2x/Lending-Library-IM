<!DOCTYPE html>
<html>
<head>
  <title>Insert Inventory</title>
</head>


<body>
  <?php

    //Set variables from POST
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
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
        header("Location: /insert_customer.php?foundAnEmpty=".urlencode('TRUE'));
      }
    else{
    try {
          $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
          $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("INSERT INTO customers (first_name,last_name,email,address,city,state,zip_code,phone_number) 
            VALUES ('$first_name','$last_name','$email','$address','$city','$state','$zip_code','$phone_number')");
          $stmt->execute();
          $full_name = $first_name.' '.$last_name;
          $stmt2 = $conn->prepare("INSERT INTO logins (email,`name`,`type`) VALUES ('$email','$full_name','customer')");
          $stmt2->execute();
          header("Location: http://localhost/insert_customer.php?inserted=".urlencode('TRUE'));
        }
        //Connection Error?
      catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
    }

  ?>

</body>
</html>

  