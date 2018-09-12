<?php

/**
 * Guess number with SESSION.
 */
$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {
    $data = [
        "title" => "Spela gissa mitt nummer med SESSION"
    ];

    // POST the value
    $guess   = $_POST["guess"] ?? null;

    // Start a new game
    $game = new Erjh17\Guess\Guess($app->session->get('number') ?? -1, $app->session->get('tries') ?? 6);

    // Reset the game
    if (isset($_POST["reset"])) {
        $app->session->set('number', $game->random());
        $app->session->set('tries', 6);
        $url = $_SERVER['PHP_SELF'];
        header("Location: $url");
        exit;
    }

    // Do a guess
    $msg = null;
    if (isset($_POST["doGuess"]) && $_POST['doGuess'] !== '' && $game->tries() > 0) {
        $msg = $game->makeGuess($guess);

        $app->session->set('tries', $game->tries());
        $app->session->set('number', $game->number());
        // $_SESSION['tries'] = $game->tries();
        // $_SESSION['number'] = $game->number();
    }

    // Set $data values
    $data["game"]  =$game;
    $data["guess"] =$guess;
    $data["msg"]   =$msg;

    // Add view and return rendered page
    $app->page->add("anax/v2/guess/session", $data);
    return $app->page->render($data);
});

/**
 * Guess number with POST.
 */
$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {
    $data = [
        "title" => "Spela gissa mitt nummer med POST"
    ];

    // POST the values
    $number  = $_POST["number"] ?? -1;
    $tries   = $_POST["tries"]  ?? 6;
    $guess   = $_POST["guess"]  ?? null;

    // Start a new game
    $game = new Erjh17\Guess\Guess($number, $tries);

    // Reset the game
    if (isset($_POST["reset"])) {
        $game->reset();
    }

    // Do a guess
    $msg = null;
    if (isset($_POST["doGuess"]) && $_POST['doGuess'] !== '' && $tries > 0) {
        $msg = $game->makeGuess($guess);
    }

    // Set $data values
    $data["game"]  =$game;
    $data["guess"] =$guess;
    $data["msg"]   =$msg;

    // Add view and return rendered page
    $app->page->add("anax/v2/guess/post", $data);
    return $app->page->render($data);
});


/**
 * Guess number with GET.
 */
$app->router->get("gissa/get", function () use ($app) {
    $data = [
        "title" => "Spela gissa mitt nummer med GET"
    ];

    // Get the values
    $number  = $_GET["number"] ?? -1;
    $tries   = $_GET["tries"]  ?? 6;
    $guess   = $_GET["guess"]  ?? null;

    // Start a new game
    $game = new Erjh17\Guess\Guess($number, $tries);

    // Reset the game
    if (isset($_GET["reset"])) {
        // $game->random();
        $game->reset();
    }

    // Do a guess
    $msg = null;
    if (isset($_GET["doGuess"]) && $_GET['doGuess'] !== '' && $tries > 0) {
        $msg = $game->makeGuess($guess);
    }

    // Set $data values
    $data["game"]  =$game;
    $data["guess"] =$guess;
    $data["msg"]   =$msg;

    // Add view and return rendered page
    $app->page->add("anax/v2/guess/get", $data);
    return $app->page->render($data);
});
