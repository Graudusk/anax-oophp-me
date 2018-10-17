<form method="post">
    <fieldset>
    <legend>Radera</legend>

    <input type="hidden" name="contentId" value="<?= htmlentities($data->getContent()->id) ?>"/>

    <p>
        <label>Titel:<br> 
            <input type="text" name="contentTitle" readonly value="<?= htmlentities($data->getContent()->title) ?>" readonly/>
        </label>
    </p>

    <p>
        <button type="submit" name="doDelete"><i class="fas fa-trash-alt" aria-hidden="true"></i> Radera</button>
    </p>
    </fieldset>
</form>
