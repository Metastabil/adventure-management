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
        <label for="username" class="form-label">
            Benutzername
            <span class="text-danger">*</span>
        </label>

        <input type="text" name="username" id="username" placeholder="Benutzername" class="form-control" value="<?= $element['username'] ?>" disabled />
    </div>

    <div class="mb-3">
        <label for="level" class="form-label">
            Level
        </label>

        <input type="number" name="level" id="level" placeholder="Level" class="form-control" value="<?= $element['level'] ?>" disabled />
    </div>

    <div class="mb-3">
        <label for="active" class="form-label">
            Aktiv
        </label>

        <select name="active" id="active" class="form-select" disabled>
            <option value="0" <?= !$element['active'] ? 'selected' : '' ?>>Nein</option>
            <option value="1" <?= $element['active'] ? 'selected' : '' ?>>Ja</option>
        </select>
    </div>

    <div class="mb-3">
        <a href="<?= base_url('admin/players') ?>" class="btn btn-primary">
            Zurück
        </a>
    </div>
</form>
