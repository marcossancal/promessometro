<?php
class PromisesController {

    public static function index() {
        Auth::check();
        $promises = (new Promises())->all();

        // captura o conteúdo da view
        $content = Flight::view()->fetch('admin/promises/index', [
        'promises' => $promises
        ]);

        // renderiza dentro do layout admin
        Flight::render('layouts/admin', [
        'title' => 'Promessas',
        'content' => $content
        ]);
    }
public static function createForm() {
    Auth::check();

    $candidates = (new Candidates())->all();

    // captura o conteúdo da view
    $content = Flight::view()->fetch('admin/promises/create', [
        'candidates' => $candidates
    ]);

    // renderiza dentro do layout admin
    Flight::render('layouts/admin', [
        'title'   => 'Nova promessa',
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
        (new Promises())->create($data);
        Flight::redirect('/admin/promises');
        }

        public static function editForm($id) {
        $candidate = (new Promises())->find($id);
        if (!$candidate) Flight::notFound();

        $db = Flight::db();
        $states = $db->query("SELECT id, name FROM states ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $positions = $db->query("SELECT id, name FROM positions ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

        Flight::render('admin/promises/edit', [
        'candidate' => $candidate,
        'states' => $states,
        'positions' => $positions
        ]);
    }
}