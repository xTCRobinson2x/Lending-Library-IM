<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Delete User</title>
</head>


<body>
  <?php

    $user=$_POST['user'];
    //MySQL login
    $serverName = "localhost";
    $username = "capstone";
    $password = "";
    $dbname = "project_data";
      try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE from logins where email='$user'");
            $stmt->execute();
            $stmt = $conn->prepare("DELETE from customers where email='$user'");
            $stmt->execute();
            header('Location: /customer_info.php');
          }
          //Connection Error?
      catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    

  ?>

</body>
</html>

  