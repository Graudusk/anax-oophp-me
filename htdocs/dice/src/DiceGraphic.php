<?php
/**
 * Showing off a standard class with methods and properties.
 */
// namespace Erjh17\Dice;

/*
 *self::  Referera till den egna klassen.
 *parent::    Referera till förälder/super/bas klassen.
 *$this->     Referera till nuvarande objekt.
 */

/**
 * A graphic dice.
 */
class DiceGraphic extends Dice
{
    /**
     * @var integer SIDES Number of sides of the Dice.
     */
    const SIDES = 6;

    /**
     * Constructor to initiate the dice with six number of sides.
     */
    public function __construct()
    {
        parent::__construct(self::SIDES);
    }
    
    /**
     * Get a graphic value of the last rolled dice.
     *
     * @return string as graphical representation of last rolled dice.
     */
    public function graphic()
    {
        return "dice-" . $this->getLastRoll();
    }
}
