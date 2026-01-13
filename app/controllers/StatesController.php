<?php
class StatesController {

    public static function index() {
        Auth::check();
        $states = (new States())->all();

        // captura o conteúdo da view
        $content = Flight::view()->fetch('admin/states/index', [
        'states' => $states
        ]);

        // renderiza dentro do layout admin
        Flight::render('layouts/admin', [
        'title' => 'Estados',
        'content' => $content
        ]);
    }
    public static function createForm() {
        Auth::check();

        $db = Flight::db();

        // lista de estados
        $states = $db->query(
        "SELECT id, name FROM states ORDER BY name"
        )->fetchAll(PDO::FETCH_ASSOC);

        // lista de cargos / posições
        $positions = $db->query(
        "SELECT id, name FROM positions ORDER BY name"
        )->fetchAll(PDO::FETCH_ASSOC);

        // captura o conteúdo da view
        $content = Flight::view()->fetch('admin/states/create', [
        'states'    => $states,
        'positions' => $positions
        ]);

        // renderiza dentro do layout admin
        Flight::render('layouts/admin', [
        'title'   => 'Novo estado',
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
        (new States())->create($data);
        Flight::redirect('/admin/states');
        }

        public static function editForm($id) {
        $candidate = (new States())->find($id);
        if (!$candidate) Flight::notFound();

        $db = Flight::db();
        $states = $db->query("SELECT id, name FROM states ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $positions = $db->query("SELECT id, name FROM positions ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

        Flight::render('admin/states/edit', [
        'candidate' => $candidate,
        'states' => $states,
        'positions' => $positions
        ]);
    }
}