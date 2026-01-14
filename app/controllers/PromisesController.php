<?php
class PromisesController {
    protected static function model()
    {
        return new Promises();
    }


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
        'candidate_id' => $_POST['candidate_id'],
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'source' => $_POST['source'],
        'status' => $_POST['status'],
        'approved' => $_POST['approved']
        ];
        (new Promises())->create($data);
        Flight::redirect('/admin/promises');
        }

 public static function editForm($id)
{
    Auth::check();

    // busca a promessa pelo ID
    $promise = (new Promises())->find($id);

    if (!$promise) {
        Flight::redirect('/admin/promises');
        return;
    }

    // lista de candidatos
    $candidates = (new Candidates())->all();

    // captura o conteúdo da view
    $content = Flight::view()->fetch('admin/promises/edit', [
        'promise'    => $promise,
        'candidates' => $candidates
    ]);

    // renderiza dentro do layout admin
    Flight::render('layouts/admin', [
        'title'   => 'Editar promessa',
        'content' => $content
    ]);
}

public static function update($id)
{
    Auth::check();

    $data = [
        'candidate_id' => (int) ($_POST['candidate_id'] ?? 0),
        'title'        => trim($_POST['title'] ?? ''),
        'description'  => trim($_POST['description'] ?? ''),
        'source'       => trim($_POST['source'] ?? ''),
        'status'       => trim($_POST['status'] ?? 'pending'),
        'approved'     => isset($_POST['approved']) ? 1 : 0
    ];

    // validações básicas
    if ($data['candidate_id'] === 0 || $data['title'] === '') {
        Flight::redirect("/admin/promises/edit/$id");
        return;
    }

    self::model()->update($id, $data);

    Flight::redirect('/admin/promises');
}


        public static function delete($id)
    {
        Auth::check();
        self::model()->delete($id);
        Flight::redirect('/admin/promises');
    }
}