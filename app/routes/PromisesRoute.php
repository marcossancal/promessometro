<?php

Flight::route('/admin/promises', ['PromisesController', 'index']);
Flight::route('GET /admin/promises/new', ['PromisesController', 'createForm']);
Flight::route('POST /admin/promises/new', ['PromisesController', 'store']);
Flight::route('GET /admin/promises/edit/@id', ['PromisesController', 'editForm']);
Flight::route('POST /admin/promises/edit/@id', ['PromisesController', 'update']);
Flight::route('GET /admin/promises/delete/@id', ['PromisesController', 'delete']);