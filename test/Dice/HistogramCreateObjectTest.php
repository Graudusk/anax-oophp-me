<?php

namespace Erjh17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Histogram.
 */
class HistogramCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $game = new Game(2);
        $this->assertInstanceOf("\Erjh17\Dice\Game", $game);

        $currPlayer = $game->getCurrentPlayerObj();
        $diceHand = $currPlayer->getDiceHand();

        $game->startGame();

        $game->orderRoll(6);
        $game->orderRoll(2);

        $game->endOrderRolls();

        foreach ($game->getPlayers() as $player) {
            $player->setNotPlaying();
        }
        $game->resetCurrentPlayer();
        $game->startPlaying();
        $game->setOrderNotDecided();

        $currPlayer = $game->getHumanPlayer();
        $currPlayer->setPlaying();

        $game->addToScore();

        $game->roll();

        $currPlayer = $game->getCurrentPlayerObj();
        $diceHand = $currPlayer->getDiceHand();

        $histogram = new Histogram();
        $this->assertInstanceOf("\Erjh17\Dice\Histogram", $histogram);

        $histogram->injectData($diceHand);

        $res = $histogram->getAsText();
        $exp = [];
        $this->assertNotEquals($res, $exp);
    }
}
