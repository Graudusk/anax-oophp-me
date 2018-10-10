<?php 
/**
 * Show all movies.
 */
$app->router->get("movies", function () use ($app) {
    $title = "Filmer | oophp";

    $app->db->connect();
    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);
    $app->page->add("anax/v2/movie/index", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Search movies by title.
 */
$app->router->get("movies/search-title", function () use ($app) {
    $title = "Sök efter filmer | oophp";
    $arg = $app->request->getGet("search");
    $res = "";
    if ($app->request->getGet("doSearch")) {
        $postArg = "%" . $arg . "%";
        $app->db->connect();
        $sql = "SELECT * FROM movie WHERE LOWER(title) LIKE LOWER(?);";
        $res = $app->db->executeFetchAll($sql, [$postArg]);
    }
    $app->page->add("anax/v2/movie/search", [
        "arg" => $arg,
        "type" => "title",
        "res" => $res
    ]);

    return $app->page->render([
        "title" => $title
    ]);
});


/**
 * Search movies by year.
 */
$app->router->get("movies/search-year", function () use ($app) {
    $title = "Sök efter filmer | oophp";
    $res = "";
    $year1 = $app->request->getGet("year1");
    $year2 = $app->request->getGet("year2");
    if ($app->request->getGet("doSearch")) {
        $app->db->connect();
        $sql = "SELECT * FROM movie WHERE year >= ? AND year <= ?;";
        $res = $app->db->executeFetchAll($sql, [$year1, $year2]);
    }
    $app->page->add("anax/v2/movie/search", [
        "year1" => $year1,
        "year2" => $year2,
        "type" => "year",
        "res" => $res
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Select movie.
 */
$app->router->get("movies/select", function () use ($app) {
    $title = "Välj film | oophp";
    $arg = $app->request->getGet("movie");
    $res = "";

    $app->db->connect();
    $sql = "SELECT id, title FROM movie;";
    $movies = $app->db->executeFetchAll($sql);
    if ($app->request->getGet("doSelect")) {
        $app->db->connect();
        $sql = "SELECT * FROM movie WHERE id = ?;";
        $res = $app->db->executeFetchAll($sql, [$arg]);
    }
    $app->page->add("anax/v2/movie/select", [
        "movies" => $movies,
        "arg" => $arg,
        "type" => "title",
        "res" => $res
    ]);

    return $app->page->render([
        "title" => $title
    ]);
});


/**
 * Edit movie.
 */
$app->router->get("movies/edit/{movie}", function ($movie) use ($app) {
    $title = "Redigera film | oophp";
    $res = "";

    $app->db->connect();
    $sql = "SELECT * FROM movie WHERE id = ?;";
    $res = $app->db->executeFetch($sql, [$movie]);

    $app->page->add("anax/v2/movie/edit", [
        "movie" => $res,
        "type" => "title",
        "res" => $res
    ]);

    return $app->page->render([
        "title" => $title
    ]);
});

/**
 * Edit movie post route.
 */
$app->router->post("movies/edit/{movie}", function ($movie) use ($app) {
    $res = "";

    if ($app->request->getPost("doEdit")) {
        $movieId    = $app->request->getPost("movieId") ?: $movie;
        $movieTitle = $app->request->getPost("movieTitle");
        $movieYear  = $app->request->getPost("movieYear");
        $movieImage = $app->request->getPost("movieImage");

        $app->db->connect();
        $sql = "UPDATE movie SET title = ?, year = ?, image = ? WHERE id = ?;";
        $app->db->execute($sql, [$movieTitle, $movieYear, $movieImage, $movieId]);
    }
    return $app->response->redirect("movies");
});



/**
 * Delete movie.
 */
$app->router->get("movies/delete/{movie}", function ($movie) use ($app) {
    $title = "Radera film | oophp";
    $res = "";

    $app->db->connect();
    $sql = "SELECT * FROM movie WHERE id = ?;";
    $res = $app->db->executeFetch($sql, [$movie]);

    $app->page->add("anax/v2/movie/delete", [
        "movie" => $res,
        "type" => "title",
        "res" => $res
    ]);

    return $app->page->render([
        "title" => $title
    ]);
});

/**
 * Delete movie post route.
 */
$app->router->post("movies/delete/{movie}", function ($movie) use ($app) {
    $res = "";

    if ($app->request->getPost("doDelete")) {
        $movieId    = $app->request->getPost("movieId") ?: $movie;

        $app->db->connect();
        $sql = "DELETE FROM movie WHERE id = ?;";
        $app->db->execute($sql, [$movieId]);
    }
    return $app->response->redirect("movies");
});



/**
 * Add movie.
 */
$app->router->get("movies/add", function () use ($app) {
    $title = "Lägg till film | oophp";

    $app->page->add("anax/v2/movie/add", [
        "type" => "title"
    ]);

    return $app->page->render([
        "title" => $title
    ]);
});

/**
 * Add movie post route.
 */
$app->router->post("movies/add", function () use ($app) {
    $res = "";

    if ($app->request->getPost("doAdd")) {
        $movieTitle = $app->request->getPost("movieTitle");
        $movieYear  = $app->request->getPost("movieYear");
        $movieImage = $app->request->getPost("movieImage");

        $app->db->connect();
        $sql = "INSERT INTO movie (title, year, image) VALUES (?, ?, ?);";
        $app->db->execute($sql, [$movieTitle, $movieYear, $movieImage]);
    }

    return $app->response->redirect("movies");
});
