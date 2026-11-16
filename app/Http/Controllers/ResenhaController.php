<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResenhaRequest;
use App\Models\Resenha;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ResenhaController extends Controller
{

    public function index()
    {
        $resenhas = Resenha::all();

        return view("Resenha.index", [
            'resenhas' => $resenhas
        ]);
    }

    public function create()
    {
        return view("Resenha.create");
    }

    public function store(StoreResenhaRequest $request)
    {
        try {
            
            auth()->user()->resenhas()->create($request->validated());

            return redirect()->route('livros.index');
        } catch (\Exception $e) {
            return redirect()
                ->route('resenhas.index')
                ->with('error', 'Erro ao criar resenha.');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Resenha $resenha)
    {
        return view("Resenha.show", [
            'resenha' => $resenha
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resenha $resenha)
    {
        return view('Resenha.edit', [
            'resenha' => $resenha
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resenha $resenha)
    {
        $validated = $request->validate([
            'texto' => 'required|string',
            'datapublicacao' => 'nullable|date',
        ]);

        $resenha->update($validated);

        return redirect()->route('resenhas.index');
    }


    public function destroy(Resenha $resenha)
    {
        $resenha->delete();

        return redirect()->route('resenhas.index');
    }
}
