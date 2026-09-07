<?php

namespace App\Http\Controllers;

use App\Models\Resenha;
use Carbon\Carbon;
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

    public function store(Request $request)
    {

        $resenha = new Resenha();
        $resenha->texto = $request->input("texto");

    
        $resenha->datapublicacao = $request->input("datapublicacao") ?? Carbon::now()->toDateString();


        $resenha->save();

        return redirect()->route('resenhas.index');
    }

  
    public function show(Resenha $resenha)
    {
        return view("Resenha.show", [
            'resenha' => $resenha
        ]);
    }

 
    public function edit(Resenha $resenha)
    {
        return view('Resenha.edit', [
            'resenha' => $resenha
        ]);
    }

   
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
