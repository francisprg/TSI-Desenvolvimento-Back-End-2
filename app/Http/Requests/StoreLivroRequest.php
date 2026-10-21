<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string|max:150',
            'isbn' => 'nullable|string|max:20|unique:livros,isbn',
            'editora' => 'nullable|string|max:100',
            'ano_publicacao' => 'nullable|integer|min:1000|max:'.date('Y'),
            'sinopse' => 'nullable|string',
            'numero_paginas' => 'nullable|integer|min:1',
        ];
    }
}
