<?php
namespace Anax\View;

// if (!$res) {
//     return;
// }
require "navbar.php";
?>
<form method="get">
    <fieldset>
    <legend>Sök</legend>
    <p>
        <?php if ($type == "year") : ?>
            <label>Created between: 
            <input type="number" name="year1" value="<?= $year1 ?: 1900 ?>" min="1900" max="2100"/>
            - 
            <input type="number" name="year2" value="<?= $year2  ?: 2100 ?>" min="1900" max="2100"/>
            </label>
        <?php else : ?>
            <label>Filmtitel:
                <input type="search" name="search" value="<?= $arg  ?: "" ?>"/>
            </label>
        <?php endif ?>
    </p>
    <p>
        <input type="submit" name="doSearch" value="Sök">
    </p>
    </fieldset>
</form>
<?php
require "resultTable.php";
