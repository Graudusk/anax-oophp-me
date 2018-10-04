<?php

namespace Erjh17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceGraphic.
 */
class DiceGraphicCreateObjectTest extends TestCase
{
    /**
     * Verify that the function roll() adds to sum.
     */
    public function testGraphic()
    {
        $dice = new DiceGraphic();
        $this->assertInstanceOf("\Erjh17\Dice\DiceGraphic", $dice);

        $roll1 = $dice->roll();
        $res = "dice-" . $roll1;
        $graphic = $dice->graphic();

        $this->assertEquals($graphic, $res);
    }
}
