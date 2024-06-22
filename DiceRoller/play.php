<?php
// Function to roll a dice using mt_rand()
function rollDice() {
    return mt_rand(1, 6); // Generates a random number between 1 and 6 using mt_rand()
}

// Process the game logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['roll'])) {
    // Player's turn
    $player_roll1 = rollDice();
    $player_roll2 = rollDice();
    $player_score = $player_roll1 + $player_roll2;

    // Computer's turn
    $computer_score = 0;
    for ($i = 0; $i < 3; $i++) {
        $computer_roll = rollDice();
        $computer_score += $computer_roll;
    }

    // Determine the winner
    if ($player_score > $computer_score) {
        $result = "You Win!";
    } elseif ($computer_score > $player_score) {
        $result = "Computer Wins!";
    } else {
        $result = "Tie!";
    }
} else {
    // Initialize variables if it's not a POST request (initial page load)
    $player_roll1 = 0;
    $player_roll2 = 0;
    $player_score = 0;
    $computer_score = 0;
    $result = "";
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
            <form action="" method="post">
                <button type="submit" name="roll">Roll Dice</button>
            </form>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['roll'])): ?>
                <p>Your Score: <?php echo $player_score; ?></p>
                <img src="img/Dice_<?php echo $player_roll1; ?>.png" alt="Dice Roll">
                <img src="img/Dice_<?php echo $player_roll2; ?>.png" alt="Dice Roll">
            <?php endif; ?>
        </div>

        <div class="computer">
            <h2>Computer</h2>
            <p>Computer's Score: <?php echo $computer_score; ?></p>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['roll'])): ?>
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <?php $computer_roll = rollDice(); ?>
                    <img src="img/Dice_<?php echo $computer_roll; ?>.png" alt="Computer Dice Roll">
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['roll'])): ?>
        <p class="result"><?php echo $result; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <input type="submit" value="Roll Again">
    </form>
</main>

<footer>
    <?php include '../includes/footer.php'?>
</footer>
</body>
</html>