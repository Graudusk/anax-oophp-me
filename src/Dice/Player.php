<?php
/**
 * Showing off a standard class with methods and properties.
 */
namespace Erjh17\Dice;

class Player
{
    /**
     * @var int    $id  The player's id.
     * @var int    $points  The player's points.
     * @var boolean    $human  If the player is played by human.
     * @var int    $order  Value of order decide roll.
     * @var boolean    $playing  If the player is currently playing.
     */
    private $id;
    private $points;
    private $human;
    private $order;
    private $playing;
    private $diceHand;
    private $orderDice;

    /**
     * Constructor to create a Dice.
     *
     * @param int    $sides  The number of players in the Game.
     */
    public function __construct($id = 1)
    {
        $this->points = 0;
        $this->id = $id;
        $this->human = false;
        $this->order = -1;
        if ($id == 1) {
            $this->human = true;
        }
        $this->playing = false;
        $this->orderDice = new DiceGraphic();
    }

    /**
     * Destroy a Dice.
     */
    public function __destruct()
    {
        // echo __METHOD__;
    }

    /**
     * Get the player's id.
     *
     * @return int as the player's id.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the player's order roll.
     *
     * @return int as the player's order-roll.
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets the value of player's order roll.
     *
     * @return void
     */
    public function setOrder($var)
    {
        $this->order = $var;
    }

    /**
     * Add points to the player.
     *
     * @return void.
     */
    public function addPoints($points)
    {
        $this->points += $points;
    }

    /**
     * Sets the player's play status to false.
     *
     * @return void
     */
    public function setNotPlaying()
    {
        $this->playing = false;
    }

    /**
     * Sets the player's play status to true.
     *
     * @return void
     */
    public function setPlaying()
    {
        $this->playing = true;
    }

    /**
     * Get if the player can roll.
     *
     * @return boolean as the boolean if player currently can play.
     */
    public function isPlaying()
    {
        return $this->playing;
    }

    /**
     * Checks if the player has the same Id as the Id provided.
     *
     * @param int $id the id to be checked.
     *
     * @return boolean as whether the id was equal to the provided id.
     */
    public function isCurrent($id)
    {
        return $id === $this->getId();
    }

    /**
     * Check wether the player is human.
     *
     * @return boolean as if player is human.
     */
    public function isHuman()
    {
        return $this->human;
    }

    /**
     * Get points of player.
     *
     * @return int as the points.
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set new fresh dicehand to player.
     *
     * @return void.
     */
    public function resetDiceHandValues()
    {
        $diceHand = $this->getDiceHand();
        $diceHand->resetValues();
    }

    /**
     * Set new fresh dicehand to player.
     *
     * @return void.
     */
    public function resetDiceHand($size)
    {
        $this->diceHand = new DiceHandHistogram($size);
        $this->diceHand->resetValues();
    }

    /**
     * Calculate the computer player logic.
     *
     * @return array values to use in computer rolls.
     */
    public function pcAi($size, $maxScore)
    {
        // 1 : 3
        // 2 : 3
        // 3 : 2
        // 4 : 2
        // 5 : 1
        // 6 : 1

        $score = $this->getPoints();

        $minRolls = ($size > 2 ? 1 : 2); //Minsta antalet tärningskast per runda.
        $maxRolls = ($size > 4 ? 1 : ($size > 2 ? 2 : 3));//Högsta antalet tärningskast per runda.

        if ($score < $maxScore && (10 * $size) + $score < $maxScore) {
            $minRolls++;
            $maxRolls++;
        }

        // $maxRolls = 7 - $size;//Högsta antalet tärningskast per runda.
        // 1 : 2
        // 2 : 2
        // 3 : 1
        // 4 : 1
        // 5 : 1
        // 6 : 1
        $maxTreshold = 100 - ($size * ((2 + 3 + 4 + 5 + 6) / 5)); // Maxpoängen minus antal tärningar gånger medelvärdet på möjliga poänggivande slag. 
        $minTreshold = ($size * ((2 + 3 + 4 + 5 + 6) / 5)) * 2; // Antal tärningar gånger medelvärdet på möjliga poänggivande slag. 
        return [$minRolls, $maxRolls, $minTreshold, $maxTreshold];
    }

    /**
     * Get dicehand object from player.
     *
     * @return DiceHand as object.
     */
    public function getDiceHand()
    {
        return $this->diceHand;
    }

    /**
     * Get orderDice object from player.
     *
     * @return DiceGraphic as object.
     */
    public function getOrderDice()
    {
        return $this->orderDice;
    }

    /**
     * Unset orderDice object for player.
     *
     * @return void.
     */
    public function unsetOrderDice()
    {
        $this->orderDice = null;
    }
}
