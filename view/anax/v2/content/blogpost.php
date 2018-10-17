<article>
    <header>
        <h1><?= htmlentities($data->getContent()->title) ?></h1>
        <p><i>Publicerad: <time datetime="<?= htmlentities($data->getContent()->published_iso8601) ?>" pubdate><?= htmlentities($data->getContent()->published) ?></time></i></p>
    </header>
    <?= $data->getHtml() ?>
</article>
