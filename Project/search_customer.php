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

    $name = $_POST['name'];
    $email = $_POST['email'];
    if ($name == '' && $email==''){
       {
        header("Location: /customer_info.php?foundAnEmpty=".urlencode('SEARCH'));
      }
    }
    else {}
  ?>
    <div id="header">
    <h2>Search Results</h2>
    </div>
    <hr>
    <div id='form-container'>
    <h2>Customer Search Results</h2>
    <div id='input-container'>
        <form id='form' method="POST">
          <div id='button-container'>
              <button type="submit" formaction="customer_info.php">Return to Search</button>
            </div>
    

    <?php
    // https://www.w3schools.com/php/php_mysql_select.asp - Select Data With PDO (+ Prepared Statements) 
    echo "<div id='search-results'>";
    echo "<table><thead>";
    echo "<tr><th>Name</th><th>Email</th><th>Address</th><th>Phone</th><th>User Type</th><th>Delete User</th><th>Current Transactions</th><th>All Transactions</th></tr></thead><tbody>";
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
        if ($name != '' && $email != ''){
          $stmt = $conn->prepare("Select concat(first_name,' ',last_name) as `name`, customers.email, concat(address,', ',city,', ',state,', ',zip_code) as whole_address, phone_number, logins.`type` from customers INNER JOIN logins on customers.email=logins.email WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%' AND customers.email LIKE '%$email%'");
        }
        elseif ($name == '' && $email != '') {
           $stmt = $conn->prepare("Select concat(first_name,' ',last_name) as `name`, customers.email, concat(address,', ',city,', ',state,', ',zip_code) as whole_address, phone_number, logins.`type` from customers inner join logins on customers.email=logins.email WHERE customers.email LIKE '%$email%'");
         } 
         elseif ($name != '' && $email == '') {
           $stmt = $conn->prepare("Select concat(first_name,' ',last_name) as `name`, customers.email, concat(address,', ',city,', ',state,', ',zip_code) as whole_address, phone_number, logins.`type` from customers inner join logins on customers.email=logins.email WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%'");
         }
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $array = $stmt->fetchAll();
        $i = 0;
        while ($i <= (count($array)-1)){
          $ele = $array[$i]['type'];
          $cur_user = $array[$i]['email'];
          $array[$i]['type'] = "<a href='/change_user_type.php?user=".urlencode($cur_user)."&user_type=".urlencode($ele)."'>$ele</a>";
          $array[$i]['delete'] = "<form action = 'delete_user.php' method = 'POST' ><input type='hidden' id='user' name='user' value=$cur_user><div class='button'> <button type='submit''>Delete</button></div></form>";
          $array[$i]['current_tx'] = "<form action = 'current_tx.php' method = 'POST' ><input type='hidden' id='user' name='user' value=$cur_user><div class='button'> <button type='submit''>Current Transactions</button></div></form>";
          $array[$i]['all_tx'] = "<form action = 'all_tx.php' method = 'POST' ><input type='hidden' id='user' name='user' value=$cur_user><div class='button'> <button type='submit''>All Transactions</button></div></form>";
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