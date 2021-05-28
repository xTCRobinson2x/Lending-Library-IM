<!DOCTYPE html>
<html>
<head>
  <title>Insert Inventory</title>
</head>


<body>
  <?php

    //Set variables from POST
    $title = $_POST['title'];
    $author = $_POST['author'];
    $ISBN = $_POST['ISBN'];
    $avg_rating = $_POST['avg_rating'];
    $ISBN13 = $_POST['ISBN13'];
    $lang_code = $_POST['lang_code'];
    $num_pages = $_POST['num_pages'];
    $ratings_count = $_POST['ratings_count'];
    $text_reviews_count = $_POST['text_reviews_count'];
    $publication_date = $_POST['publication_date'];
    $publisher = $_POST['publisher'];

    //MySQL login
    $serverName = "localhost";
    $username = "capstone";
    $password = "";
    $dbname = "project_data";

    if ($title == '' || $author == '' || $ISBN == '' || $avg_rating == '' || $ISBN13 == '' || $lang_code == '' ||
        $num_pages == '' || $ratings_count == '' || $text_reviews_count == '' || $publication_date == '' || $publisher =='')
      {
        header("Location: http://localhost/insert_inventory.php?foundAnEmpty=".urlencode('TRUE')."&inserted=".urlencode('FALSE'));
      }
    else{
      try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO books (title,authors,average_rating,isbn,isbn13,language_code,num_pages,ratings_count,text_reviews_count,publication_date,publisher) 
              VALUES ('$title','$author','$avg_rating','$ISBN','$ISBN13','$lang_code','$num_pages','$ratings_count','$text_reviews_count','$publication_date',
              '$publisher')");
            $stmt->execute();
            header("Location: http://localhost/insert_inventory.php?inserted=".urlencode('TRUE')."&foundAnEmpty=".urlencode('FALSE'));
          }
          //Connection Error?
      catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }


  ?>

</body>
</html>

  