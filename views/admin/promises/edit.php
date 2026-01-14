<div class="page-actions">
    <a href="/promessometro/admin/promises" class="btn-primary">
        ← Voltar para as promessas
    </a>
</div>

<form action="/promessometro/admin/promises/edit/<?= $promise['id'] ?>"
      method="POST"
      class="admin-form">

    <!-- CANDIDATO -->
    <div class="form-group">
        <label for="candidate_id">Candidato</label>
        <select name="candidate_id" id="candidate_id" required>
            <?php foreach ($candidates as $candidate): ?>
                <option value="<?= $candidate['id'] ?>"
                    <?= $candidate['id'] == $promise['candidate_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($candidate['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- TÍTULO -->
    <div class="form-group">
        <label for="title">Título da promessa</label>
        <input type="text"
               name="title"
               id="title"
               value="<?= htmlspecialchars($promise['title']) ?>"
               required>
    </div>

    <!-- DESCRIÇÃO -->
    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea name="description"
                  id="description"
                  rows="5"
                  required><?= htmlspecialchars($promise['description']) ?></textarea>
    </div>

    <!-- FONTE -->
    <div class="form-group">
        <label for="source">Fonte (URL ou referência)</label>
        <input type="text"
               name="source"
               id="source"
               value="<?= htmlspecialchars($promise['source']) ?>">
    </div>

    <!-- STATUS -->
    <div class="form-group">
        <label for="status">Status da promessa</label>
        <select name="status" id="status">
            <option value="pending"
                <?= $promise['status'] === 'pending' ? 'selected' : '' ?>>
                Pendente
            </option>

            <option value="in_progress"
                <?= $promise['status'] === 'in_progress' ? 'selected' : '' ?>>
                Em progresso
            </option>

            <option value="fulfilled"
                <?= $promise['status'] === 'fulfilled' ? 'selected' : '' ?>>
                Cumprida
            </option>

            <option value="delayed"
                <?= $promise['status'] === 'delayed' ? 'selected' : '' ?>>
                Atrasada
            </option>

            <option value="not_fulfilled"
                <?= $promise['status'] === 'not_fulfilled' ? 'selected' : '' ?>>
                Não cumprida
            </option>
        </select>
    </div>

    <!-- APROVADA -->
    <div class="form-group checkbox">
        <label>
            <input type="checkbox"
                   name="approved"
                   value="1"
                   <?= !empty($promise['approved']) ? 'checked' : '' ?>>
            Aprovada
        </label>
    </div>

    <!-- AÇÕES -->
    <div class="form-actions">
        <button type="submit" class="btn-primary">
            Salvar alterações
        </button>
    </div>

</form>
