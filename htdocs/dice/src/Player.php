<?php
/**
 * Showing off a standard class with methods and properties.
 */
// namespace Erjh17\Player;

class Player
{
    /**
     * @var int    $sides  The number of sides of the Dice.
     */
    private $id;
    private $points;
    private $human;

    /**
     * Constructor to create a Dice.
     *
     * @param int    $sides  The number of players in the Game.
     */
    public function __construct($id = 0)
    {
        $this->points = 0;
        $this->id = $id;
        $this->human = false;
        if ($id == 0) {
            $this->human = true;
        }
    }

    /**
     * Destroy a Dice.
     */
    public function __destruct()
    {
        echo __METHOD__;
    }

    /**
     * Get the sum from the dice tosses.
     *
     * @return int as the sum from the dice tosses.
     */
    public function getId()
    {
        return $this->id;
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
