<?php

class Auth {

    public static function check() {

        if (!isset($_SESSION['auth'])) {
            self::logout();
        }

        $auth = $_SESSION['auth'];

        // Expirou?
        if ($auth['expires_at'] < time()) {
            self::logout();
        }

        // IP mudou? (opcional, mas recomendado)
        if ($auth['ip'] !== $_SERVER['REMOTE_ADDR']) {
            self::logout();
        }

        // User-Agent mudou?
        if ($auth['ua'] !== $_SERVER['HTTP_USER_AGENT']) {
            self::logout();
        }

        // Sliding expiration (renova tempo)
        $_SESSION['auth']['expires_at'] = time() + (10 * 60);
    }

    public static function id() {
        return $_SESSION['auth']['user_id'] ?? null;
    }

    public static function logout() {
        session_unset();
        session_destroy();
        Flight::redirect('/login');
        exit;
    }
}
