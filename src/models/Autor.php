<?php

namespace CSTSI\Dbe2\models;

class Autor
{
    private ?int $idautor;
    private string $nome;
    private ?string $bio;

    public function __construct(
        string $nome,
        ?string $bio = null,
        ?int $idautor = null
    ) {
        $this->nome = $nome;
        $this->bio = $bio;
        $this->idautor = $idautor;
    }

    public function getIdAutor(): ?int
    {
        return $this->idautor;
    }

    public function setIdAutor(?int $idautor): void
    {
        $this->idautor = $idautor;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): void
    {
        $this->bio = $bio;
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