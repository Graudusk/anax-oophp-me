<?php
/**
 * Showing off a standard class with methods and properties.
 */
// namespace Erjh17\Dice;

class DiceHand
{
    private $dices;
    private $values;

    /**
     * Constructor to create a Dice.
     *
     * @param int    $sides  The number of sides of the Dice.
     */
    public function __construct(int $dices = 5)
    {
        $this->dices = [];
        $this->values = [];

        for ($i=0; $i < $dices; $i++) {
            $this->dices[] = new Dice();
            $this->values[] = null;
        }
    }

    /**
     * @var int    $sides  The number of sides of the Dice.
     */

    /**
     * Destroy a Dice.
     */
    public function __destruct()
    {
        echo __METHOD__;
    }

    /**
     * Toss the dice.
     *
     * @return integer corresponding a randomly selected side number.
     */
    public function roll()
    {
        echo "<br>";
        $dices = $this->getDices();
        $this->resetValues();

        foreach ($dices as $dice) {
            $dice->toss();
            $sum = $dice->getSum();
            $this->values[] = $sum;
        }
    }

    /**
     * Add to the sum of Dice.
     *
     * @param int $value of the side on Dice tossed.
     *
     * @return void
     */
    public function addToSum(int $value)
    {
        $this->sum += $value;
    }

    /**
     * Get the sum from the dice tosses.
     *
     * @return int as the sum from the dice tosses.
     */
    public function getTossed()
    {
        return $this->tossed;
    }

    /**
     * Get the dices from hand.
     *
     * @return array with dices.
     */
    public function getDices()
    {
        return $this->dices;
    }

    /**
     * Get the values of all the dices.
     *
     * @return array with values.
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function getSum()
    {
        $values = $this->getValues();

        return array_sum($values);
    }

    public function resetValues()
    {
        $this->values = [];
    }

    /**
     * Get the average from the dice tosses.
     *
     * @return int as the average from the dice tosses.
     */
    public function getAverage()
    {
        $sum = $this->getSum();
        $dices = $this->getDices();
        $average = $sum / sizeof($dices);
        return round($average, 2);
    }
}
