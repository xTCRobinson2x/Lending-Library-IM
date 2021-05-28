<!DOCTYPE html>

<html>
<head>
	<title>Analytics</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="style.css">
</head>

<body>
    <div id='header'>
    <h2>Analytics</h2>
  </div>
  <hr>
    <div id='form-container'>
      <h2>Top 10 Checked Out Books</h2>
      <div id='input-container'>
    <form id='form' method="POST">
      <div id='button-container'>
      <button type="submit" formaction="dashboard.php">Return to Dashboard</button>
  </div>
</form>

  <div id='search-results'>
    <?php
    // https://www.w3schools.com/php/php_mysql_select.asp - Select Data With PDO (+ Prepared Statements)
    echo "<table><thead>"; 
    echo "<tr><th>Title</th><th>Author</th><th>Average Rating</th><th>Total Checkout Count</th></tr></thead>";
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

    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("Select transactions.bookTitle, books.authors,books.average_rating,count(transactions.bookISBN) from transactions inner join books on transactions.bookISBN = books.isbn group by transactions.bookISBN Limit 0,10");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $array = $stmt->fetchAll();
          foreach(new TableRows(new RecursiveArrayIterator($array)) as $k=>$v) {
              echo $v;

            }
    }
        //Connection Error?
        catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
      ?>
</div>
</form>
</body>
</html>