<?php
class PositionController {

    public static function index() {
        Auth::check();
        $positions = (new Positions())->all();

        // captura o conteúdo da view
        $content = Flight::view()->fetch('admin/positions/index', [
        'positions' => $positions
        ]);

        // renderiza dentro do layout admin
        Flight::render('layouts/admin', [
        'title' => 'Cargos',
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
        $content = Flight::view()->fetch('admin/positions/create', [
        'states'    => $states,
        'positions' => $positions
        ]);

        // renderiza dentro do layout admin
        Flight::render('layouts/admin', [
        'title'   => 'Novo cargo',
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
        (new Positions())->create($data);
        Flight::redirect('/admin/positions');
        }

        public static function editForm($id) {
        $candidate = (new Positions())->find($id);
        if (!$candidate) Flight::notFound();

        $db = Flight::db();
        $states = $db->query("SELECT id, name FROM states ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $positions = $db->query("SELECT id, name FROM positions ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

        Flight::render('admin/positions/edit', [
        'candidate' => $candidate,
        'states' => $states,
        'positions' => $positions
        ]);
    }
}