<?php
/**
 * @var array $elements
 * @var string $title
 */
?>

<h1>
    <?= $title ?>
</h1>

<?= get_create_button(base_url('admin/create-player')) ?>

<table>
    <thead>
        <tr>
            <th scope="col">Benutzername</th>
            <th scope="col">Level</th>
            <th scope="col">Status</th>
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
                    <?= $e['level'] ?>
                </td>
                <td>
                    <?= $e['active'] ? 'Aktiviert' : 'Deaktiviert' ?>
                </td>
                <td>
                    <?= format_timestamp($e['created']) ?>
                </td>
                <td>
                    <?= format_timestamp($e['updated']) ?>
                </td>
                <td class="text-end">
                    <a href="<?= base_url('admin/show-player/' . $e['id']) ?>" class="btn btn-success">
                        Details
                    </a>
                    <a href="<?= base_url('admin/update-player/' . $e['id']) ?>" class="btn btn-primary">
                        Bearbeiten
                    </a>
                    <a href="javascript:deletePlayer(<?= $e['id'] ?>)" class="btn btn-danger">
                        Löschen
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    function deletePlayer(id) {
        const confirmation = confirm('Wollen Sie den Spieler wirklich löschen?');

        if (confirmation) {
            window.location.href = `${baseURL}admin/delete-player/${id}`;
        }
    }
</script>