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

    $isbn=$_POST['check_out'];
    //MySQL login
    $serverName = "localhost";
    $username = "capstone";
    $password = "";
    $dbname = "project_data";
    try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("update books set inventory = inventory -1 where isbn = '$isbn'");
            $stmt->execute();
            $email = $_SESSION["user"];
            $name = $_SESSION["user_name"];
            $stmt = $conn->prepare("Select title from books where isbn = '$isbn'");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $array = $stmt->fetchAll();
            $title = $array[0]['title'];
            $stmt = $conn->prepare("INSERT INTO transactions (customer_email,customer_name,bookISBN,bookTitle)
                    VALUES ('$email','$name','$isbn','$title')");
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

  