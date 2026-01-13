<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin' ?> · Promessômetro</title>
    <link rel="shortcut icon" href="/promessometro/public/assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/promessometro/public/assets/css/admin.css">
</head>
<body>

<div class="admin-wrapper">

    <?php Flight::render('partials/sidebar'); ?>

    <main class="main-content">
        <?php Flight::render('partials/topbar', ['title' => $title ?? '']); ?>

        <section class="content">
            <?= $content ?>
        </section>
    </main>

</div>

</body>
</html>