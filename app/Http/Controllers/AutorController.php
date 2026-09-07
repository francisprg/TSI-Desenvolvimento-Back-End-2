<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::all();

        return view('Autor.index', ['autores' => $autores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Autor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $autor = new Autor();
        $autor->nome = $request->input('nome');

        $autor->save();

        return redirect()->route('autores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        return view('Autor.show', ['autor' => $autor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autor $autor)
    {
        return view('Autor.edit', ['autor' => $autor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autor $autor)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $autor->update($validated);

        return redirect()->route('autores.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();

        return redirect()->route('autores.index');
    }
}
