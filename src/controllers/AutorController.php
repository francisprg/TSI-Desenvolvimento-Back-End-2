<?php

namespace CSTSI\Dbe2\controllers;

use CSTSI\Dbe2\models\AutorModel;
use CSTSI\Dbe2\models\Autor;
use Exception;

class AutorController extends Controller
{

    public function __construct()
    {
        try {
            parent::__construct();
            $this->model = new AutorModel();
        } catch (Exception $error) {
            throw $error;
        }
    }

    public function index()
    {
        $autores = $this->model->read();
        $this->view->load('autores/index', ['autores' => $autores]);
    }

    public function show(int $id)
    {
        try {
            $autor = $this->model->read($id);
            $this->view->load('autores/show', ['autor' => $autor]);
        } catch (Exception $error) {
            echo "Autor de id $id não encontrado";
        }
    }

    public function create()
    {
        $this->view->load('autores/create');
    }

    public function store()
    {
        $autor = new Autor(
            $_POST['nome'],
            $_POST['bio'] ?? null
        );

        if ($this->model->create($autor))
            header('Location:/autores');
        else
            echo "Erro ao criar autor!!!";
    }

    public function edit(int $id)
    {
        try {
            $autor = $this->model->read($id);
            $this->view->load('autores/edit', ['autor' => $autor]);
        } catch (Exception $error) {
            echo "Autor de id $id não encontrado";
        }
    }

    public function update(int $id)
    {
        $autor = new Autor(
            $_POST['nome'],
            $_POST['bio'] ?? null,
            $id
        );

        if ($this->model->update($autor))
            header('Location:/autores');
        else
            echo "Erro ao atualizar autor!!!";
    }

    public function delete(int $id)
    {
        try {
            $autor = $this->model->read($id);
            $this->view->load('autores/delete', ['autor' => $autor]);
        } catch (Exception $error) {
            echo "Autor de id $id não encontrado";
        }
    }

    public function remove()
    {
        $id = (int) $_POST['idautor'];
        if ($this->model->delete($id))
            header('Location:/autores');
        else
            echo "Erro ao remover autor!!!";
    }
}