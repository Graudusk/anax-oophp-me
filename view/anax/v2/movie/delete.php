<?php
namespace Anax\View;

require "navbar.php";
if ($movie) :
?>
<form method="post">
    <fieldset>
    <legend>Radera</legend>
    <input type="hidden" name="movieId" value="<?= $movie->id ?>"/>

    <p>
        <label>Titel:<br> 
        <input type="text" name="movieTitle" disabled value="<?= $movie->title ?>"/>
        </label>
    </p>

    <p>
        <label>År:<br> 
        <input type="number" name="movieYear" disabled value="<?= $movie->year ?>"/>
    </p>

    <p>
        <label>Bild:<br> 
        <input type="text" name="movieImage" disabled value="<?= $movie->image ?>"/>
        </label>
    </p>

    <p>
        <input type="submit" name="doDelete" value="Radera">
    </p>
    </fieldset>
</form>
<?php
endif;
