<?php

namespace Erjh17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Game.
 */
class GameCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $game = new Game();
        $this->assertInstanceOf("\Erjh17\Dice\Game", $game);

        $res = sizeof($game->getPlayers());
        $exp = 2;
        $this->assertEquals($exp, $res);
    }



    /**
     * Construct object and verify that the object has the expected
     * properties. Use only first argument.
     */
    public function testCreateObjectFirstArgument()
    {
        $game = new Game(4);
        $this->assertInstanceOf("\Erjh17\Dice\Game", $game);

        $res = sizeof($game->getPlayers());
        $exp = 4;
        $this->assertEquals($exp, $res);
    }


    /**
     * Construct object and verify that the object has the expected
     * properties. Use both arguments.
     */
    public function testCreateObjectBothArgument()
    {
        $game = new Game(4, 3);
        $this->assertInstanceOf("\Erjh17\Dice\Game", $game);

        $res = sizeof($game->getPlayers());
        $exp = 4;
        $this->assertEquals($exp, $res);

        $res = $game->diceHandSize();
        $exp = 3;
        $this->assertEquals($exp, $res);
    }


    /**
     * Verify that the function startGame() sets started to true, msg and current player.
     */
    public function testStartGame()
    {
        $game = new Game(4, 3);
        $this->assertInstanceOf("\Erjh17\Dice\Game", $game);

        $game->startGame();

        $res = $game->isStarted();
        $exp = true;
        $this->assertEquals($exp, $res);

        $currPlayer = $game->getCurrentPlayerObj();
        $res = $currPlayer->isPlaying();
        $exp = true;
        $this->assertEquals($exp, $res);

        $res = $game->getMsg();
        $exp = "Kasta tärningen för att bestämma spelordningen.";
        $this->assertEquals($exp, $res);
    }


    /**
     * Verify that the function endOrderRolls() sets playing to true, msg and current player.
     */
    public function testEndOrderRolls()
    {
        $game = new Game(4, 3);
        $this->assertInstanceOf("\Erjh17\Dice\Game", $game);

        $game->startGame();

        $game->orderRoll(6);

        $game->endOrderRolls();

        $res = $game->getRoundPoints();
        $exp = 0;
        $this->assertEquals($exp, $res);

        $res = $game->isPlaying();
        $exp = true;
        $this->assertEquals($exp, $res);
    }


    /**
     * Verify that the function roll() sets playing to true, msg and current player.
     */
    public function testRolled()
    {
        $game = new Game(2, 3);
        $this->assertInstanceOf("\Erjh17\Dice\Game", $game);

        $res = $game->canRoll();
        $exp = false;
        $this->assertEquals($exp, $res);

        $res = $game->getOrderDecided();
        $exp = false;
        $this->assertEquals($exp, $res);

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

        $res = $currPlayer->isPlaying();
        $exp = true;
        $this->assertEquals($exp, $res);

        $game->addToScore();

        $game->roll();

        $currPlayer = $game->getCurrentPlayerObj();
        $diceHand = $currPlayer->getDiceHand();
        $res = $diceHand->getSum();
        $exp = 0;
        $this->assertNotEquals($exp, $res);

        $res = $game->isPlaying();
        $exp = true;
        $this->assertEquals($exp, $res);
    }


    /**
     * Verify that the function roll() with winning numbers equals a win.
     */
    public function testWin()
    {
        $game = new Game(2, 6);
        $this->assertInstanceOf("\Erjh17\Dice\Game", $game);

        $game->startGame();

        $game->orderRoll();
        $game->orderRoll();

        $game->endOrderRolls();

        $currPlayer = $game->getCurrentPlayerObj();
        $res = $currPlayer->isPlaying();
        $exp = true;
        $this->assertEquals($exp, $res);

        $res = $currPlayer->isCurrent($game->getCurrentPlayerObj()->getId());
        $exp = true;
        $this->assertEquals($exp, $res);

        $currPlayer->addPoints(100);
        $game->addToScore();

        $res = $game->isPlaying();
        $exp = false;
        $this->assertEquals($exp, $res);
    }


    /**
     * Verify that the function roll() with winning numbers equals a win.
     */
    public function testAi()
    {
        $game = new Game(2, 6);
        $this->assertInstanceOf("\Erjh17\Dice\Game", $game);

        $game->startGame();

        $game->orderRoll();
        $game->orderRoll();

        $game->endOrderRolls();

        $currPlayer = $game->getCurrentPlayerObj();
        $res = $currPlayer->isPlaying();
        $exp = true;
        $this->assertEquals($exp, $res);

        $res = $currPlayer->isCurrent($game->getCurrentPlayerObj()->getId());
        $exp = true;
        $this->assertEquals($exp, $res);

        $res = $currPlayer->pcAi(6, 99);
        $exp = [2, 2, 48, 76];
        $this->assertEquals($exp, $res);
    }
}
