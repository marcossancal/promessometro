<div class="page-actions">
    <a href="/promessometro/admin/candidates" class="btn-primary">← Voltar para os candidatos</a>
</div>

<form action="/promessometro/admin/candidates/new" method="POST" class="admin-form">

    <div class="form-group">
        <label for="name">Nome do candidato</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div class="form-group">
        <label for="party_id">Partido</label>
        <select name="party_id" id="party_id">
            <option value="">— None —</option>
            <?php foreach ($parties as $party): ?>
                <option value="<?= $party['id'] ?>">
                    <?= htmlspecialchars($party['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="position_id">Cargo</label>
        <select name="position_id" id="position_id" required>
            <?php foreach ($positions as $position): ?>
                <option value="<?= $position['id'] ?>">
                    <?= htmlspecialchars($position['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="state_id">Estado</label>
        <select name="state_id" id="state_id" required>
            <?php foreach ($states as $state): ?>
                <option value="<?= $state['id'] ?>">
                    <?= htmlspecialchars($state['name']) ?> (<?= $state['code'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group checkbox">
        <label>
            <input type="checkbox" name="active" value="1" checked>
            Ativo
        </label>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Adicionar candidato</button>
    </div>

</form>
