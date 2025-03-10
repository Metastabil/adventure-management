<?php
/**
 * @var array $elements
 * @var string $title
 */
?>

<h1>
    <?= $title ?>
</h1>

<?= get_create_button(base_url('admin/create-resource')) ?>

<table>
    <thead>
        <tr>
            <th scope="col">Bezeichnung</th>
            <th scope="col">Beschreibung</th>
            <th scope="col">Angelegt am</th>
            <th scope="col">Aktualisiert am</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($elements as $e) : ?>
            <tr>
                <td><?= $e['name'] ?></td>
                <td><?= $e['description'] ?></td>
                <td><?= format_timestamp($e['created']) ?></td>
                <td><?= format_timestamp($e['updated']) ?></td>
                <td class="text-end">
                    <a href="<?= base_url('admin/show-resource/' . $e['id']) ?>" class="btn btn-success">
                        Details
                    </a>

                    <a href="<?= base_url('admin/update-resource/' . $e['id']) ?>" class="btn btn-primary">
                        Bearbeiten
                    </a>

                    <a href="javascript:deleteElement(<?= $e['id'] ?>)" class="btn btn-danger">
                        Löschen
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    function deleteElement(id) {
        const confirmation = confirm('Wollen Sie die Ressource wirklich löschen?');

        if (confirmation) {
            window.location.href = `${baseURL}admin/delete-resource/${id}`;
        }
    }
</script>