<?php
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer List</title>
    <link type="text/css" rel="stylesheet" href="../css/base.css">
</head>

<body>
<header><?php include '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php'?></nav>

<main>
    <h3>Customer Listing</h3>
    <table  border="1" width="80%">
        <tr>
            <td>CustomerID</td>
            <td>FirstName</td>
            <td>LastName</td>
            <td>Address</td>
            <td>City</td>
            <td>State</td>
            <td>Zip</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Password</td>
        </tr>
        <?php

        //test database//



        $dsn ='mysql:host=10.6.112.165;dbname=phpclass';
          $username = 'dbuser';
          $password ='dbdev123';
          $options = array (
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );

        try {
            $db = new PDO($dsn, $username, $password, $options);

            $sql = $db->prepare("select * from CustDatabase");
            $sql->execute();
            $row = $sql->fetch();

            while ($row!=null) {
                echo"<tr>";
                echo"<td>" . $row["CustomerID"] . "</td>";
                echo"<td>" . $row["FirstName"] . "</td>";
                echo"<td>" . $row["LastName"] . "</td>";
                echo"<td>" . $row["Address"] . "</td>";
                echo"<td>" . $row["City"] . "</td>";
                echo"<td>" . $row["State"] . "</td>";
                echo"<td>" . $row["Zip"] . "</td>";
                echo"<td>" . $row["Phone"] . "</td>";
                echo"<td>" . $row["Email"] . "</td>";
                echo"<td>" . $row["Password"] . "</td>";
                echo" </tr>";


                $row = $sql->fetch();
            }



        }catch (PDOException $e){
            $error =$e->getMessage();
            echo "Error $error";
        }

        ?>
    </table>
    <br /><br />
    <a href="CustRegister.phpd.php">Create Account</a>


</main>

<footer>
    <?php include '../includes/footer.php'?>
</footer>

</body>
</html>