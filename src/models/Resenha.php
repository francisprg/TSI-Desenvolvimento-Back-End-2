<?php

namespace CSTSI\Dbe2\models;

class Resenha
{
    private ?int $idresenha;
    private string $texto;
    private ?string $datapublicacao;

    public function __construct(
        string $texto,
        ?string $datapublicacao = null,
        ?int $idresenha = null
    ) {
        $this->texto = $texto;
        $this->datapublicacao = $datapublicacao;
        $this->idresenha = $idresenha;
    }

    public function getIdResenha(): ?int
    {
        return $this->idresenha;
    }

    public function setIdResenha(?int $idresenha): void
    {
        $this->idresenha = $idresenha;
    }

    public function getTexto(): string
    {
        return $this->texto;
    }

    public function setTexto(string $texto): void
    {
        $this->texto = $texto;
    }

    public function getDataPublicacao(): ?string
    {
        return $this->datapublicacao;
    }

    public function setDataPublicacao(?string $datapublicacao): void
    {
        $this->datapublicacao = $datapublicacao;
    }

    public function __get(string $name)
    {
        return $this->$name;
    }

    public function __set(string $name, mixed $value)
    {
        $this->$name = $value;
    }
}