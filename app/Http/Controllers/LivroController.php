<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::all();

        return view('Livro.index', ['livros' => $livros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Livro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $livro = new Livro();
        $livro->titulo = $request->input('titulo');
        $livro->autor = $request->input('autor');
        $livro->isbn = $request->input('isbn');
        $livro->editora = $request->input('editora');
        $livro->ano_publicacao = $request->input('ano_publicacao');
        $livro->sinopse = $request->input('sinopse');
        $livro->numero_paginas = $request->input('numero_paginas');
        $livro->save();

        return redirect()->route('Livro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {
        return view('Livro.show', [
            'livro' => $livro
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        return view('Livro.edit', [
            'livro' => $livro
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livro $livro)
    {

        $validated = $request->validate([
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string|max:150',
            'isbn' => 'nullable|string|max:20|unique:livros,isbn,' . $livro->id,
            'editora' => 'nullable|string|max:100',
            'ano_publicacao' => 'nullable|integer|min:1000|max:' . date('Y'),
            'sinopse' => 'nullable|string',
            'numero_paginas' => 'nullable|integer|min:1',
        ]);

        $livro->update($validated);


        return redirect()->route('livros.index');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();

        return redirect()->route('livros.index');
    }
}
