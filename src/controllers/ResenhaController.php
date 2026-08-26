<?php

namespace CSTSI\Dbe2\controllers;

use CSTSI\Dbe2\models\ResenhaModel;
use CSTSI\Dbe2\models\Resenha;
use Exception;

class ResenhaController extends Controller
{

    public function __construct()
    {
        try {
            parent::__construct();
            $this->model = new ResenhaModel();
        } catch (Exception $error) {
            throw $error;
        }
    }

    public function index()
    {
        $resenhas = $this->model->read();
        $this->view->load('resenhas/index', ['resenhas' => $resenhas]);
    }

    public function show(int $id)
    {
        try {
            $resenha = $this->model->read($id);
            $this->view->load('resenhas/show', ['resenha' => $resenha]);
        } catch (Exception $error) {
            echo "Resenha de id $id não encontrada";
        }
    }

    public function create()
    {
        $this->view->load('resenhas/create');
    }

    public function store()
    {
        $resenha = new Resenha(
            $_POST['texto'],
            $_POST['datapublicacao'] ?? null
        );

        if ($this->model->create($resenha))
            header('Location:/resenhas');
        else
            echo "Erro ao criar resenha!!!";
    }

    public function edit(int $id)
    {
        try {
            $resenha = $this->model->read($id);
            $this->view->load('resenhas/edit', ['resenha' => $resenha]);
        } catch (Exception $error) {
            echo "Resenha de id $id não encontrada";
        }
    }

    public function update(int $id)
    {
        $resenha = new Resenha(
            $_POST['texto'],
            $_POST['datapublicacao'] ?? null,
            $id
        );

        if ($this->model->update($resenha))
            header('Location:/resenhas');
        else
            echo "Erro ao atualizar resenha!!!";
    }

    public function delete(int $id)
    {
        try {
            $resenha = $this->model->read($id);
            $this->view->load('resenhas/delete', ['resenha' => $resenha]);
        } catch (Exception $error) {
            echo "Resenha de id $id não encontrada";
        }
    }

    public function remove()
    {
        $id = (int) $_POST['idresenha'];
        if ($this->model->delete($id))
            header('Location:/resenhas');
        else
            echo "Erro ao remover resenha!!!";
    }
}