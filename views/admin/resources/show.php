<?php
/**
 * @var array $element
 * @var string $title
 */
?>

<h1>
    <?= $title ?>
</h1>

<form action="javascript:void(0)" method="post" class="w-50">
    <div class="mb-3">
        <label for="name" class="form-label">
            Bezeichnung
            <span class="text-danger">*</span>
        </label>

        <input type="text" name="name" id="name" placeholder="Bezeichnung" class="form-control" value="<?= $element['name'] ?>" disabled />
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">
            Beschreibung
        </label>

        <textarea name="description" id="description" class="form-control" disabled><?= $element['description'] ?></textarea>
    </div>

    <div class="mb-3">
        <a href="<?= base_url('admin/resources') ?>" class="btn btn-primary">
            Zurück
        </a>
    </div>
</form>
