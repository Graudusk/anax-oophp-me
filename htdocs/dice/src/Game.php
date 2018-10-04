<?php
/**
 * Showing off a standard class with methods and properties.
 */
namespace Erjh17\Game;

class Game
{
    /**
     * @var int    $sides  The number of sides of the Dice.
     */
    private $players;
    private $currentPlayer;
    private $order;

    /**
     * Constructor to create a Dice.
     *
     * @param int    $sides  The number of players in the Game.
     */
    public function __construct(int $players = 2)
    {
        $this->order = [];
        for ($i=0; $i < $players; $i++) {
            $this->players[] = new Player($i);
        }
        $this->currentPlayer = 0;
    }

    /**
     * Destroy a Dice.
     */
    public function __destruct()
    {
        echo __METHOD__;
    }
}
