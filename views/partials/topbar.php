<?php
$userId = Auth::id();
?>

<header class="topbar">
    <h1><?= $title ?? 'Dashboard' ?></h1>

    <div class="user-menu">
        <span class="user-name">
            👤 User #<?= $userId ?>
        </span>

        <div class="dropdown">
            <a href="/promessometro/logout">🚪 Logout</a>
        </div>
    </div>
</header>
