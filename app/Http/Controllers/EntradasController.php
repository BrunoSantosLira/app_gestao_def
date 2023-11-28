<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use App\Models\Produtos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entradas = Entradas::with('produto')->paginate(5);
        $produtos = Produtos::all();
        return view('pages.app.estoque.entrada', ['produtos' => $produtos, 'entradas' => $entradas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'quantidade' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
        ];
  
        $request->validate($regras, $feedback);
        Entradas::create($request->all());

        //Adicionando ao estoque de tal produto
        $produto = Produtos::find($request->produto_id);
        $produto['estoqueAtual'] += $request->quantidade;
        $produto->save();


        return back()->with('success', 'Estoque aumentado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entradas $entradas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entradas $entradas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entradas $entradas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entradas $entradas)
    {
        //
    }
}
