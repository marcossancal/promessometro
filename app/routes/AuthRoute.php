<?php

Flight::route('GET /login', ['AuthController', 'loginForm']);
Flight::route('POST /login', ['AuthController', 'login']);
Flight::route('/logout', ['AuthController', 'logout']);
