<?php
/**
 * Dice game.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

$dice = new Dice(6);
echo "<ol><li>";
echo $dice->toss();
echo "</li><li>";

echo $dice->toss();
echo "</li><li>";
echo $dice->toss();
echo "</li><li>";
echo $dice->toss();
echo "</li><li>";
echo $dice->toss();
echo "</li><li>";
echo $dice->toss()."<br>";
echo "Sum is: " . $dice->getSum() . "<br>";
echo "Average is: " . $dice->getAverage() . "<br>";
