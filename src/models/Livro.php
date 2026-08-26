<?php

namespace CSTSI\Dbe2\models;

class Livro
{
    private ?int $id_livro;
    private string $titulo;
    private string $autor;
    private ?string $isbn;
    private ?string $editora;
    private ?int $ano_publicacao;
    private ?string $sinopse;
    private ?int $numero_paginas;

    public function __construct(
        string $titulo,
        string $autor,
        ?string $isbn = null,
        ?string $editora = null,
        ?int $ano_publicacao = null,
        ?string $sinopse = null,
        ?int $numero_paginas = null,
        ?int $id_livro = null
    ) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->isbn = $isbn;
        $this->editora = $editora;
        $this->ano_publicacao = $ano_publicacao;
        $this->sinopse = $sinopse;
        $this->numero_paginas = $numero_paginas;
        $this->id_livro = $id_livro;
    }

    public function getIdLivro(): ?int
    {
        return $this->id_livro;
    }

    public function setIdLivro(?int $id_livro): void
    {
        $this->id_livro = $id_livro;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): void
    {
        $this->autor = $autor;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getEditora(): ?string
    {
        return $this->editora;
    }

    public function setEditora(?string $editora): void
    {
        $this->editora = $editora;
    }

    public function getAnoPublicacao(): ?int
    {
        return $this->ano_publicacao;
    }

    public function setAnoPublicacao(?int $ano_publicacao): void
    {
        $this->ano_publicacao = $ano_publicacao;
    }

    public function getSinopse(): ?string
    {
        return $this->sinopse;
    }

    public function setSinopse(?string $sinopse): void
    {
        $this->sinopse = $sinopse;
    }

    public function getNumeroPaginas(): ?int
    {
        return $this->numero_paginas;
    }

    public function setNumeroPaginas(?int $numero_paginas): void
    {
        $this->numero_paginas = $numero_paginas;
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