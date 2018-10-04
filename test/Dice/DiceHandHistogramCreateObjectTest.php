<?php

namespace Erjh17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceHandHistogram.
 */
class DiceHandHistogramCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dice = new DiceHandHistogram();
        $this->assertInstanceOf("\Erjh17\Dice\DiceHandHistogram", $dice);

        $res = $dice->getDices();
        $exp = 5;

        $this->assertEquals($exp, sizeof($res));
    }



    /**
     * Construct object and verify that the object has the expected
     * properties. Use only first argument.
     */
    public function testCreateObjectFirstArgument()
    {
        $dice = new DiceHandHistogram(4);
        $this->assertInstanceOf("\Erjh17\Dice\DiceHandHistogram", $dice);


        $res = $dice->getDices();
        $exp = 4;
        $this->assertEquals($exp, sizeof($res));
    }


    /**
     * Verify that the function roll() adds to sum.
     */
    public function testSum()
    {
        $dice = new DiceHandHistogram();
        $this->assertInstanceOf("\Erjh17\Dice\DiceHandHistogram", $dice);

        $dice->roll();
        $sum1 = $dice->getSum();

        $dice->resetValues();
        $sum2 = $dice->getSum();

        $this->assertNotEquals($sum1, $sum2);
    }



    /**
     * Verify that the function getAverage() returns the correct value.
     */
    public function testGetAverage()
    {
        $dice = new DiceHandHistogram();
        $this->assertInstanceOf("\Erjh17\Dice\DiceHandHistogram", $dice);

        $dice->roll();
        $testAverage = $dice->getAverage();

        $sum = $dice->getSum();
        $dices = $dice->getDices();
        $average = $sum / sizeof($dices);
        round($average, 2);

        $this->assertEquals($testAverage, round($average, 2));
    }
}
