<?php
<?php

if(isset($_POST["txtFirstName"])){
    if(isset($_POST["txtLastName"])){
        $Fname = $_POST["txtFirstName"];
        $Lname = $_POST["txtLastName"];

    //Database Stuff//
        include '../includes/dbConn.php';

        try {
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("insert into CustDatabase (CustomerID,FirstName,LastName,Address,City,State,Zip,Phone,Email,Password) 
                                                          VALUE(:CustomerID,FirstName,LastName,Address,City,State,Zip,Phone,Email,Password)");
            $sql->bindValue(":FirstName",$Fname);
            $sql->bindValue(":LastName",$Lname);

            $sql->execute();
        }catch (PDOException $e){
            $error =$e->getMessage();
            echo "Error $error";
        }

    header("Location:CustList.php");
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Create Account</title>

    <link type="text/css" rel="stylesheet" href="../css/base.css">

</head>

<body>
<header><?php include '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php'?></nav>

<main>
<form method="post">
 <table border="1" width="80%">
    <tr height="60px">
        <td colspan="2"><h3>Add New Movie</h3></td>
    </tr>
    <tr height="60px">
        <th>Movie Name</th>
        <td><input id=textTitle" name="txtTitle" Type="text" size="50"></td>
    </tr>
    <tr height="60px">
        <th>Movie Rating</th>
        <td><input id="txtRating" name="txtRating" type=text" size="50"></td>
    </tr>
    <tr height="60px">
        <td colspan="2">
            <input type="submit" value="Add New Movie">
        </td>
    </tr>
 </table>
    </form>
</main>

<footer>
    <?php include '../includes/footer.php'?>
</footer>

</body>
</html>