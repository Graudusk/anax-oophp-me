<form method="post">
    <fieldset>
    <legend>Redigera</legend>
    <input type="hidden" name="contentId" value="<?= htmlentities($data->getContent()->id) ?>"/>

    <p>
        <label>Titel:<br> 
        <input type="text" name="contentTitle" value="<?= htmlentities($data->getContent()->title) ?>"/>
        </label>
    </p>

    <p>
        <label>Sökväg:<br> 
        <input type="text" name="contentPath" value="<?= htmlentities($data->getContent()->path) ?>"/>
    </p>

    <p>
        <label>Slug:<br> 
        <input type="text" name="contentSlug" value="<?= htmlentities($data->getContent()->slug) ?>"/>
    </p>

    <p>
        <label>Text:<br> 
        <textarea name="contentData"><?= htmlentities($data->getContent()->data) ?></textarea>
     </p>

     <p>
         <label>Typ:<br> 
         <input type="text" name="contentType" value="<?= htmlentities($data->getContent()->type) ?>"/>
     </p>

     <p>
         <label>Filter:<br> 
         <input type="text" name="contentFilter" value="<?= htmlentities($data->getContent()->filter) ?>"/>
     </p>

     <p>
         <label>Publicerad:<br> 
         <input type="datetime" name="contentPublish" value="<?= htmlentities($data->getContent()->published) ?>"/>
     </p>

    <p>
        <button type="submit" name="doEdit" value="edit"><i class="fas fa-save" aria-hidden="true"></i> Spara</button>
        <button type="reset"><i class="fa fa-undo" aria-hidden="true"></i> Återställ</button>
        <button type="submit" name="doDelete" value="delete"><i class="fas fa-trash-alt" aria-hidden="true"></i> Radera</button>
    </p>
    </fieldset>
</form>
