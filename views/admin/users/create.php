<?php
/**
 * @var string $title
 */
?>

<h1>
    <?= $title ?>
</h1>

<form action="<?= base_url('admin/create-user') ?>" method="post" class="w-50">
    <div class="mb-3">
        <label for="email" class="form-label">
            E-Mail
            <span class="text-danger">*</span>
        </label>

        <input type="email" name="email" id="email" placeholder="E-Mail" class="form-control" required />
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">
            Passwort
            <span class="text-danger">*</span>
        </label>

        <input type="password" name="password" id="password" placeholder="Passwort" class="form-control" required />
    </div>

    <div class="mb-3">
        <button type="submit" title="Speichern" class="btn btn-success">
            Speichern
        </button>

        <a href="<?= base_url('admin/users') ?>" title="Abbrechen" class="btn btn-danger">
            Abbrechen
        </a>
    </div>
</form>
