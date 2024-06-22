<?php
// Function to roll a dice
function rollDice() {
    return rand(1, 6); // Generates a random number between 1 and 6
}

// Initialize scores if not set
if (!isset($_COOKIE['player_score'])) {
    setcookie('player_score', 0, time() + (86400 * 30), "/"); // 86400 = 1 day
}

if (!isset($_COOKIE['computer_score'])) {
    setcookie('computer_score', 0, time() + (86400 * 30), "/"); // 86400 = 1 day
}

// Process roll button click
if (isset($_POST['roll'])) {
    // Player's turn
    $player_roll = rollDice();
    $_COOKIE['player_score'] += $player_roll;
    setcookie('player_score', $_COOKIE['player_score'], time() + (86400 * 30), "/");

    // Computer's turn
    $computer_score = 0;
    for ($i = 0; $i < 3; $i++) {
        $computer_roll = rollDice();
        $computer_score += $computer_roll;
    }
    $_COOKIE['computer_score'] += $computer_score;
    setcookie('computer_score', $_COOKIE['computer_score'], time() + (86400 * 30), "/");
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
    <h1>Dice Roller Game</h1>
    <div class="container">
        <div class="player">
            <h2>Player</h2>
            <form action="play.php" method="post">
                <button type="submit" name="roll">Roll Dice</button>
            </form>
            <?php if (isset($_POST['roll'])): ?>
                <?php $player_roll = rollDice(); ?>
                <p>You rolled: <?php echo $player_roll; ?></p>
                <img src="dice<?php echo $player_roll; ?>.png" alt="Dice Roll">
            <?php endif; ?>
        </div>
        <div class="computer">
            <h2>Computer</h2>
            <p>Computer's Score: <?php echo isset($_COOKIE['computer_score']) ? $_COOKIE['computer_score'] : 0; ?></p>
            <?php if (isset($_POST['roll'])): ?>
                <?php $computer_score = 0; ?>
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <?php $computer_roll = rollDice(); ?>
                    <?php $computer_score += $computer_roll; ?>
                    <img src="dice<?php echo $computer_roll; ?>.png" alt="Computer Dice Roll">
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
    <form method="post" action="">
        <input type="submit" value="Roll Again">
    </form>
</main>
<footer>
    <?php include '../includes/footer.php'?>
</footer>
</body>
</html>