<?php
/**
 * Guess number with SESSION.
 */
namespace Erjh17\Dice;

$app->router->post("dice100", function () use ($app) {
    $data = [
        "title" => "Spela tärningspelet"
    ];

    // Declare the values
    $game = null;
    $diceHand = null;
    // $dice = null;
    $sorted = false;

    // Reset the game
    if ($app->request->getPost('restart')) {
        $app->session->set('game', $game);
        // $app->session->set('dice', $dice);
        $app->session->set('diceHand', $diceHand);
        return $app->response->redirect("dice100");
    }

    // Start a new game
    if ($app->request->getPost('start')) {
        $game = new Game($app->request->getPost('players'), $app->request->getPost('handSize'));
        $game->startGame();

        $app->session->set('game', $game);
    } else {
        $game = $app->session->get('game') ?? new Game(2);
    }

    // Change player turn
    if ($app->request->getPost('change_turn')) {
        $game->addToScore();
        $app->session->set('game', $game);
    } else {
        $game = $app->session->get('game') ?? new Game(2);
    }

    // Roll for decide order
    if ($app->request->getPost('decide_order')) {
        $game->orderRoll();
        $app->session->set('game', $game);
    }

    // End order rolls
    if ($app->request->getPost('start_turns')) {
        $game->endOrderRolls();
        $app->session->set('game', $game);
    }

    // Roll for points!
    if ($app->request->getPost('roll')) {
        $game->roll();
        $app->session->set('game', $game);
    }
    $app->session->set('game', $game);
    // $app->session->set('dice', $dice);
    $app->session->set('diceHand', $diceHand);

    return $app->response->redirect("dice100");
});

/**
 * Skapa resultatsidan.
 */
$app->router->get("dice100", function () use ($app) {
    $data = [
        "title" => "Spela tärningspelet"
    ];

    $game = $app->session->get('game') ?? new Game(2);
    // $dice = $app->session->get('dice') ?? null;
    $currPlayer = $game->getCurrentPlayerObj();
    $diceHand = $currPlayer->getDiceHand() ?? null;
    $histogram = new Histogram();
    if ($diceHand !== null && $diceHand->getHistogramSerie()) {
        $histogram->injectData($diceHand);
    }

    // Set $data values
    $data["game"] = $game;
    $data["histogram"] = $histogram;
    $data["diceHand"] = $diceHand;
    // $data["dice"] = $dice;

    // Add view and return rendered page
    $app->view->add("anax/v2/dice/dice100", $data);
    return $app->page->render($data);
});
