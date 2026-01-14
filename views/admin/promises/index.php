<div class="page-actions">
    <a href="/promessometro/admin/promises/new" class="btn-primary">Adicionar promessa</a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Título</th>
            <th>Candidato</th>
            <th>Partido</th>
            <th>Descrição</th>
            <th>Fonte</th>
            <th>Status da promessa</th>
            <th>Aprovada?</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($promises as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['title']) ?></td>
            <td><?= htmlspecialchars($c['candidate_name']) ?></td>
            <td><?= htmlspecialchars($c['party_name']) ?></td>
            <td><?= htmlspecialchars($c['description']) ?></td>
            <td><?= htmlspecialchars($c['source']) ?></td>
            <td><?= htmlspecialchars($c['status']) ?></td>
            <td><?= htmlspecialchars($c['approved']) ?></td>
            <td class="table-actions">
                <a href="/promessometro/admin/promises/edit/<?= $c['id'] ?>" class="edit">Edit</a>
                <a href="/promessometro/admin/promises/delete/<?= $c['id'] ?>"
                   class="delete"
                   onclick="return confirm('Deletar promessa?')">
                   Disable
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
