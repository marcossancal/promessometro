<div class="page-actions">
    <a href="/promessometro/admin/candidates/new" class="btn-primary">Adicionar candidato</a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Partido</th>
            <th>Estado</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($candidates as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['position_name']) ?></td>
            <td><?= htmlspecialchars($c['party_name']) ?></td>
            <td><?= htmlspecialchars($c['state_name']) ?></td>
            <td>
                <span class="badge <?= $c['active'] ? 'active' : 'inactive' ?>">
                    <?= $c['active'] ? 'Active' : 'Inactive' ?>
                </span>
            </td>
            <td class="table-actions">
                <a href="/promessometro/admin/candidates/edit/<?= $c['id'] ?>" class="edit">Edit</a>
                <a href="/promessometro/admin/candidates/delete/<?= $c['id'] ?>"
                   class="delete"
                   onclick="return confirm('Disable this candidate?')">
                   Disable
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
