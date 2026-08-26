<?php

namespace CSTSI\Dbe2\controllers;

use CSTSI\Dbe2\models\livroModel;
use CSTSI\Dbe2\models\livro;
use Exception;
use Override;

class LivroController extends Controller
{

    public function __construct()
    {
        try {
            parent::__construct();
            $this->model = new livroModel();
        } catch (Exception $error) {
            throw $error;
        }
    }


    public function index()
    {
        $livros = $this->model->read();

        $this->view->load('livros/index', ['livros' => $livros]);
    }


    public function show(int $id)
    {
        try {
            $this->view->load('livros/show', ['livro' => $this->model->read($id)]);
        } catch (Exception $error) {
            echo "Produto de id $id não encontrado";
        }
    }

    public function create()
    {
        $this->view->load('livros/create');
    }

    public function store()
    {
        $livro = new Livro(
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['isbn'] ?? null,
            $_POST['editora'] ?? null,
            !empty($_POST['anoPublicacao']) ? (int)$_POST['anoPublicacao'] : null,
            $_POST['sinopse'] ?? null,
            !empty($_POST['numeroPaginas']) ? (int)$_POST['numeroPaginas'] : null
        );

        $this->model->create($livro);
    }

    public function edit(int $id)
    {
        try {
            $livro = $this->model->read($id);
            $this->view->load('livros/edit', ['livro' => $livro]);
        } catch (Exception $error) {
            echo "Livro de id $id não encontrado";
        }
    }

   public function update(int $id)
{
    $livro = new Livro(
        $_POST['titulo'],
        $_POST['autor'],
        $_POST['isbn'] ?? null,
        $_POST['editora'] ?? null,
        !empty($_POST['ano_publicacao']) ? (int)$_POST['ano_publicacao'] : null,
        $_POST['sinopse'] ?? null,
        !empty($_POST['numero_paginas']) ? (int)$_POST['numero_paginas'] : null,
        $id
    );

    if ($this->model->update($livro))
        header('Location:/livros');
    else
        echo "Erro ao atualizar livro!!!";
    }

    public function delete($id)
    {
        $this->view->load('livros/delete', ['livro' => $this->model->read($id)]);
    }

    public function remove()
    {
        $id = (int) $_POST['idlivro'];
        if ($this->model->delete($id))
            header('Location:/livros');
        else
            echo "Erro ao remover livro!!!";
    }
}
