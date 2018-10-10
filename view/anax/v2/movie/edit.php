<?php
namespace Anax\View;

require "navbar.php";
if ($movie) :
?>
<form method="post">
    <fieldset>
    <legend>Redigera</legend>
    <input type="hidden" name="movieId" value="<?= $movie->id ?>"/>

    <p>
        <label>Titel:<br> 
        <input type="text" name="movieTitle" value="<?= $movie->title ?>"/>
        </label>
    </p>

    <p>
        <label>År:<br> 
        <input type="number" name="movieYear" value="<?= $movie->year ?>"/>
    </p>

    <p>
        <label>Bild:<br> 
        <input type="text" name="movieImage" value="<?= $movie->image ?>"/>
        </label>
    </p>

    <p>
        <input type="submit" name="doEdit" value="Spara">
        <input type="reset" value="Återställ">
    </p>
    </fieldset>
</form>
<?php
endif;
// require "movieTable.php";
