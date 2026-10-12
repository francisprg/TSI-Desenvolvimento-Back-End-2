CREATE TABLE public.livros (
    id BIGSERIAL PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(150) NOT NULL,
    isbn VARCHAR(20) NULL,
    editora VARCHAR(100) NULL,
    ano_publicacao INTEGER NULL,
    sinopse TEXT NULL,
    numero_paginas INTEGER NULL,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE NULL,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE NULL,
    CONSTRAINT livros_isbn_unique UNIQUE (isbn)
);

CREATE TABLE public.autores (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE NULL,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE NULL
);

CREATE TABLE public.resenhas (
    id BIGSERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    datapublicacao DATE NOT NULL DEFAULT CURRENT_DATE,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE NULL,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE NULL
);