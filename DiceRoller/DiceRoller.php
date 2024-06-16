<?php
session_start();

// Function to roll dice
function rollDice($numDice) {
    $rolls = [];
    for ($i = 0; $i < $numDice; $i++) {
        $rolls[] = mt_rand(1, 6);
    }
    return $rolls;
}

// Roll dice for player and computer
$playerRolls = rollDice(2);
$computerRolls = rollDice(3);

// Calculate totals
$playerTotal = array_sum($playerRolls);
$computerTotal = array_sum($computerRolls);

// Determine result
if ($playerTotal > $computerTotal) {
    $result = "You win!";
} elseif ($playerTotal < $computerTotal) {
    $result = "Computer wins!";
} else {
    $result = "It's a tie!";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dice Game</title>
    <link type="text/css" rel="stylesheet" href="../css/base.css">
</head>
<body>
<header><?php include '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php'?></nav>
<main>
    <h2>Dice Game</h2>
    <p>Roll the dice to try and beat the computer!</p>

    <h3>Your Rolls</h3>
    <div>
        <?php foreach ($playerRolls as $roll): ?>
            <img src="images/dice<?php echo $roll; ?>.png" alt="Dice <?php echo $roll; ?>">
        <?php endforeach; ?>
    </div>
    <p>Your total: <?php echo $playerTotal; ?></p>

    <h3>Computer's Rolls</h3>
    <div>
        <?php foreach ($computerRolls as $roll): ?>
            <img src="images/dice<?php echo $roll; ?>.png" alt="Dice <?php echo $roll; ?>">
        <?php endforeach; ?>
    </div>
    <p>Computer's total: <?php echo $computerTotal; ?></p>

    <h3>Result</h3>
    <p><?php echo $result; ?></p>

    <form method="post" action="">
        <input type="submit" value="Roll Again">
    </form>
</main>
<footer>
    <?php include '../includes/footer.php'?>
</footer>
</body>
</html>