<?php

namespace Erjh17\Dice;

/**
 * Generating histogram data.
 */
class Histogram
{
    /**
     * @var array $serie  The numbers stored in sequence.
     * @var int   $min    The lowest possible number.
     * @var int   $max    The highest possible number.
     */
    private $serie = [];
    private $min;
    private $max;



    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getSerie()
    {
        return $this->serie;
    }



    /**
     * Return a string with a textual representation of the histogram.
     *
     * @return string rad2deg(number)epresenting the histogram.
     */
    public function getAsText()
    {
        $serie = $this->getSerie();
        $counts = array();
        $maxNum = $this->max ?? 6;
        $minNum = $this->min ?? 1;
        if (!is_null($this->min) || !is_null($this->max)) {
            for ($i=$minNum; $i <= $maxNum; $i++) {
                $counts[$i] = 0;
            }
        }
        foreach ($serie as $roll) {
            if (isset($counts[$roll])) {
                $counts[$roll] += 1;
            }
        }
        $ret = "";
        for ($i=0; $i <= 6; $i++) {
            if (isset($counts[$i])) {
                $ret .= $i . ": " . str_repeat("*", $counts[$i])  . "\n";
            }
        }
        return $ret;
    }


    /**
     * Inject the object to use as base for the histogram data.
     *
     * @param HistogramInterface $object The object holding the serie.
     *
     * @return void.
     */
    public function injectData(HistogramInterface $object)
    {
        $this->serie = $object->getHistogramSerie();
        $this->min   = $object->getHistogramMin();
        $this->max   = $object->getHistogramMax();
    }
}
