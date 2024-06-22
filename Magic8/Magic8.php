<?php
session_start();



if(isset($_POST["txtQuestion"])) {
    $question = $_POST["txtQuestion"];
}else{
    $question ="";
}

if(isset($_SESSION["PrevQuest"])){
    $PrevQuest = $_SESSION["PrevQuest"];
}else{
    $PrevQuest ="";
}


$responses = array();
$responses [0] = "Ask again later";
$responses [1] = "Yes";
$responses [2] = "No";
$responses [3] = "It appears ti be so";
$responses [4] = "Reply is hazy , please try again";
$responses [5] = "Yes, definitely";
$responses [6] = "What is it you really want to know ?";
$responses [7] = "Outlook is good";
$responses [8] = "My sources say no";
$responses [9] = "Signs point to yes";
$responses [10] = "Don't count on it";
$responses [11] = "Cannot predict now";
$responses [12] = "As I see it, Yes";
$responses [13] = "Better not tell you now";
$responses [14] = "Concentrate and ask again";

if($question=="") {
    $answer ="Ask me a Question";
}elseif(substr($question,-1) !="?") {
    $answer ="Ask me with a Question Mark????";
}elseif($PrevQuest==$question){
    $answer ="Please ask a New Question!!!!";
}else{
    $iResponse = mt_rand(0,14);
    $answer =$responses[$iResponse];
    $_SESSION["PrevQuest"] = $question;
}

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
    <h2>Magic8 ball</h2>
    <br />
    <marquee>Ask me a question</marquee>
    <br />
    <p>Ask a Question:<br />
    <form method="post" action="Magic8.phpp">
    <input type="text" name="txtQuestion" id="txtQuestion"></p>
        <input type="submit" value="Ask the 8 Ball">
    </form>
</main>

<footer>
    <?php include '../includes/footer.php'?>
</footer>

</body>
</html>