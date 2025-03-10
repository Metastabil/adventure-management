<?php
/**
 * @var string $title
 */
?>

<h1>
    <?= $title ?>
</h1>

<form action="<?= base_url('admin/create-resource') ?>" method="post" class="w-50">
    <div class="mb-3">
        <label for="name" class="form-label">
            Bezeichnung
            <span class="text-danger">*</span>
        </label>

        <input type="text" name="name" id="name" placeholder="Bezeichnung" class="form-control" required />
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">
            Beschreibung
        </label>

        <textarea name="description" id="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">
            Speichen
        </button>

        <a href="<?= base_url('admin/resources') ?>" class="btn btn-danger">
            Abbrechen
        </a>
    </div>
</form>
