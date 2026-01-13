<?php

class AuthController {

    public static function loginForm() {
        Flight::render('auth/login');
    }

    public static function login() {

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            Flight::render('auth/login', [
                'error' => 'Informe email e senha'
            ]);
            return;
        }

        $db = Flight::db();

        $stmt = $db->prepare(
            "SELECT id, password FROM users WHERE email = ? LIMIT 1"
        );
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            Flight::render('auth/login', [
                'error' => 'Email ou senha inválidos'
            ]);
            return;
        }
        // Login OK
session_regenerate_id(true);

$token = bin2hex(random_bytes(32)); // hash forte
$ttl   = 10 * 60; // 10 minutos

$_SESSION['auth'] = [
    'user_id' => $user['id'],
    'token' => $token,
    'expires_at' => time() + $ttl,
    'ip' => $_SERVER['REMOTE_ADDR'],
    'ua' => $_SERVER['HTTP_USER_AGENT']
];

Flight::redirect('/admin/candidates');


        Flight::redirect('./admin/candidates');
    }

    public static function logout() {
        session_destroy();
        Flight::redirect('/login');
    }
}
