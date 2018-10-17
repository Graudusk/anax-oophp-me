<?php
use \Michelf\MarkdownExtra;

namespace Erjh17\TextFilter;

/**
 * Filter and format text content.
 */
class FilterMarkdown
{
    /**
     * Helper, Markdown formatting converting to HTML.
     *
     * @param string text The text to be converted.
     *
     * @return string the formatted text.
     */
    public function markdown($text)
    {
        $mdExtra = new \Michelf\MarkdownExtra();
        return $mdExtra::defaultTransform($text);
    }
}
