<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

require BASE_PATH . '/vendor/autoload.php';
require BASE_PATH . '/app/config/database.php';
require BASE_PATH . '/app/config/helpers.php';
require BASE_PATH . '/app/helpers/Auth.php'; 
require BASE_PATH . '/models/Models.php';
require BASE_PATH . '/app/controllers/Controllers.php';
require BASE_PATH . '/app/routes/routes.php';

Flight::start();