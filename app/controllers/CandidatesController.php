<?php
class CandidatesController {

    protected static function model()
    {
        return new Candidates();
    }
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

    public static function editForm($id) {
    Auth::check();

    $states    = (new States())->all();
    $positions = (new Positions())->all();
    $parties   = (new Parties())->all();
    $candidate = (new Candidates())->find(intval($id));
    // captura o conteúdo da view
    $content = Flight::view()->fetch('admin/candidates/edit', [
        'states'    => $states,
        'positions' => $positions,
        'parties'   => $parties,
        'candidate' => $candidate
    ]);

    // renderiza dentro do layout admin
    Flight::render('layouts/admin', [
        'title'   => 'Editar candidato',
        'content' => $content
    ]);
}



    public static function store() {
        $data = [
        'name' => $_POST['name'],
        'party_id' => $_POST['party_id'],
        'state_id' => $_POST['state_id'],
        'position_id' => $_POST['position_id'],
        'active' => isset($_POST['active']) ? 1 : 0
        ];
        (new Candidates())->create($data);
        Flight::redirect('/admin/candidates');
        }


            public static function update($id)
    {
        Auth::check();
        $data = [
            'name'   => trim($_POST['name'] ?? ''),
            'active' => isset($_POST['active']) ? 1 : 0,
            'position_id' => isset($_POST['position_id']) ? 1 : 0,
            'party_id' => trim($_POST['party_id'])
        ];
        if ($data['name'] === '') {
            Flight::redirect("/admin/candidates/edit/$id");
            return;
        }
        self::model()->update($id, $data);
        Flight::redirect('/admin/candidates');
    }


    public static function delete($id)
    {
        Auth::check();
        self::model()->delete($id);
        Flight::redirect('/admin/candidates');
    }
}