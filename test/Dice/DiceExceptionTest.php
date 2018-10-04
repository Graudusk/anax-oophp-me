<?php

namespace Erjh17\Guess;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class GuessException.
 */
class GuessExceptionTest extends TestCase
{
    /**
     * Verify that exception is thrown.
     */
    public function testException()
    {
        $guess = new Guess();
        $this->assertInstanceOf("\Erjh17\Guess\Guess", $guess);

        $this->expectException(\Erjh17\Guess\GuessException::class);
        $guess->makeGuess(160);
    }
}
