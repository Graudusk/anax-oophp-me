<?php
require "config.php";
require "autoload.php";

$title = "Guess my number (POST)";

// POST the values
$number  = $_POST["number"] ?? -1;
$tries   = $_POST["tries"]  ?? 6;
$guess   = $_POST["guess"]  ?? null;

// Start a new game
$game = new Guess($number, $tries);

if (isset($_POST["reset"])) {
    $game->random();
}

$msg = null;
if (isset($_POST["doGuess"]) && $_POST['doGuess'] !== '' && $tries > 0) {
    $msg = $game->makeGuess($guess);
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
        <input type="hidden" name="number" value="<?= $game->number() ?>">
        <input type="hidden" name="tries" value="<?= $game->tries() ?>">
        <input type="hidden" name="doGuess" value="">
        <input type="text" name="guess" value="<?= $guess ?>" autofocus
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

