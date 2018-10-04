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

$dice = new DiceGraphic();
$rolls = 6;
$res = [];
$class = [];
for ($i = 0; $i < $rolls; $i++) {
    $res[] = $dice->toss();
    $class[] = $dice->graphic();
}

?><!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<h1>Rolling <?= $rolls ?> graphic dices</h1>

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
