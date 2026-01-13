<div class="page-actions">
    <a href="/promessometro/admin/states/new" class="btn-primary">Adicionar estado</a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Estado</th>
            <th>UF</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($states as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['id']) ?></td>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['code']) ?></td>
            <td class="table-actions">
                <a href="/promessometro/admin/states/edit/<?= $c['id'] ?>" class="edit">Edit</a>
                <a href="/promessometro/admin/states/delete/<?= $c['id'] ?>"
                   class="delete"
                   onclick="return confirm('Deletar o estado?')">
                   Disable
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
