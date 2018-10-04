<?php
require "config.php";
require "autoload.php";

$title = "Guess my number (SESSION)";

// POST the value
$guess   = $_POST["guess"] ?? null;

// Start a new game
session_name("erjh17");
session_start();
$game = new Guess($_SESSION['number'] ?? -1, $_SESSION['tries'] ?? 6);

if (isset($_POST["reset"])) {
    $_SESSION['number'] = $game->random();
    $_SESSION['tries'] = 6;
    header("Location: index-session.php");
    exit;
}

$msg = null;
if (isset($_POST["doGuess"]) && $_POST['doGuess'] !== '' && $game->tries() > 0) {
    $msg = $game->makeGuess($guess);
    $_SESSION['tries'] = $game->tries();
    $_SESSION['number'] = $game->number();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>

    <p>Guess the secret number between 1 and 100. You have <?= $game->tries() ?> tries left.</p>
    <form method="POST">
        <input type="text" name="guess" value="" autofocus
            <?= $game->tries() <= 0 ? 'disabled' : '' ?>>
        <input type="submit" name="doGuess" value="Make a guess"
            <?= $game->tries() <= 0 ? 'disabled' : '' ?>>
        <input type="submit" name="cheat" value="Cheat"
            <?= $game->tries() <= 0 ? 'disabled' : '' ?>>
        <input type="submit" name="reset" value="Reset game">
    </form>
    <p><?= $msg ?? '' ?></p>
    <?php if (isset($_POST['cheat']) && $_POST['cheat'] !== '') : ?>
    <p>Correct answer is <?= $game->number() ?></p>
    <?php endif;?>
</body>
</html>

