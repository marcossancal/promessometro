<?php

class PartiesController
{
    protected static function model()
    {
        return new Parties();
    }

    public static function index()
    {
        Auth::check();
        $parties = self::model()->all();
        $content = Flight::view()->fetch('admin/parties/index', [
            'parties' => $parties
        ]);
        Flight::render('layouts/admin', [
            'title'   => 'Partidos',
            'content' => $content
        ]);
    }

    public static function createForm()
    {
        Auth::check();
        $content = Flight::view()->fetch('admin/parties/create');
        Flight::render('layouts/admin', [
            'title'   => 'Novo partido',
            'content' => $content
        ]);
    }

    public static function store()
    {
        Auth::check();
        $data = [
            'name'   => trim($_POST['name'] ?? ''),
            'status' => isset($_POST['status']) ? 1 : 0
        ];
        if ($data['name'] === '') {
            Flight::redirect('/promessometro/admin/parties/create');
            return;
        }

        self::model()->create($data);
        Flight::redirect('/admin/parties/');
    }

    public static function editForm($id)
    {
        Auth::check();
        $party = self::model()->find($id);
        if (!$party) {
            Flight::notFound();
        }
        $content = Flight::view()->fetch('admin/parties/edit', [
            'party' => $party
        ]);
        Flight::render('layouts/admin', [
            'title'   => 'Editar partido',
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
            Flight::redirect("/admin/parties/edit/$id");
            return;
        }
        self::model()->update($id, $data);
        Flight::redirect('/admin/parties');
    }

    public static function delete($id)
    {
        Auth::check();
        self::model()->delete($id);
        Flight::redirect('/admin/parties');
    }
}
