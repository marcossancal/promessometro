<?php

Flight::route('/admin/positions', ['PositionController', 'index']);
Flight::route('GET /admin/positions/new', ['PositionController', 'createForm']);
Flight::route('POST /admin/positions/new', ['PositionController', 'store']);
Flight::route('GET /admin/positions/edit/@id', ['PositionController', 'editForm']);
Flight::route('POST /admin/positions/edit/@id', ['PositionController', 'update']);
Flight::route('GET /admin/positions/delete/@id', ['PositionController', 'delete']);