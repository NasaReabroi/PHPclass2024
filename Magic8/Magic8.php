<?php
session_start();

$question = isset($_POST["txtQuestion"]) ? $_POST["txtQuestion"] : "";
$PrevQuest = isset($_SESSION["PrevQuest"]) ? $_SESSION["PrevQuest"] : "";

$responses = array(
    "Ask again later",
    "Yes",
    "No",
    "It appears to be so",
    "Reply is hazy, please try again",
    "Yes, definitely",
    "What is it you really want to know?",
    "Outlook is good",
    "My sources say no",
    "Signs point to yes",
    "Don't count on it",
    "Cannot predict now",
    "As I see it, yes",
    "Better not tell you now",
    "Concentrate and ask again"
);

if ($question == "") {
    $answer = "Ask me a Question";
} elseif (substr($question, -1) != "?") {
    $answer = "Ask me with a Question Mark????";
} elseif ($PrevQuest == $question) {
    $answer = "Please ask a New Question!!!!";
} else {
    $iResponse = mt_rand(0, 14);
    $answer = $responses[$iResponse];
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
    <title>Magic 8 Ball</title>
    <link type="text/css" rel="stylesheet" href="../css/base.css">
</head>
<body>
<header><?php include '../includes/header.php'; ?></header>
<nav><?php include '../includes/nav.php'; ?></nav>

<main>
    <h2>Magic 8 Ball</h2>
    <br />
    <marquee>Ask me a question</marquee>
    <br />
    <p>Ask a Question:</p>
    <form method="post" action="magic8.php">
        <input type="text" name="txtQuestion" id="txtQuestion">
        <input type="submit" value="Ask the 8 Ball">
    </form>

    <?php if (!empty($question)): ?>
        <p><strong>Your Question:</strong> <?php echo htmlspecialchars($question); ?></p>
        <p><strong>Answer:</strong> <?php echo htmlspecialchars($answer); ?></p>
    <?php endif; ?>
</main>

<footer>
    <?php include '../includes/footer.php'; ?>
</footer>

</body>
</html>
