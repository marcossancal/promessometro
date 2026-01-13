<?php

Flight::route('GET /', ['HomeController', 'home']);
Flight::route('GET /sobre', ['HomeController', 'sobre']);
Flight::route('GET /cadastro', ['HomeController', 'cadastro']);
Flight::route('GET /politica', ['HomeController', 'politica']);
