<div class="page-actions">
    <a href="/promessometro/admin/parties/new" class="btn-primary">Adicionar partido</a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Partido</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($parties as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['id']) ?></td>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['status']) ?></td>
            <td class="table-actions">
                <a href="/promessometro/admin/parties/edit/<?= $c['id'] ?>" class="edit">Editar</a>
                <a href="/promessometro/admin/parties/delete/<?= $c['id'] ?>"
                   class="delete"
                   onclick="return confirm('Deletar esse partido?')">
                   Deletar
                </a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
