<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class LivroSeeder extends Seeder
{
    public function run(): void
    {
        $response = Http::get('https://openlibrary.org/search.json', [
            'q' => 'subject:philosophy',
            'limit' => 20,
            'fields' => 'title,author_name,author_key,isbn,publisher,first_publish_year,number_of_pages_median,first_sentence,cover_i'
        ]);

        $response->throw();

        $livros = $response->json('docs', []);

        foreach ($livros as $livro) {

            $nomeAutor = $livro['author_name'][0] ?? 'Desconhecido';
            $chaveAutor = $livro['author_key'][0] ?? null;

            // Busca a biografia do autor
            $bio = null;

            if ($chaveAutor) {
                $responseAutor = Http::get(
                    "https://openlibrary.org/authors/{$chaveAutor}.json"
                );

                if ($responseAutor->successful()) {
                    $dadosAutor = $responseAutor->json();

                    $bio = $dadosAutor['bio'] ?? null;

                    if (is_array($bio)) {
                        $bio = $bio['value'] ?? null;
                    }
                }
            }

            // Cria ou encontra o autor
            $autor = Autor::firstOrCreate(
                ['nome' => $nomeAutor],
                ['bio' => $bio]
            );

            // Atualiza a biografia caso o autor já exista e ela esteja vazia
            if (!$autor->bio && $bio) {
                $autor->update(['bio' => $bio]);
            }

            $isbn = $livro['isbn'][0] ?? null;

            $dadosLivro = [
                'titulo' => mb_substr($livro['title'] ?? 'Sem título', 0, 150),
                'autor_id' => $autor->id,
                'isbn' => $isbn,
                'editora' => isset($livro['publisher'][0])
                    ? mb_substr($livro['publisher'][0], 0, 100)
                    : null,
                'ano_publicacao' => $livro['first_publish_year'] ?? null,
                'numero_paginas' => $livro['number_of_pages_median'] ?? null,
                'sinopse' => $livro['first_sentence'][0] ?? null,
                'capa' => isset($livro['cover_i'])
                    ? "https://covers.openlibrary.org/b/id/{$livro['cover_i']}-L.jpg"
                    : null,
            ];

            // Cadastra ou atualiza o livro
            if ($isbn) {
                Livro::updateOrCreate(
                    ['isbn' => $isbn],
                    $dadosLivro
                );
            } else {
                Livro::updateOrCreate(
                    [
                        'titulo' => $dadosLivro['titulo'],
                        'autor_id' => $autor->id,
                    ],
                    $dadosLivro
                );
            }
        }
    }
}