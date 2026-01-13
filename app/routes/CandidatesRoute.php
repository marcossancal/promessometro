<?php

Flight::route('/admin/candidates', ['CandidatesController', 'index']);
Flight::route('GET /admin/candidates/new', ['CandidatesController', 'createForm']);
Flight::route('POST /admin/candidates/new', ['CandidatesController', 'store']);
Flight::route('GET /admin/candidates/edit/@id', ['CandidatesController', 'editForm']);
Flight::route('POST /admin/candidates/edit/@id', ['CandidatesController', 'update']);
Flight::route('GET /admin/candidates/delete/@id', ['CandidatesController', 'delete']);