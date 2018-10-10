<?php
namespace Anax\View;

require "navbar.php";
?>
<form method="get">
    <fieldset>
    <legend>Välj film</legend>
    <p>
        <select name="movie" required>
            <option value="null">Välj film i listan</option>
            <?php foreach ($movies as $movie) : ?>
                <option value="<?= $movie->id?>"><?= $movie->title?></option>
            <?php endforeach ?>
        </select>
    </p>
    <p>
        <input type="submit" name="doSelect" value="Välj">
    </p>
    </fieldset>
</form>
<?php
require "resultTable.php";
