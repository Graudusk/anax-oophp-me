<?php
namespace Erjh17\Guess;

/**
 * View for showing guess the number game SESSION.
 */
?>

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
