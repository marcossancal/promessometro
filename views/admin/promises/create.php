<div class="page-actions">
    <a href="/promessometro/admin/promises" class="btn-primary">← VOltar para as promessas</a>
</div>

<form action="/admin/promises/store" method="POST" class="admin-form">

    <div class="form-group">
        <label for="candidate_id">Candidato</label>
        <select name="candidate_id" id="candidate_id" required>
            <?php foreach ($candidates as $candidate): ?>
                <option value="<?= $candidate['id'] ?>">
                    <?= htmlspecialchars($candidate['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Título da promessa</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea name="description" id="description" rows="5"></textarea>
    </div>

    <div class="form-group">
        <label for="source">Fonte (URL or referência)</label>
        <input type="text" name="source" id="source">
    </div>

    <div class="form-group">
        <label for="status">Status da promessa</label>
        <select name="status" id="status">
            <option value="pending">Pendente</option>
            <option value="in_progress">Em progresso</option>
            <option value="fulfilled">Cumprida</option>
            <option value="delayed">Atrasado</option>
            <option value="not_fulfilled">Não cumprida</option>
        </select>
    </div>

    <div class="form-group checkbox">
        <label>
            <input type="checkbox" name="approved" value="1">
            Aprovada
        </label>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Adicionar promessa</button>
    </div>

</form>
