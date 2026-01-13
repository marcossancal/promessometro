<?php
class PositionController {

        protected static function model()
    {
        return new Positions();
    }


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
        'status' => isset($_POST['status']) ? 1 : 0
        ];
        (new States())->create($data);
        Flight::redirect('/admin/positions');
        }

        public static function editForm($id)
    {
        Auth::check();
        $position = self::model()->find($id);
        if (!$position) {
            Flight::notFound();
        }
        $content = Flight::view()->fetch('admin/positions/edit', [
            'position' => $position
        ]);
        Flight::render('layouts/admin', [
            'title'   => 'Editar cargo',
            'content' => $content
        ]);
    }

    public static function update($id)
    {
        Auth::check();
        $data = [
            'name'   => trim($_POST['name'] ?? ''),
            'status' => isset($_POST['status']) ? 1 : 0
        ];
        if ($data['name'] === '') {
            Flight::redirect("/admin/positions/edit/$id");
            return;
        }
        self::model()->update($id, $data);
        Flight::redirect('/admin/positions');
    }

       public static function delete($id)
    {
        Auth::check();
        self::model()->delete($id);
        Flight::redirect('/admin/positions');
    }
}