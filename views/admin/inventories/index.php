<?php
/**
 * @var array $elements
 * @var string $title
 */
?>

<h1>
    <?= $title ?>
</h1>

<table>
    <thead>
        <tr>
            <th scope="col">Spieler</th>
            <th scope="col">Angelegt am</th>
            <th scope="col">Aktualisiert am</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($elements as $e) : ?>
            <tr>
                <td>
                    <?= $e['username'] ?>
                </td>
                <td>
                    <?= format_timestamp($e['created']) ?>
                </td>
                <td>
                    <?= format_timestamp($e['updated']) ?>
                </td>
                <td>
                    <a href="<?= base_url('admin/show-inventory/' . $e['id']) ?>" class="btn btn-primary">
                        Details
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>