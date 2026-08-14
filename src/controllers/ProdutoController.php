<?php

namespace CSTSI\Dbe2\controllers;

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

    public function edit($id){
        echo "Mostrar o formulário de edição com os dados do produto de ID: $id!!";
    }

    public function update($id){
        echo "Recebe dados e atualiza no banco o produto de ID: $id";
    }

    public function delete($id){
        echo "Mostrar um formulário de remoção com os dados do produto de ID:$id";
    }

    public function remove(){
        echo "Receber a comnfirmação de remoção e remover do banco";
    }
    
}