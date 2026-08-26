CREATE TABLE livro (
    idLivro SERIAL PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    isbn VARCHAR(20) UNIQUE,
    editora VARCHAR(255),
    ano_publicacao INTEGER,
    sinopse TEXT,
    numero_paginas INTEGER,
);