<?php
/**
 * @var string $title
 */
?>

<h1>
    <?= $title ?>
</h1>

<form action="<?= base_url('admin/create-player') ?>" method="post" class="w-50">
    <div class="mb-3">
        <label for="username" class="form-label">
            Benutzername
            <span class="text-danger">*</span>
        </label>

        <input type="text" name="username" id="username" placeholder="Benutzername" class="form-control" required />
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">
            Passwort
            <span class="text-danger">*</span>
        </label>

        <input type="password" name="password" id="password" placeholder="Passwort" class="form-control" required />
    </div>

    <div class="mb-3">
        <label for="level" class="form-label">
            Level
        </label>

        <input type="number" name="level" id="level" placeholder="Level" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="active" class="form-label">
            Aktiv
        </label>

        <select name="active" id="active" class="form-select">
            <option value="0">Nein</option>
            <option value="1">Ja</option>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">
            Speichern
        </button>

        <a href="<?= base_url('admin/players') ?>" class="btn btn-danger">
            Abbrechen
        </a>
    </div>
</form>
