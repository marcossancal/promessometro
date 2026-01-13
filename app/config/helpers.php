<?php

Flight::set('flight.views.path', BASE_PATH . '/views');
Flight::before('route', function () {
    $public = [
        '/',
        '/sobre',
        '/cadastro',
        '/politica',
        '/login',
        '/test-session'
    ];

    $url = Flight::request()->url;
    // Se rota for pública, deixa passar
    if (in_array($url, $public)) {
        return;
    }
    // Sessão não existe
    if (!isset($_SESSION['auth'])) {
        Flight::redirect('/login');
        exit;
    }
    // Sessão existe, valida
    $auth = $_SESSION['auth'];
    // Expirou?
    if ($auth['expires_at'] < time()) {
        session_unset();
        session_destroy();
        Flight::redirect('/login');
        exit;
    }
    // Sliding expiration (renova)
    $_SESSION['auth']['expires_at'] = time() + (10 * 60);
});


Flight::before('start', function () {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (str_starts_with($uri, '/admin')) {
        if (!isset($_SESSION['user_id'])) {
            Flight::redirect('/login');
            exit;
        }
    }
});
