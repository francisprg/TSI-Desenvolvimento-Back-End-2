<?php

namespace CSTSI\Dbe2\models;

use CSTSI\Dbe2\interfaces\iDAO;
use Error;
use Exception;
use Override;

class livroModel extends Model implements iDAO
{

    public function __construct()
    {
        try {
            parent::__construct();
            $this->table = 'livro';
            $this->primaryKey = 'idLivro';
        } catch (Exception $error) {
            throw $error;
        }
    }

      public function read(int | null $id = null): array | bool
    {
        try {
            if (!$id)  $result  = $this->selectAll();
            else  $result  = $this->selectById($id);
            return $result;
        } catch (Exception $error) {
            throw $error;
        }
    }


    public function create(object $livro): bool
    {
        try {
            $this->setValues($livro);
            if (!$this->insert())
                throw new Exception("Erro ao inserir em $this->table!!");
            return true;
        } catch (\Exception $error) {
            error_log("ERRO: " . print_r($error->getMessage(), TRUE));
            $this->prepStmt ?? $this->dumpQuery($this->prepStmt);
            var_dump($error);
            var_dump($this->prepStmt);
            return false;
        } finally {
            $this->dumpQuery($this->prepStmt);
        }
    }

    public function delete(int $id): bool
    {
        try {
            $this->values[":id"] = $id;
            if (!$this->destroy())
                throw new Exception(("Erro ao remover em $this->table!"));
            return true;
        } catch (\Exception $error) {
            echo "<pre>";
            error_log("ERRO: " . print_r($error->getMessage(), TRUE));
            $this->prepStmt ?? $this->dumpQuery($this->prepStmt);
            var_dump($error);
            var_dump($this->prepStmt);
            return false;
        } finally {
            $this->dumpQuery($this->prepStmt);
        }
    }

    public function update(object $livro): bool
    {
        try {
            $this->setValues($livro);
            $this->values[":id"] = $livro->id_livro;
            if (!$this->updates())
                throw new Exception("Erro ao atualizar em $this->table!!");
            return true;
        } catch (\Exception $error) {
            echo "<pre>";
            error_log("ERRO: " . print_r($error->getMessage(), TRUE));
            $this->prepStmt ?? $this->dumpQuery($this->prepStmt);
            var_dump($error);
            var_dump($this->prepStmt);
            return false;
        } finally {
            $this->dumpQuery($this->prepStmt);
        }
    }

    protected function setColumns(): array
    {
        return $this->columns = [
            'titulo',
            'autor',
            'isbn',
            'editora',
            'ano_publicacao',
            'sinopse',
            'numero_paginas'
        ];
    }
}
