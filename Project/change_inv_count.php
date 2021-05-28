<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Inventory</title>
</head>


<body>
  <?php

    $count=$_POST['inv_count'];
    $count=intval($count);
    $isbn=$_POST['isbn'];
    //MySQL login
    $serverName = "localhost";
    $username = "capstone";
    $password = "";
    $dbname = "project_data";
    try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("update books set inventory = $count where isbn = '$isbn'");
            $stmt->execute();
            header('Location: /inventory_management.php');
          }
          //Connection Error?
      catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }


  ?>

</body>
</html>

  