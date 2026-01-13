<div class="page-actions">
    <a href="/promessometro/admin/parties" class="btn-primary">← Voltar para os partidos</a>
</div>

<form action="/promessometro/admin/parties/edit" method="POST" class="admin-form">

    <div class="form-group">
        <label for="name">Nome do partido</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div class="form-group checkbox">
        <label>
            <input type="checkbox" name="status" value="1" checked>
            Ativo
        </label>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Adicionar partido</button>
    </div>
</form>
