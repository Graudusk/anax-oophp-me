<?php
/**
 * Dice game.
 */
// namespace Erjh\Dice;

/**
 * Throw some graphic dices.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

$game = new Game(2);
var_dump($game)
?><!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<h1>Rolling graphic dices</h1>

<?php if (isset($class)) : ?>
<p class="dice-utf8">
<?php foreach ($class as $value) : ?>
    <i class="<?= $value ?>"></i>
<?php endforeach; ?>
</p>


<p>
<?php foreach ($class as $value) : ?>
    <i class="dice-sprite <?= $value ?>"></i>
<?php endforeach; ?>
</p>
<?php endif; ?>
