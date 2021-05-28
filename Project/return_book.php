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

    $tx_id=$_POST['tx_id'];
    $tx_id=intval($tx_id);
    //MySQL login
    $serverName = "localhost";
    $username = "capstone";
    $password = "";
    $dbname = "project_data";
    try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT customer_email, bookISBN from transactions where transactionID = $tx_id");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $array = $stmt->fetchAll();
            $email = $array[0]['customer_email'];
            $isbn = $array[0]['bookISBN'];
            $stmt = $conn->prepare("update books set inventory = inventory +1 where isbn = $isbn;'");
            $stmt->execute();
            $stmt = $conn->prepare("update transactions set checkOut = 'n' where transactionID = $tx_id");
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

  