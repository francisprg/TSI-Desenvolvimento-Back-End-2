<?php

namespace CSTSI\Dbe2\controllers;

use CSTSI\Dbe2\controllers\Controller;

class ProdutoController extends Controller{

    public function index(){
        echo "<br>Listar Produtos";
    }

    public function show($id){
         echo "<br>Mostrar os dados do produto de id:$id";
    }

    public function create(){
        echo "Mostrar um formulário";
    }

    public function store(){
        echo "Recebe os dados do formulário e guarda no banco";
    }

    public function edit(){
        echo "Mostrar o formulário de edição!!";
    }

    public function update(){
        echo "Recebe dados e atualiza no banco";
    }

    public function delete(){
        echo "Mostrar um formulário de remoção";
    }

    public function remove(){
        echo "Receber a comnfirmação de remoção e remover do banco";
    }
    
}