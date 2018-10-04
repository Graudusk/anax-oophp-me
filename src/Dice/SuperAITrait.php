<?php
/**
 * Showing off a standard class with methods and properties.
 */
namespace Erjh17\Dice;

trait SuperAITrait
{
    /**
     * Handles the dice rolls for the computer players.
     * 
     * @return void.
     */
    public function computerRoll()
    {
        $currPlayer = $this->getCurrentPlayerObj();
        $currPlayer->setPlaying();
        if (!$currPlayer->isHuman()) {
            $score = 0;
            foreach ($this->getPlayers() as $player) {
                $score = ($player->getPoints() > $score) ? $player->getPoints() : $score;
            }
            $range = $currPlayer->pcAi($this->diceHandSize(), $score);
            $this->resetPoints();
            $rand = rand($range[0], $range[1]);
            $diceHand = $currPlayer->getDiceHand();

            for ($i=0; $i < $rand; $i++) {
                $diceHand->roll();
                $sum = $diceHand->getSum();

                if (in_array(1, $diceHand->getValues())) {
                    $this->resetPoints();
                    $this->setMsg("Spelare " . $currPlayer->getId() . " slog en etta och turen går över.");
                    return;
                } else {
                    $this->roundPoints = $sum;
                    $this->setMsg("Spelare " . $currPlayer->getId() . " fick " . $this->roundPoints . " poäng.");
                }
                if ($this->roundPoints > $range[2]) {
                    $i = $rand; //Byter runda ifall mer än tillräckligt poäng har samlats in-
                }

                if ($currPlayer->getPoints() + $this->roundPoints <= $range[3]) {
                    $i = $rand - 1; //Tar en runda till ifall spelaren är nära att vinna poäng.
                }

                if ($currPlayer->getPoints() + $this->roundPoints >= 100) {
                    $i = $rand; // Byter runda ifall spelaren har mer än 100 poäng
                }
            }
            $currPlayer->addPoints($this->roundPoints);

            $this->resetPoints();
            $this->checkWin();
        }
    }


    /**
     * Changes the current player and calls the computer roll function.
     * 
     * @return void.
     */
    public function switchPlayer()
    {
        $currPlayer = $this->getCurrentPlayerObj();
        $currPlayer->resetDiceHandValues();
        $currPlayer->setNotPlaying();
        if ($this->currentPlayer === sizeof($this->players) - 1) {
            $this->resetCurrentPlayer();
        } else {
            $this->currentPlayer += 1;
        }
        $currPlayer = $this->getCurrentPlayerObj();
        $currPlayer->setPlaying();
        $currPlayer->resetDiceHandValues();
        if ($currPlayer->isHuman()) {
            $this->setMsg("Din tur!");
        } else {
            $this->computerRoll();
        }
    }

    /**
     * Rolls to decide order of player.
     * 
     * @return void.
     */
    public function orderRoll()
    {
        $currPlayer = $this->getCurrentPlayerObj();

        $this->orderDecided = true;
        $value = $currPlayer->getOrderDice()->roll();
        $currPlayer->setOrder($value);

        foreach ($this->getPlayers() as $player) {
            if (!$player->isHuman()) {
                $roll = $player->getOrderDice()->roll();
                $player->setOrder($roll);
            }
        }
        $this->calculateOrder();
        $this->setMsg("Du rullade en ". $this->rollWord[$value] ."! Spelordningen är fastställd och du kan börja spela!");
    }


    /**
     * End decide order rolls, calls calculate order function and sets first player to current player.
     * 
     * @return void.
     */
    public function endOrderRolls()
    {
        $this->resetPoints();

        foreach ($this->getPlayers() as $player) {
            $player->setNotPlaying();
            $player->resetDiceHand($this->diceHandSize());
            $player->unsetOrderDice();
        }
        $this->resetCurrentPlayer();
        $this->startPlaying();
        $this->setOrderNotDecided();

        $currPlayer = $this->getCurrentPlayerObj();
        $currPlayer->setPlaying();
        $this->setMsg("Spelet har börjat! Kasta tärningen för att samla poäng. Får du en etta förlorar du dina poäng och du får stå över din runda. Får du mer än en tvåa läggs poängen till i din pott. Väljer du själv att byta runda istället för att kasta tärningen läggs potten till i dina poäng.");
        $this->computerRoll();
    }

    /**
     * Sets Game is being played.
     * 
     * @return void.
     */
    public function startPlaying()
    {
        $this->calculateOrder();
        $this->playing = true;
    }
}
