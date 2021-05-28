<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="style.css">
</head>


<body>
  <?php

    $user = $_POST['user'];
  ?>
    <div id='header'>
    <h2>User's Current Transactions</h2>
  </div>
  <hr>
    <div id='form-container'>
      <div id='input-container'>
    <form id='form' method="POST">
      <div id ='button-container'>
      <button type="submit" formaction="customer_info.php">Return to Search</button>
    </div>
    <div id='search-results'>

    <?php
    // https://www.w3schools.com/php/php_mysql_select.asp - Select Data With PDO (+ Prepared Statements) 
    echo "<table><thead>";
    echo "<tr><th>Transaction ID</th><th>Title</th><th>ISBN</th><th>Checked Out?</th></tr></thead><tbody>";
    class TableRows extends RecursiveIteratorIterator {
      function __construct($it){
        parent::__construct($it, self::LEAVES_ONLY);
      }

      function current(){
        return "<td>". parent::current(). "</td>";
      }

      function beginChildren() {
        echo "<tr>";
      }

      function endChildren(){
        echo "</tr>" . "\n";
      }
    }
    //MySQL login
    $serverName = "localhost";
    $username = "capstone";
    $password = "";
    $dbname = "project_data";


    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT transactionID,bookTitle,bookISBN,checkOut from transactions where customer_email = '$user'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $array = $stmt->fetchAll();
        $i = 0;
        while ($i <= (count($array)-1)){
          if($array[$i]['checkOut'] == 'y'){
            $array[$i]['checkOut'] = 'Check out';
          }
          else{}
          if($array[$i]['checkOut'] == 'n'){
            $array[$i]['checkOut'] = 'Returned';
          }
          else{}
          $i++;
        }
        foreach(new TableRows(new RecursiveArrayIterator($array)) as $k=>$v) {
              echo $v;

            }
            echo "</tbody></form>";
          }
        //Connection Error?
        catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }


  ?>

</body>
</html>