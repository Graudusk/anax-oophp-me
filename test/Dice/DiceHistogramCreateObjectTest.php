<?php

namespace Erjh17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceHistogram.
 */
class DiceHistogramCreateObjectTest extends TestCase
{
    /**
     * Verify that the function roll() adds to sum.
     */
    public function testGraphic()
    {
        $dice = new DiceHistogram();
        $this->assertInstanceOf("\Erjh17\Dice\DiceHistogram", $dice);

        $roll1 = $dice->roll();
        $res = "dice-" . $roll1;
        $graphic = $dice->graphic();
        $exp = "dice-";
        $this->assertNotEquals($exp, $graphic);

        $res = $dice->getHistogramMax();
        $exp = 6;

        $this->assertEquals($exp, $res);
    }
}
