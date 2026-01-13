<div class="page-actions">
    <a href="/promessometro/admin/states" class="btn-primary">← Voltar para os estados</a>
</div>

<form action="/promessometro/admin/states/edit/<?=$states['id']?>" method="POST" class="admin-form">
    <div class="form-group">
        <label for="name">Estado</label>
        <input type="text" name="name" id="name" value="<?=$states['name'];?>" required>
    </div>
        <div class="form-group">
        <label for="name">UF</label>
        <input type="text" name="code" id="code" value="<?=$states['code'];?>" required>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Editar partido</button>
    </div>
</form>
