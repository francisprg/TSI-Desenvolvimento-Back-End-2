<?php

namespace Database\Seeders;

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
            'q' => 'subject:philosophy AND language:por',
            'lang' => 'pt',
            'limit' => 10,
            'fields' => 'title,author_name,isbn,publisher,first_publish_year,number_of_pages_median,first_sentence,cover_i'
        ]);
        $response->throw();

        $livros = $response->json('docs');

        foreach ($livros as $livro) {

            $isbn = $livro['isbn'][0] ?? null;

            $dados = [
                'titulo' => mb_substr($livro['title'], 0, 150),
                'autor' => mb_substr($livro['author_name'][0] ?? 'Desconhecido', 0, 150),
                'editora' => isset($livro['publisher'][0])
                    ? mb_substr($livro['publisher'][0], 0, 100)
                    : null,
                'ano_publicacao' => $livro['first_publish_year'] ?? null,
                'numero_paginas' => $livro['number_of_pages_median'] ?? null,
                'sinopse' => $livro['first_sentence'][0] ?? null,
                'capa' => isset($livro['cover_i'])
                    ? "https://covers.openlibrary.org/b/id/{$livro['cover_i']}-L.jpg"
                    : null,
                'isbn' => $isbn,
            ];

            if ($isbn) {
                Livro::updateOrCreate(
                    ['isbn' => $isbn],
                    $dados
                );
            } else {
                Livro::updateOrCreate(
                    [
                        'titulo' => $dados['titulo'],
                        'autor' => $dados['autor'],
                    ],
                    $dados
                );
            }
        }
    }
}
