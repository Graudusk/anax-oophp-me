<?php
/**
 * Showing off a standard class with methods and properties.
 */
// namespace Erjh17\Dice;

class Dice
{
    /**
     * Constructor to create a Dice.
     *
     * @param int    $sides  The number of sides of the Dice.
     */
    public function __construct(int $sides = 6)
    {
        $this->sides = $sides;
        $this->tossed = 0;
        $this->sum = 0;
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


    private $sides;
    private $tossed;
    private $sum;
    private $lastRoll;

    /**
     * Toss the dice.
     *
     * @return integer corresponding a randomly selected side number.
     */
    public function toss()
    {
        $sides = $this->getSides();
        $rand = rand(1, $sides);
        $this->addToSum($rand);
        $this->incrTossed();
        $this->setLastRoll($rand);
        return $rand;
    }

    /**
     * Add to the nr of times tossed.
     *
     * @return void
     */
    public function incrTossed()
    {
        $this->tossed += 1;
    }

    /**
     * Set value of last rolled dice.
     *
     * @return void
     */
    public function setLastRoll(int $value)
    {
        $this->lastRoll = $value;
    }

    /**
     * Get value of last rolled dice.
     *
     * @return int $value of the last dice roll.
     */
    public function getLastRoll()
    {
        return $this->lastRoll;
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
     * Get the nr of sides of the Dice.
     *
     * @return int as the nr of sides of the Dice.
     */
    public function getSides()
    {
        return $this->sides;
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
     * Get the nr of times dice was tossed.
     *
     * @return int as the nr of times dice was tossed.
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Get the average from the dice tosses.
     *
     * @return int as the average from the dice tosses.
     */
    public function getAverage()
    {
        $sum = $this->getSum();
        $tossed = $this->getTossed();
        $average = $sum / $tossed;
        return round($average, 2);
    }
}
