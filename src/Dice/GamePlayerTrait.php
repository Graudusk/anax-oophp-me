<?php
/**
 * Showing off a standard class with methods and properties.
 */
namespace Erjh17\Dice;

trait GamePlayerTrait
{
    /**
     * @var array    $players Array containing player objects.
     * @var int      $currentPlayer Int representing the index of the current player in player array.
     */
    private $players;
    private $currentPlayer;

    /**
     * Gets the index in the player array of the current player.
     * 
     * @return int current player index.
     */
    public function resetCurrentPlayer()
    {
        $this->currentPlayer = 0;
    }


    /**
     * Gets the index in the player array of the current player.
     * 
     * @return int current player index.
     */
    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }


    /**
     * Gets the player object of the current player.
     * 
     * @return object Current player object.
     */
    public function getCurrentPlayerObj()
    {
        $players = $this->getPlayers();
        $curr = $this->getCurrentPlayer();
        return $players[$curr];
    }


    /**
     * Gets the human controlled player.
     * 
     * @return object Human player object.
     */
    public function getHumanPlayer()
    {
        $humanPlayer = null;
        foreach ($this->getPlayers() as $player) {
            if ($player->isHuman()) {
                $humanPlayer = $player;
            }
        }
        return $humanPlayer;

    }


    /**
     * Gets the array containing all players in the game.
     * 
     * @return array All players in the game.
     */
    public function getPlayers()
    {
        return $this->players;
    }


    /**
     * Sorts the player list based on the value rolled by each player.
     * 
     * @return void.
     */
    public function calculateOrder()
    {
        $players = $this->getPlayers();

        usort($players, function ($agg, $builder) {
            if ($agg->getOrder() == $builder->getOrder()) {
                return 0;
            }
            return ($agg->getOrder() < $builder->getOrder()) ? 1 : -1;
        });
        $this->players = $players;
    }


    /**
     * Checks whether the current player can press the roll button
     * 
     * @return boolean If player can roll.
     */
    public function canRoll()
    {
        $currPlayer = $this->getCurrentPlayerObj();
        $canPlay = $currPlayer->isPlaying();
        if (!$this->isPlaying()) {
            return $canPlay && $currPlayer->isHuman() && $this->isStarted();
        }
        return $canPlay && $currPlayer->isHuman() && $this->isPlaying();
    }


    /**
     * Adds the points rolled to the player's points and changes the turn.
     * 
     * @return void.
     */
    public function addToScore()
    {
        $currPlayer = $this->getCurrentPlayerObj();
        $currPlayer->addPoints($this->roundPoints);
        $this->resetPoints();
        $this->checkWin();
        if ($this->isPlaying()) {
            $this->switchPlayer();
        }
    }


    /**
     * Handler for when player has rolled a dice.
     * 
     * @param array $values Array containing dice values in one dice hand roll.
     * @param int $sum Int representing the sum of the values rolled.
     * 
     * @return void
     */
    public function roll()
    {
        $currPlayer = $this->getCurrentPlayerObj();
        // $currPlayer->resetDiceHand($this->diceHandSize());
        $diceHand = $currPlayer->getDiceHand();
        // $diceHand = new DiceHandHistogram($this->diceHandSize());
        $diceHand->roll();
        $this->dices = $diceHand;

        $msg = '';
        if (in_array(1, $diceHand->getValues())) {
            $msg = 'Du rullade en etta, din tur går över och dina poäng är förvanskade!';
            $currPlayer->setNotPlaying();
            $this->resetPoints();
        } else {
            $msg = 'Du fick '. $diceHand->getSum() .' poäng, fortsätt att kasta tärningar för mer poäng eller lämna över din tur för att få poängen du samlat på dig under rundan.';
            $this->roundPoints += $diceHand->getSum();
        }
        $this->setMsg($msg);
    }


    /**
     * Checks if the player has more than 100 points and therefore has won.
     * 
     * @return void.
     */
    public function checkWin()
    {
        $currPlayer = $this->getCurrentPlayerObj();
        $points = $currPlayer->getPoints();
        if ($points >= 100) {
            $this->stopPlaying();
            $currPlayer->setNotPlaying();
            $player = $currPlayer->isHuman() ? "Du" : "Spelare nr " . $currPlayer->getId();
            $this->setMsg($player . " vann!");
        }
    }
}
