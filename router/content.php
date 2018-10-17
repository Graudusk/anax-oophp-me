<?php 
// namespace Anax\View;

$app->router->get(["content/*/*"], function () use ($app) {
    $app->page->add("anax/v2/content/navbar");
});

/**
 * Hämta allt innehåll
 */
$app->router->get("content/show-all", function () use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getIndex();
});



/**
 * Hämta allt innehåll och visa adminverktyg
 */
$app->router->get("content/admin", function () use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getAdmin();
});



/**
 * Redigera innehåll
 */
$app->router->get("content/edit/{id:digit}", function ($id) use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getEdit($id);
});



/**
 * Redigera innehåll posthanterare
 */
$app->router->post("content/edit/{id:digit}", function ($id) use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getEditPost($id);
});


/**
 * Radera innehåll
 */
$app->router->get("content/delete/{id:digit}", function ($id) use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getDelete($id);
});


/**
 * Radera innehåll
 */
$app->router->post("content/delete/{id:digit}", function ($id) use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getDeletePost($id);
});


$app->router->get("content/create", function () use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getCreate();
});


$app->router->post("content/create", function () use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getCreatePost();
});


$app->router->get("content/pages", function () use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getPages();
});


$app->router->get("content/page/{path}", function ($path) use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getPage($path);
});


$app->router->get("content/blog", function () use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getBlogs();
});


$app->router->get("content/blog/{slug}", function ($slug) use ($app) {
    $obj = new Erjh17\Content\Content();
    $obj->injectApp($app);
    return $obj->getBlog($slug);
});


// $app->router->get("content/reset", function () use ($app) {
//     $title = "Återställ databasen | Content";

//     $app->page->add("anax/v2/content/reset");
//     return $app->page->render([
//         "title" => $title
//     ]);
// });


// $app->router->post("content/reset", function () use ($app) {
//     // Restore the database to its original settings
//     $file   = asset("sql/content/setup.sql");
//     $mysql  = "mysql";
//     $output = null;
//     /**
//      * Details for connecting to the database.
//      */

//     $config = $app->get(asset("config/database"));
//     var_dump($config);
//     exit;
//     // Set the database configuration
//     $databaseConfig = $config["config"] ?? [];

//     // Extract hostname and databasename from dsn
//     $dsnDetail = [];
//     preg_match("/mysql:host=(.+);dbname=([^;.]+)/", $databaseConfig["dsn"], $dsnDetail);
//     $host = $dsnDetail[1];
//     $database = $dsnDetail[2];
//     $login = $databaseConfig["login"];
//     $password = $databaseConfig["password"];

//     if (isset($_POST["reset"]) || isset($_GET["reset"])) {
//         $command = "$mysql -h{$host} -u{$login} -p{$password} $database < $file 2>&1";
//         $output = [];
//         $status = null;
//         $res = exec($command, $output, $status);
//         $output = "<p>The command was: <code>$command</code>.<br>The command exit status was $status."
//             . "<br>The output from the command was:</p><pre>"
//             . print_r($output, 1);
//     }
// });
