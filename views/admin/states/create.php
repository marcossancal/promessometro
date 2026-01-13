<div class="page-actions">
    <a href="/promessometro/admin/states" class="btn-primary">← Voltar para os estados</a>
</div>

<form action="/admin/states/store" method="POST" class="admin-form">

    <div class="form-group">
        <label for="name">Estado</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div class="form-group">
        <label for="code">UF</label>
        <input type="text" name="code" id="code" maxlength="2" required>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Adicionar estado</button>
    </div>
</form>
