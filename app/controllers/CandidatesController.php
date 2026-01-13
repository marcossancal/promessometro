<?php
class CandidatesController {

    public static function index() {
        Auth::check();
        $candidates = (new Candidates())->all();

        // captura o conteúdo da view
        $content = Flight::view()->fetch('admin/candidates/index', [
        'candidates' => $candidates
        ]);

        // renderiza dentro do layout admin
        Flight::render('layouts/admin', [
        'title' => 'Candidatos',
        'content' => $content
        ]);
    }
    public static function createForm() {
    Auth::check();

    $states    = (new States())->all();
    $positions = (new Positions())->all();
    $parties   = (new Parties())->all();

    // captura o conteúdo da view
    $content = Flight::view()->fetch('admin/candidates/create', [
        'states'    => $states,
        'positions' => $positions,
        'parties'   => $parties
    ]);

    // renderiza dentro do layout admin
    Flight::render('layouts/admin', [
        'title'   => 'Novo candidato',
        'content' => $content
    ]);
}



    public static function store() {
        $data = [
        'name' => $_POST['name'],
        'party' => $_POST['party'] ?? null,
        'state_id' => $_POST['state_id'],
        'position_id' => $_POST['position_id'],
        'active' => isset($_POST['active']) ? 1 : 0
        ];
        (new Candidates())->create($data);
        Flight::redirect('/admin/candidates');
        }

        public static function editForm($id) {
        $candidate = (new Candidates())->find($id);
        if (!$candidate) Flight::notFound();

        $db = Flight::db();
        $states = $db->query("SELECT id, name FROM states ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $positions = $db->query("SELECT id, name FROM positions ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

        Flight::render('admin/candidates/edit', [
        'candidate' => $candidate,
        'states' => $states,
        'positions' => $positions
        ]);
    }
}