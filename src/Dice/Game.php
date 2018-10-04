<?php
/**
 * Showing off a standard class with methods and properties.
 */
namespace Erjh17\Dice;

class Game
{
    use SuperAITrait;
    use GamePlayerTrait;
    /**
     * @var boolean  $started  Boolean showing if game is initiated with options.
     * @var boolean  $playing  Boolean showing if players are playing.
     * @var int    $roundPoints  Int nr of points that the current player has so far in the round.
     * @var string    $msg  String to be written out in the game interface.
     * @var int    $nrOfDices  Int representing the nr of dices option value.
     * @var boolean    $orderDecided  Boolean showing if the game is in order deciding mode.
     * @var array    $rollWord Array containing the written out word for each single digit representing the side of the dice in order deciding mode.
     */
    private $started;
    private $playing;
    private $roundPoints;
    private $msg;
    private $nrOfDices;
    private $orderDecided;
    public $rollWord = array(
        '1' => 'etta',
        '2' => 'tvåa',
        '3' => 'trea',
        '4' => 'fyra',
        '5' => 'femma',
        '6' => 'sexa'
    );

    /**
     * Constructor to create a Game instance.
     *
     * @param int    $sides  The number of players in the Game.
     * @param int    $handSize  The number of dices in each dice hand in the Game.
     */
    public function __construct(int $players = 2, int $handSize = 5)
    {
        for ($i=1; $i <= $players; $i++) {
            $this->players[] = new Player($i);
        }
        $this->currentPlayer = 0;
        $this->started = false;
        $this->playing = false;
        $this->orderDecided = false;
        $this->roundPoints = 0;
        $this->nrOfDices = $handSize;
    }


    /**
     * Gets the number of dices in a dice hand.
     * 
     * @return int nr of dices in hand.
     */
    public function diceHandSize()
    {
        return $this->nrOfDices;
    }


    /**
     * Starts the game and sets the current player to playing.
     * 
     * @return void.
     */
    public function startGame()
    {
        $this->started = true;
        $currPlayer = $this->getCurrentPlayerObj();
        $currPlayer->setPlaying();
        $this->setMsg("Kasta tärningen för att bestämma spelordningen.");
    }


    /**
     * Gets the message variable from game object.
     * 
     * @return string the message to return.
     */
    public function getMsg()
    {
        return $this->msg;
    }


    /**
     * Sets the message variable in game object.
     * 
     * @param string $message Message to be set to Game.
     * 
     * @return void.
     */
    public function setMsg($message)
    {
        $this->msg = $message;
    }


    /**
     * Checks if the game has been initiated with options.
     * 
     * @return boolean if game is initiated.
     */
    public function isStarted()
    {
        return $this->started;
    }


    /**
     * Gets whether game is started and is being played.
     * 
     * @return boolean if game is playing.
     */
    public function isPlaying()
    {
        return $this->playing;
    }


    // /**
    //  * Gets the index in the player array of the current player.
    //  * 
    //  * @return int current player index.
    //  */
    // public function resetCurrentPlayer()
    // {
    //     $this->currentPlayer = 0;
    // }


    // /**
    //  * Gets the index in the player array of the current player.
    //  * 
    //  * @return int current player index.
    //  */
    // public function getCurrentPlayer()
    // {
    //     return $this->currentPlayer;
    // }


    // *
    //  * Gets the player object of the current player.
    //  * 
    //  * @return object Current player object.
     
    // public function getCurrentPlayerObj()
    // {
    //     $players = $this->getPlayers();
    //     $curr = $this->getCurrentPlayer();
    //     return $players[$curr];
    // }


    // /**
    //  * Gets the array containing all players in the game.
    //  * 
    //  * @return array All players in the game.
    //  */
    // public function getPlayers()
    // {
    //     return $this->players;
    // }


    // /**
    //  * Get a player from the player's Id value.
    //  * 
    //  * @return object current player class object.
    //  */
    // public function getPlayer($id)
    // {
    //     $players = $this->getPlayers();
    //     foreach ($players as $player) {
    //         if ($player->getId() == $id) {
    //             return $player;
    //         }
    //     }
    // // }


    // /**
    //  * Sorts the player list based on the value rolled by each player.
    //  * 
    //  * @return void.
    //  */
    // public function calculateOrder()
    // {
    //     $players = $this->getPlayers();

    //     usort($players, function ($agg, $builder) {
    //         if ($agg->getOrder() == $builder->getOrder()) {
    //             return 0;
    //         }
    //         return ($agg->getOrder() < $builder->getOrder()) ? 1 : -1;
    //     });
    //     $this->players = $players;
    // }


    // /**
    //  * Sets Game is being played.
    //  * 
    //  * @return void.
    //  */
    // public function startPlaying()
    // {
    //     $this->calculateOrder();
    //     $this->playing = true;
    //     $this->setOrderNotDecided();
    // }


    // /**
    //  * Adds the points rolled to the player's points and changes the turn.
    //  * 
    //  * @return void.
    //  */
    // public function addToScore()
    // {
    //     $currPlayer = $this->getCurrentPlayerObj();
    //     $currPlayer->addPoints($this->roundPoints);
    //     $this->resetPoints();
    //     $this->checkWin();
    //     if ($this->isPlaying()) {
    //         $this->switchPlayer();
    //     }
    // }


    // /**
    //  * Checks if the player has more than 100 points and therefore has won.
    //  * 
    //  * @return void.
    //  */
    // public function checkWin()
    // {
    //     $currPlayer = $this->getCurrentPlayerObj();
    //     $points = $currPlayer->getPoints();
    //     if ($points >= 100) {
    //         $this->stopPlaying();
    //         $currPlayer->setNotPlaying();
    //         $player = $currPlayer->isHuman() ? "Du" : "Spelare nr " . $currPlayer->getId();
    //         $this->setMsg($player . " vann!");
    //     }
    // }


    /**
     * Sets the game to not being played.
     * 
     * @return void.
     */
    public function stopPlaying()
    {
        $this->playing = false;
    }


    // /**
    //  * Handles the dice rolls for the computer players.
    //  * 
    //  * @return void.
    //  */
    // public function computerRoll()
    // {
    //     $currPlayer = $this->getCurrentPlayerObj();
    //     $currPlayer->setPlaying();
    //     if (!$currPlayer->isHuman()) {
    //         $score = 0;
    //         foreach ($this->getPlayers() as $player) {
    //             $score = ($player->getPoints() > $score) ? $player->getPoints() : $score;
    //         }
    //         $range = $currPlayer->pcAi($this->diceHandSize(), $score);
    //         $this->resetPoints();
    //         $this->setTest($range);
    //         $rand = rand($range[0], $range[1]);
    //         $diceHand = $currPlayer->getDiceHand();

    //         for ($i=0; $i < $rand; $i++) {
    //             $diceHand->roll();
    //             $sum = $diceHand->getSum();

    //             if (in_array(1, $diceHand->getValues())) {
    //                 $this->resetPoints();
    //                 $this->setMsg("Spelare " . $currPlayer->getId() . " slog en etta och turen går över.");
    //                 return;
    //             } else {
    //                 $this->roundPoints = $sum;
    //                 $this->setMsg("Spelare " . $currPlayer->getId() . " fick " . $this->roundPoints . " poäng.");
    //             }
    //             if ($this->roundPoints > $range[2]) {
    //                 $i = $rand; //Byter runda ifall mer än tillräckligt poäng har samlats in-
    //             }

    //             if ($currPlayer->getPoints() + $this->roundPoints <= $range[3]) {
    //                 $i = $rand - 1; //Tar en runda ifall spelaren är nära att vinna poäng.
    //             }

    //             if ($currPlayer->getPoints() + $this->roundPoints >= 100) {
    //                 $i = $rand; // Byter runda ifall spelaren har mer än 100 poäng
    //             }
    //         }
    //         $currPlayer->addPoints($this->roundPoints);

    //         $this->resetPoints();
    //         $this->checkWin();
    //     }
    // }


    // /**
    //  * Changes the current player and calls the computer roll function.
    //  * 
    //  * @return void.
    //  */
    // public function switchPlayer()
    // {
    //     $currPlayer = $this->getCurrentPlayerObj();
    //     $currPlayer->resetDiceHandValues();
    //     $currPlayer->setNotPlaying();
    //     if ($this->currentPlayer === sizeof($this->players) - 1) {
    //         $this->resetCurrentPlayer();
    //     } else {
    //         $this->currentPlayer += 1;
    //     }
    //     $currPlayer = $this->getCurrentPlayerObj();
    //     $currPlayer->setPlaying();
    //     $currPlayer->resetDiceHandValues();
    //     $this->computerRoll();
    // }


    /**
     * Ends the deciding order mode.
     * 
     * @return void.
     */
    public function setOrderNotDecided()
    {
        $this->orderDecided = false;
    }


    /**
     * Checks if Game is in order decide mode.
     * 
     * @return void.
     */
    public function getOrderDecided()
    {
        return $this->orderDecided;
    }


    // /**
    //  * Rolls to decide order of player.
    //  * 
    //  * @return void.
    //  */
    // public function orderRoll()
    // // public function orderRoll($value)
    // {
    //     $currPlayer = $this->getCurrentPlayerObj();

    //     $this->orderDecided = true;
    //     $value = $currPlayer->getOrderDice()->roll();
    //     $currPlayer->setOrder($value);

    //     foreach ($this->getPlayers() as $player) {
    //         if (!$player->isHuman()) {
    //             $roll = $player->getOrderDice()->roll();
    //             $player->setOrder($roll);
    //         }
    //         // if ($this->currentPlayer === sizeof($this->players) - 1) {
    //         //     $this->switchPlayer();
    //         // } else {
    //         // }
    //     }
    //     $this->calculateOrder();
    //     $this->setMsg("Du rullade en ". $this->rollWord[$value] ."! Spelordningen är fastställd och du kan börja spela!");
    // }


    // /**
    //  * End decide order rolls, calls calculate order function and sets first player to current player.
    //  * 
    //  * @return void.
    //  */
    // public function endOrderRolls()
    // {
    //     $this->resetPoints();

    //     foreach ($this->getPlayers() as $player) {
    //         $player->setNotPlaying();
    //         $player->resetDiceHand($this->diceHandSize());
    //         $player->unsetOrderDice();
    //     }
    //     $this->resetCurrentPlayer();
    //     $this->startPlaying();

    //     $currPlayer = $this->getCurrentPlayerObj();
    //     $currPlayer->setPlaying();
    //     $this->setMsg("Spelet har börjat! Kasta tärningen för att samla poäng. Får du en etta förlorar du dina poäng och du får stå över din runda. Får du mer än en tvåa läggs poängen till i din pott. Väljer du själv att byta runda istället för att kasta tärningen läggs potten till i dina poäng.");
    //     $this->computerRoll();
    // }


    /**
     * Gets the points gathered in the current round by the player.
     * 
     * @return int The points in current round.
     */
    public function getRoundPoints()
    {
        return $this->roundPoints;
    }


    /**
     * Sets the points in current round to 0.
     * 
     * @return void.
     */
    public function resetPoints()
    {
        $this->roundPoints = 0;
    }


    // /**
    //  * Handler for when player has rolled a dice.
    //  * 
    //  * @param array $values Array containing dice values in one dice hand roll.
    //  * @param int $sum Int representing the sum of the values rolled.
    //  * 
    //  * @return void
    //  */
    // public function roll()
    // {
    //     $currPlayer = $this->getCurrentPlayerObj();
    //     // $currPlayer->resetDiceHand($this->diceHandSize());
    //     $diceHand = $currPlayer->getDiceHand();
    //     // $diceHand = new DiceHandHistogram($this->diceHandSize());
    //     $diceHand->roll();
    //     $this->dices = $diceHand;

    //     $msg = '';
    //     if (in_array(1, $diceHand->getValues())) {
    //         $msg = 'Du rullade en etta, din tur går över och dina poäng är förvanskade!';
    //         $currPlayer->setNotPlaying();
    //         $this->resetPoints();
    //     } else {
    //         $msg = 'Du fick '. $diceHand->getSum() .' poäng, fortsätt att kasta tärningar för mer poäng eller lämna över din tur för att få poängen du samlat på dig under rundan.';
    //         $this->roundPoints += $diceHand->getSum();
    //     }
    //     $this->setMsg($msg);
    // }


    // /**
    //  * Checks whether the current player can press the roll button
    //  * 
    //  * @return boolean If player can roll.
    //  */
    // public function canRoll()
    // {
    //     $currPlayer = $this->getCurrentPlayerObj();
    //     $canPlay = $currPlayer->isPlaying();
    //     if (!$this->isPlaying()) {
    //         return $canPlay && $currPlayer->isHuman() && $this->isStarted();
    //     }
    //     return $canPlay && $currPlayer->isHuman() && $this->isPlaying();
    // }
}
