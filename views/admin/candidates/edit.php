<div class="page-actions">
    <a href="/promessometro/admin/candidates" class="btn-primary">← Voltar para os candidatos</a>
</div>

<form action="/promessometro/admin/candidates/edit/<?=$candidate['id']?>" method="POST" class="admin-form">

    <div class="form-group">
        <label for="name">Nome do candidato</label>
        <input type="text" name="name" id="name" value="<?=$candidate['name']?>" required>
    </div>
<div class="form-group">
    <label for="party_id">Partido</label>
    <select name="party_id" id="party_id" required>
        <?php foreach ($parties as $party): ?>
            <option 
                value="<?= $party['id'] ?>"
                <?= ($party['id'] == $candidate['party_id']) ? 'selected' : '' ?>
            >
                <?= htmlspecialchars($party['name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="position_id">Cargo</label>
    <select name="position_id" id="position_id" required>
        <?php foreach ($positions as $position): ?>
            <option 
                value="<?= $position['id'] ?>"
                <?= ($position['id'] == $candidate['position_id']) ? 'selected' : '' ?>
            >
                <?= htmlspecialchars($position['name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


<div class="form-group">
    <label for="state_id">Estado</label>
    <select name="state_id" id="state_id" required>
        <?php foreach ($states as $state): ?>
            <option 
                value="<?= $state['id'] ?>"
                <?= (isset($candidate['state_id']) && $state['id'] == $candidate['state_id']) ? 'selected' : '' ?>
            >
                <?= htmlspecialchars($state['name'], ENT_QUOTES, 'UTF-8') ?>
                (<?= htmlspecialchars($state['code'], ENT_QUOTES, 'UTF-8') ?>)
            </option>
        <?php endforeach; ?>
    </select>
</div>

    <div class="form-group checkbox">
        <label>
            <input type="checkbox" name="active" value="1" <?= ($candidate['active'] == '1') ? 'checked' : '' ?>>
            Ativo
        </label>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Adicionar candidato</button>
    </div>

</form>
