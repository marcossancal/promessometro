<?php

class HomeController {

    public static function home() {
        Flight::render('home/index');
    }

    public static function sobre() {
        Flight::render('home/sobre');
    }

    public static function cadastro() {
        Flight::render('home/cadastro');
    }
    public static function politica() {
        Flight::render('home/politica');
    }
}
