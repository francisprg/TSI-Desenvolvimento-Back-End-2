-- ========================================
-- Tabela: livro
-- ========================================
CREATE TABLE IF NOT EXISTS livro (
    idlivro SERIAL PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(150) NOT NULL,
    isbn VARCHAR(20) UNIQUE,
    editora VARCHAR(100),
    ano_publicacao INTEGER,
    sinopse TEXT,
    numero_paginas INTEGER
);

-- ========================================
-- Tabela: resenha
-- ========================================
CREATE TABLE IF NOT EXISTS resenha (
    idresenha SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    datapublicacao DATE DEFAULT CURRENT_DATE
);