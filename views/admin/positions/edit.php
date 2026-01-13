<div class="page-actions">
    <a href="/promessometro/admin/positions" class="btn-primary">← Voltar para os cargos</a>
</div>

<form action="/promessometro/admin/positions/edit/<?=$position['id']?>" method="POST" class="admin-form">

    <div class="form-group">
        <label for="name">Nome do cargo</label>
        <input type="text" name="name" id="name" value="<?=$position['name']?>" required>
    </div>

    <div class="form-group checkbox">
        <label>
            <input type="checkbox" name="status" value="1" <?= ($position['status'] == '1') ? 'checked' : '' ?>>
            Ativo
        </label>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Adicionar cargo</button>
    </div>
</form>
