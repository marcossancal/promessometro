<?php

Flight::route('/admin/parties', ['PartiesController', 'index']);
Flight::route('GET /admin/parties/new', ['PartiesController', 'createForm']);
Flight::route('POST /admin/parties/new', ['PartiesController', 'store']);
Flight::route('GET /admin/parties/edit/@id', ['PartiesController', 'editForm']);
Flight::route('POST /admin/parties/edit/@id', ['PartiesController', 'update']);
Flight::route('GET /admin/parties/delete/@id', ['PartiesController', 'delete']);