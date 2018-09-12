<?php
namespace Erjh17\Guess;

/**
 * View for showing guess the number game GET.
 */
?>
<h1><?= $title ?></h1>
<p>Guess the secret number between 1 and 100. You have <?= $game->tries() ?> tries left.</p>
<form method="GET">
    <input type="hidden" name="number" value="<?= $game->number() ?>">
    <input type="hidden" name="tries" value="<?= $game->tries() ?>">
    <input type="hidden" name="doGuess" value="">
    <input type="text" name="guess" value="<?= $guess ?>" autofocus
        <?= $game->tries() <= 0 ? 'disabled' : '' ?>>
    <input type="submit" name="doGuess" value="Make a guess"
        <?= $game->tries() <= 0 ? 'disabled' : '' ?>>
    <input type="submit" name="cheat" value="Cheat"
        <?= $game->tries() <= 0 ? 'disabled' : '' ?>>
</form>
<p><?= $msg ?? '' ?></p>
<p><a href="?reset">Reset game</a></p>
<?php if (isset($_GET['cheat']) && $_GET['cheat'] !== '') : ?>
<p>Correct answer is <?= $game->number() ?></p>
<?php endif;?>


