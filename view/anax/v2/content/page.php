<?php
namespace Anax\View;

?>
<article>
    <header>
        <h1><?= htmlentities($data->getContent()->title) ?></h1>
        <p><i>Senast uppdaterad: <time datetime="<?= htmlentities($data->getContent()->modified_iso8601) ?>" pubdate><?= htmlentities($data->getContent()->modified) ?></time></i></p>
    </header>
    <?= $data->getHtml() ?>
</article>
