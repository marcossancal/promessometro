<?php

Flight::route('/admin/states', ['StatesController', 'index']);
Flight::route('GET /admin/states/new', ['StatesController', 'createForm']);
Flight::route('POST /admin/states/new', ['StatesController', 'store']);
Flight::route('GET /admin/states/edit/@id', ['StatesController', 'editForm']);
Flight::route('POST /admin/states/edit/@id', ['StatesController', 'update']);
Flight::route('GET /admin/states/delete/@id', ['StatesController', 'delete']);