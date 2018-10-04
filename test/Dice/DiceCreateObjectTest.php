<?php

namespace Erjh17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DiceCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Erjh17\Dice\Dice", $dice);

        $res = $dice->getSides();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }



    /**
     * Construct object and verify that the object has the expected
     * properties. Use only first argument.
     */
    public function testCreateObjectFirstArgument()
    {
        $dice = new Dice(4);
        $this->assertInstanceOf("\Erjh17\Dice\Dice", $dice);

        $res = $dice->getSides();
        $exp = 4;
        $this->assertEquals($exp, $res);
    }


    /**
     * Verify that the function toss() adds to sum.
     */
    public function testSum()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Erjh17\Dice\Dice", $dice);

        $dice->roll();
        $sum1 = $dice->getSum();

        $dice->roll();
        $sum2 = $dice->getSum();

        $this->assertNotEquals($sum1, $sum2);
    }


    /**
     * Verify that the function roll() adds to tossed value.
     */
    public function testTossed()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Erjh17\Dice\Dice", $dice);

        $dice->roll();
        $rolled1 = $dice->getTossed();

        $dice->roll();
        $rolled2 = $dice->getTossed();

        $this->assertNotEquals($rolled1, $rolled2);
    }



    /**
     * Verify that the function getLastRoll() returns the last roll value.
     */
    public function testGetLastRoll()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Erjh17\Dice\Dice", $dice);

        $roll = $dice->roll();
        $lastRoll = $dice->getLastRoll();

        $this->assertEquals($roll, $lastRoll);
    }



    /**
     * Verify that the function getAverage() returns the correct value.
     */
    public function testGetAverage()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Erjh17\Dice\Dice", $dice);

        $dice->roll();
        $testAverage = $dice->getAverage();

        $sum = $dice->getSum();
        $rolled = $dice->getTossed();
        $average = $sum / $rolled;

        $this->assertEquals($testAverage, round($average, 2));
    }
}
