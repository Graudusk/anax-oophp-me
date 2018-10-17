<?php
if (!$data->getResult()) {
    return;
}
?>

<table>
    <tr class="first">
        <th>Id</th>
        <th>Titel</th>
        <th>Typ</th>
        <th>Publicerad</th>
        <th>Skapad</th>
        <th>Updaterad</th>
        <th>Raderad</th>
        <th>Sökväg</th>
        <th>Slug</th>
        <th>Verktyg</th>
    </tr>
<?php $id = -1; foreach ($data->getResult() as $row) :
    $id++; ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->title ?></td>
        <td><?= $row->type ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->created ?></td>
        <td><?= $row->updated ?></td>
        <td><?= $row->deleted ?></td>
        <td><?= $row->path ?></td>
        <td><?= $row->slug ?></td>
        <td>
            <a class="icons" href="edit/<?= $row->id ?>" title="Edit this content">
                <i class="fas fa-edit" aria-hidden="true"></i>
            </a>
            <a class="icons" href="delete/<?= $row->id ?>" title="Edit this content">
                <i class="fas fa-trash-alt" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
