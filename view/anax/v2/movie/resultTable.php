<?php
namespace Anax\View;

if ($res) :
?>
<table>
    <tr class="first">
        <th>Rad</th>
        <th>Id</th>
        <th>Bild</th>
        <th>Titel</th>
        <th>År</th>
        <th>Verktyg</th>
    </tr>
<?php $id = -1; foreach ($res as $row) :
    $id++; ?>
    <tr>
        <td><?= $id ?></td>
        <td><?= $row->id ?></td>
        <td><img width="120" class="thumb" src="<?= getImage($row->image) ?>"></td>
        <td><?= $row->title ?></td>
        <td><?= $row->year ?></td>
        <td><a href="<?= asset("movies/edit/" . $row->id) ?>">Redigera</a></td>
        <td><a href="<?= asset("movies/delete/" . $row->id) ?>">Radera</a></td>
    </tr>
<?php endforeach; ?>
</table>
<?php 
endif;
