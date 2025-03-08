<?php
/**
 * @var array $elements
 * @var string $title
 */
?>

<h1>
    <?= $title ?>
</h1>

<?= get_create_button(base_url('admin/create-user')) ?>

<table>
    <thead>
        <tr>
            <th scope="col">E-Mail</th>
            <th scope="col">Angelegt am</th>
            <th scope="col">Aktualisiert am</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($elements as $element) : ?>
            <tr>
                <td>
                    <?= $element['email'] ?>
                </td>
                <td>
                    <?= format_timestamp($element['created']) ?>
                </td>
                <td>
                    <?= format_timestamp($element['updated']) ?>
                </td>
                <td class="text-end">
                    <a href="<?= base_url('admin/show-user/' . $element['id']) ?>" class="btn btn-primary">
                        Details
                    </a>

                    <a href="<?= base_url('admin/update-user/' . $element['id']) ?>" class="btn btn-success">
                        Bearbeiten
                    </a>

                    <a href="javascript:deleteUser(<?= $element['id'] ?>)" class="btn btn-danger">
                        Löschen
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    function deleteUser(id) {
        const confirmation = confirm('Wollen Sie den Benutzer wirklich löschen?');

        if (confirmation) {
            window.location.href = `${baseURL}admin/delete-user/${id}`;
        }
    }
</script>