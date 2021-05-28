<?php session_start() ?>
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

    $title = $_POST['title'];
    $author = $_POST['author'];
    $ISBN = $_POST['ISBN'];
    ?>
    <div id='header'>
    <h2>Search Results</h2>
  </div>
  <hr>
    <div id='form-container'>
      <h2>Book Search Results</h2>
      <div id='input-container'>
    <form id='form' method="POST">
      <div id='button-container'>
      <button type="submit" formaction="inventory_management.php">Return to Search</button>
  </div>
</form>

  <div id='search-results'>
    <?php
    // https://www.w3schools.com/php/php_mysql_select.asp - Select Data With PDO (+ Prepared Statements)
    echo "<table><thead>"; 
    if ($_SESSION["user_type"] == 'customer'){
      echo "<tr><th>Title</th><th>Author</th><th>Average Rating</th><th>Publisher</th><th>Inventory Count</th><th>Check Out</th></tr></thead>";
    }
    else{
      echo "<tr><th>Title</th><th>Author</th><th>Average Rating</th><th>Publisher</th><th>Inventory Count</th><th>Change Inventory Count</tr></thead>";
    }
    echo "<tbody>".PHP_EOL;
    
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

    if ($_SESSION["user_type"] == 'customer'){
    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("Select distinct title,authors,average_rating,publisher,inventory,isbn from books where (title like '%$title%' and authors like '%$author%' and (isbn like '%$ISBN%' or isbn13 like '%$ISBN%')) order by title;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $array = $stmt->fetchAll();
        $i = 0;
        while ($i <= (count($array)-1)){
          $ele = $array[$i]['isbn'];
          $array[$i]['check_out'] = "<form id='form' action = 'check_out.php' method = 'POST' ><input type='hidden' id='check_out' name='check_out' value='$ele'><div class='button'> <button type='submit''>Check Out</button></div></form>";
          unset($array[$i]['isbn']);
          $i++;
        }
          foreach(new TableRows(new RecursiveArrayIterator($array)) as $k=>$v) {
              echo $v;

            }

          }
        //Connection Error?
        catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
    }

    else{
      try {
          $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
          $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("Select distinct title,authors,average_rating,publisher,inventory, isbn from books where (title like '%$title%' and authors like '%$author%' and (isbn like '%$ISBN%' or isbn13 like '%$ISBN%')) order by title;");
          $stmt->execute();
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $array = $stmt->fetchAll();
          $i = 0;
          while ($i <= (count($array)-1)){
            $ele = $array[$i]['inventory'];
            $isbn = $array[$i]['isbn'];
            $array[$i]['inventory'] = "<form id='form' action = 'change_inv_count.php' method = 'post'><input type='text' id='inv_count' name='inv_count' value = '$ele'><input type='hidden' id='isbn' name='isbn' value='$isbn'>";
            $array[$i]['change_count'] = "<div class='button'> <button type='submit'>Submit Change</button></div></form>";
            unset($array[$i]['isbn']);
            $i++;
          }
            foreach(new TableRows(new RecursiveArrayIterator($array)) as $k=>$v) {
                echo $v;

              }
            }
          //Connection Error?
          catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
      }
      echo "</tbody></table></div>";

  ?>
</div>
</form>
</body>
</html>