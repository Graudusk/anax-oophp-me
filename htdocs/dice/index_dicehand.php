<?php
/**
 * Dice game.
 */
// namespace Erjh\Dice;

include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

$hand = new DiceHand();
$hand->roll();

?><h1>Rolling a dicehand with five dices</h1>

<p><?= implode(", ", $hand->getValues()) ?></p>
<p>Sum is: <?= $hand->getSum() ?>.</p>
<p>Average is: <?= $hand->getAverage() ?>.</p>
