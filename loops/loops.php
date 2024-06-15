<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="../css/base.css">
</head>

<body>
<header><?php include '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php'?></nav>

<main>
 <?php
    $number1 = 100;
    $number2 = "60";
    $number = $number1 + $number2;

     echo "<h1>$number</h1>";

     $i = 1;
     while ($i < 7) {
         echo "<h$i>Hello World</h$i>";
         $i++;
     }

     $i = 6;
     do {
         echo "<h$i>Hello World</h$i>";
         $i--;
     }while ($i > 0);

     for($i=1;$i<7;$i++) {
         echo "<h$i>Hello World</h$i>";
     }

     echo "<br /><br /><hr /><br />";
     $Full_Name = "Doug Smith";
     $Position = strpos($Full_Name, ' ');

     echo $Position;
     echo "<br /><br /><hr /><br />";

     echo $Full_Name;
     echo "<br />";

     $Full_Name = strtoupper($Full_Name);
     echo $Full_Name;

     echo "<br /><br /><hr /><br />";

     echo $Full_Name;
     echo "<br />";

     $Full_Name = strtolower($Full_Name);
     echo $Full_Name;

     echo "<br /><br /><hr /><br />";

     $nameParts = explode(' ',$Full_Name);
     echo $nameParts [0];
     echo "<br />";
     echo $nameParts[1];

 ?>
</main>

<footer>
    <?php include '../includes/footer.php'?>
</footer>

</body>
</html>