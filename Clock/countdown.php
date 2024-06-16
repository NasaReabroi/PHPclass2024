<?php

$secPerMin = 60;
$secPerHour = 60 * $secPerMin;
$secPerDay = 24 * $secPerHour;
$secPerYear = 365 * $secPerDay;
//current time
$now = time();

//burning man time
$burningman = mktime(12,0,0,6,15,2024);

//number os seconds between now and then
$seconds = $burningman - $now;

$Years = floor($seconds/$secPerYear);
$seconds = $seconds -($Years * $secPerYear);

$Days = floor($seconds/$secPerDay);
$seconds = $seconds -($Days * $secPerDay);

$Hours = floor($seconds/$secPerHour);
$seconds = $seconds -($Hours * $secPerHour);

$Minutes = floor($seconds/$secPerMin);
$seconds = $seconds -($Minutes * $secPerMin);


?>

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
    <h3>Burning Man Countdown</h3>
    <p>years:<?=$Years ?> | Days:<?=$Days ?> | Hours:<?=$Hours ?> | Minutes:<?=$Minutes ?> | Second s:<?=$seconds ?></p>
</main>

<footer>
    <?php include '../includes/footer.php'?>
</footer>

</body>
</html>