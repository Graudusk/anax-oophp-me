<?php
/**
 * Showing off a standard class with methods and properties.
 */
namespace Erjh17\Dice;

class DiceHand
{
    private $dices;
    private $values;
    private $sum;

    /**
     * Constructor to create a Dice.
     *
     * @param int    $dices  The number of dices of the DiceHand.
     * @param array    $values  value of each dice.
     */
    public function __construct(int $dices = 5)
    {
        $this->dices = [];
        $this->values = [];
        $this->sum = [];

        for ($i=0; $i < $dices; $i++) {
            $this->dices[] = new DiceHistogram();
            $this->values[] = null;
            $this->sum[] = null;
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
        // echo __METHOD__;
    }

    /**
     * Toss the dice.
     *
     * @return integer corresponding a randomly selected side number.
     */
    public function roll()
    {
        $dices = $this->getDices();
        $this->resetValues();

        foreach ($dices as $dice) {
            $dice->roll();
            $sum = $dice->getSum();
            $this->values[] = $sum;
        }
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
