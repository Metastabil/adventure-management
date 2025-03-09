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
            Spielername
            <span class="text-danger">*</span>
        </label>

        <input type="text" name="username" id="username" placeholder="Spielername" class="form-control" value="<?= $element['username'] ?>" disabled />
    </div>

    <div class="mb-3">
        <a href="<?= base_url('admin/inventories') ?>" class="btn btn-primary">
            Zurück
        </a>
    </div>
</form>
