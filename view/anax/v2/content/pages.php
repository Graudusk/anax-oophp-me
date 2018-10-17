<?php
namespace Anax\View;

if (!$data->getResult()) {
    return;
}
?>

<table>
    <tr class="first">
        <th>Id</th>
        <th>Titel</th>
        <th>Typ</th>
        <th>Status</th>
        <th>Publicerad</th>
        <th>Raderad</th>
        <th>Skapad</th>
        <th>Updaterad</th>
        <th>Sökväg</th>
        <th>Slug</th>
    </tr>
<?php $id = -1; foreach ($data->getResult() as $row) :
    $path = isset($row->path) ? htmlentities($row->path) : htmlentities($row->slug);
    $id++;  ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><a href="<?= asset("content/page/" . $path) ?>"><?= $row->title ?></a></td>
        <td><?= $row->type ?></td>
        <td><?= $row->status ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->deleted ?></td>
        <td><?= $row->created ?></td>
        <td><?= $row->updated ?></td>
        <td><?= $row->path ?></td>
        <td><?= $row->slug ?></td>
    </tr>
<?php endforeach; ?>
</table>
