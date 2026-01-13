<?php
class StatesController {

    protected static function model()
    {
        return new States();
    }

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
        'code' => $_POST['code'] ?? null,
        ];
        (new States())->create($data);
        Flight::redirect('/admin/states');
        }

        public static function editForm($id)
    {
        Auth::check();
        $states = self::model()->find($id);
        if (!$states) {
            Flight::notFound();
        }
        $content = Flight::view()->fetch('admin/states/edit', [
            'states' => $states
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
            'code' => trim($_POST['code'] ?? '')
        ];
        if ($data['name'] === '') {
            Flight::redirect("/admin/states/edit/$id");
            return;
        }
        self::model()->update($id, $data);
        Flight::redirect('/admin/states');
    }

       public static function delete($id)
    {
        Auth::check();
        self::model()->delete($id);
        Flight::redirect('/admin/states');
    }

}