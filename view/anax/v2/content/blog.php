<?php
namespace Anax\View;

if (!$data->getResult()) {
    return;
}
?>

<article>

<?php foreach ($data->getResult() as $row) : ?>
<section>
    <header>
        <h1><a href="<?= asset("content/blog/" . htmlentities($row->slug)) ?>"><?= htmlentities($row->title) ?></a></h1>
        <p><i>Publicerad: <time datetime="<?= htmlentities($row->published_iso8601) ?>" pubdate><?= htmlentities($row->published) ?></time></i></p>
    </header>
    <?= htmlentities($row->data) ?>
</section>
<?php endforeach; ?>

</article>
