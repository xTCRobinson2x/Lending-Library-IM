<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Type</title>
</head>


<body>
  <?php

    $user=$_GET['user'];
    $type=$_GET['user_type'];
    //MySQL login
    $serverName = "localhost";
    $username = "capstone";
    $password = "";
    $dbname = "project_data";
    if ($type == 'customer'){
      try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE logins SET type='admin' WHERE email='$user'");
            $stmt->execute();
            header('Location: /customer_info.php');
          }
          //Connection Error?
      catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    
    }
  elseif ($type == 'admin'){
    try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE logins SET type='customer' WHERE email='$user'");
            $stmt->execute();
            header('Location: /customer_info.php');
          }
          //Connection Error?
      catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
  }


  ?>

</body>
</html>

  