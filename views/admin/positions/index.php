<div class="page-actions">
    <a href="/promessometro/admin/positions/new" class="btn-primary">Adicionar cargo</a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($positions as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['position']) ?></td>
            <td><?= htmlspecialchars($c['party']) ?></td>
            <td><?= htmlspecialchars($c['state']) ?></td>
            <td>
                <span class="badge <?= $c['active'] ? 'active' : 'inactive' ?>">
                    <?= $c['active'] ? 'Active' : 'Inactive' ?>
                </span>
            </td>
            <td class="table-actions">
                <a href="/admin/candidates/edit/<?= $c['id'] ?>" class="edit">Edit</a>
                <a href="/admin/candidates/delete/<?= $c['id'] ?>"
                   class="delete"
                   onclick="return confirm('Disable this candidate?')">
                   Disable
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
