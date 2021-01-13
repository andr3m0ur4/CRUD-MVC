<table class="table">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>E-MAIL</th>
        <th>AÇÕES</th>
    </tr>

    <?php foreach ($lista as $item) : ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->nome ?></td>
            <td><?= $item->email ?></td>
            <td>
                <a class="btn btn-sm btn-primary modal-ajax" href="editar.php?id=<?= $item->id ?>">EDITAR</a>
                <a class="btn btn-sm btn-primary" href="excluir.php?id=<?= $item->id ?>">EXCLUIR</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>