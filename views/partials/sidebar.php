<?php
$menu = require BASE_PATH . '/app/config/admin_menu.php';
$current = Flight::request()->url;
?>

<aside class="sidebar">
    <h2>Promessômetro</h2>

    <nav>
        <?php foreach ($menu as $item): 
            $active = str_starts_with($current, $item['route']);
        ?>
            <a href="/promessometro<?= $item['route'] ?>"
               class="<?= $active ? 'active' : '' ?>">
                <span><?= $item['icon'] ?></span>
                <?= $item['label'] ?>
            </a>
        <?php endforeach; ?>
    </nav>
</aside>
