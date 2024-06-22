<?php
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie List</title>
    <link type="text/css" rel="stylesheet" href="../css/base.css">
</head>

<body>
<header><?php include '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php'?></nav>

<main>
<h3>My Movie List</h3>
    <table border="1" width="80%">
        <tr>
            <td>Key</td>
            <td>Movie Title</td>
            <td>Rating</td>
        </tr>
    <?php

    //test database//


    include '../includes/dbConn.php';
    /*$dsn ='mysql:host=10.6.112.165;dbname=phpclass';
      $username = 'dbuser';
      $password ='dbdev123';
      $options = array (
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );*/

    try {
        $db = new PDO($dsn, $username, $password, $options);

        $sql = $db->prepare("select * from Movielist");
        $sql->execute();
        $row = $sql->fetch();

        while ($row!=null) {
           echo"<tr>";
            echo"<td>" . $row["movieID"] . "</td>";
            echo"<td>" . $row["movieTitle"] . "</td>";
            echo"<td>" . $row["movieRating"] . "</td>";
          echo" </tr>";


        echo $row["movieRating"];
            $row = $sql->fetch();
        }



    }catch (PDOException $e){
        $error =$e->getMessage();
        echo "Error $error";
    }

    ?>


    </table>


</main>

<footer>
    <?php include '../includes/footer.php'?>
</footer>

</body>
</html>