<?php
namespace Erjh17\Dice;

/**
 * View for showing Dice100 game.
 */
?>

<h1><?= $title ?></h1>
<?php if ($game->getHumanPlayer()->getOrderDice() && $game->getHumanPlayer()->getOrderDice()->getLastRoll()) : ?>
    <p>
        <i class="dice-sprite dice-<?= $game->getHumanPlayer()->getOrderDice()->getSum() ?>"></i>
    </p>
<?php endif ?>

<?php if ($game->getCurrentPlayerObj()->getDiceHand() !== null && $game->getCurrentPlayerObj()->getDiceHand()->getDices()[0]->getTossed() > 0) : ?>
<p>
    <?php foreach ($game->getCurrentPlayerObj()->getDiceHand()->getDices() as $dice) : ?>
        <i class="dice-sprite <?= $dice->graphic() ?>"></i>
    <?php endforeach; ?>
</p>
<?php endif; ?>
<p><?= $game->getMsg() ?></p>

<?php if (isset($histogram)) : ?>
<pre><?= $histogram->getAsText() ?></pre>
<?php endif; ?>
<?php if (!$game->isStarted()) : ?>
    <form method="POST">
        <p>
            <label for="players">Antal spelare:</label>
            <input type="number" name="players" min="2" max="10" value="2">
        </p>
        <p>
            <label for="handSize">Antal tärningar:</label>
            <input type="number" name="handSize" min="1" max="6" value="1">
        </p>
        <p>
            <input type="submit" name="start" value="Starta">
        </p>
    </form>
<?php else : ?>
    <form method="POST">
        <input type="submit" name="<?= $game->isPlaying() ? 'roll' : 'decide_order' ?>" value="Kasta tärning(ar)" <?= $game->getOrderDecided() || $game->canRoll() === false ? 'disabled' : '' ?>>
        <input type="submit" name="change_turn" value="Nästa spelare" <?= $game->isPlaying() ? '' : 'disabled' ?>>
        <?php if ($game->getOrderDecided()) : ?>
            <input type="submit" name="start_turns" value="Börja spela!">
        <?php endif ?>
    </form>
    <pre><?php if ($game->isPlaying()) : ?>
        <p>Rundans poäng: <?= $game->getRoundPoints() ?></p>
<?php endif ?>
<?php foreach ($game->getPlayers() as $player) : ?>
<span class="<?= $player->isCurrent($game->getCurrentPlayerObj()->getId()) ? 'current' : '' ?>">Spelare <?= $player->getId() == 10 ? $player->getId() : $player->getId() . " " ?><?= $player->isHuman() ? '(Du)' : '    ' ?>| <?= $player->getPoints() ?> poäng</span>
<?php endforeach ?></pre>
<form method="POST">
    <input type="submit" name="restart" value="Starta om spelet">
</form>
<?php endif ?>

<?php 
// var_dump($game->getCurrentPlayerObj());
// var_dump($game->getCurrentPlayerObj()->getOrderDice());
// var_dump($game->getCurrentPlayerObj()->getDiceHand());
