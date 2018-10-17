<?php 
namespace Erjh17\TextFilter;

/**
 * Demonstrate bbcode filter.
 */

$app->router->get("filter/bbcode", function () use ($app) {
    $title = "Bbcode filter | TextFilter";
    $filter = new Filter();
    $text = file_get_contents(__DIR__ . "/../htdocs/text/bbcode.txt");
    $html = $filter->parse($text, ["bbcode"]);
    $app->page->add("anax/v2/filter/view", [
        "html" => $html,
        "text" => $text
    ]);
    return $app->page->render([
        "title" => $title
    ]);
});


/**
 * Demonstrate make clickable filter.
 */

$app->router->get("filter/link", function () use ($app) {
    $title = "Make clickable filter | TextFilter";
    $filter = new Filter();
    $text = file_get_contents(__DIR__ . "/../htdocs/text/clickable.txt");
    $html = $filter->parse($text, ["link"]);
    $app->page->add("anax/v2/filter/view", [
        "html" => $html,
        "text" => $text
    ]);
    return $app->page->render([
        "title" => $title
    ]);
});

/**
 * Demonstrate markdown filter.
 */

$app->router->get("filter/markdown", function () use ($app) {
    $title = "Markdown filter | TextFilter";
    $filter = new Filter();
    $text = file_get_contents(__DIR__ . "/../htdocs/text/sample.md");
    $html = $filter->parse($text, ["markdown"]);
    $app->page->add("anax/v2/filter/view", [
        "html" => $html,
        "text" => $text
    ]);
    return $app->page->render([
        "title" => $title
    ]);
});

/**
 * Demonstrate newline to <br> filter.
 */

$app->router->get("filter/nl2br", function () use ($app) {
    $title = "Newline to <br> filter | TextFilter";
    $filter = new Filter();
    $text = file_get_contents(__DIR__ . "/../htdocs/text/nl2br.txt");
    $html = $filter->parse($text, ["nl2br"]);
    $app->page->add("anax/v2/filter/view", [
        "html" => $html,
        "text" => $text
    ]);
    return $app->page->render([
        "title" => $title
    ]);
});
