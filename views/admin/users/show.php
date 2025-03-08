<?php
/**
 * @var array $element
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

        <input type="email" name="email" id="email" placeholder="E-Mail" class="form-control" value="<?= $element['email'] ?>"  disabled />
    </div>

    <div class="mb-3">
        <a href="<?= base_url('admin/users') ?>" title="Zurück" class="btn btn-primary">
            Zurück
        </a>
    </div>
</form>
