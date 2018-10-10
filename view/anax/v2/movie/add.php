<?php
namespace Anax\View;

require "navbar.php";
?>
<form method="post">
    <fieldset>
    <legend>Lägg till</legend>

    <p>
        <label>Titel:<br> 
        <input type="text" name="movieTitle" value=""/>
        </label>
    </p>

    <p>
        <label>År:<br> 
        <input type="number" name="movieYear" value=""/>
    </p>

    <p>
        <label>Bild:<br> 
        <input type="text" name="movieImage" value="img/noimage.png"/>
        </label>
    </p>

    <p>
        <input type="submit" name="doAdd" value="Lägg till">
        <input type="reset" value="Återställ">
    </p>
    </fieldset>
</form>
