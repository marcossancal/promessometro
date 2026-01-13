<div class="page-actions">
    <a href="/promessometro/admin/positions/new" class="btn-primary">Adicionar cargo</a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Cargo</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($positions as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['id']) ?></td>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['status']) ?></td>
            <td class="table-actions">
                <a href="/promessometro/admin/positions/edit/<?= $c['id'] ?>" class="edit">Edit</a>
                <a href="/promessometro/admin/positions/delete/<?= $c['id'] ?>"
                   class="delete"
                   onclick="return confirm('Deletar cargo?')">
                   Disable
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
