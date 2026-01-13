<?php

Flight::register('db', 'PDO', [
    'mysql:host=localhost;dbname=promessometro;charset=utf8',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
]);
