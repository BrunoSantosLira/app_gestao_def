<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\Categorias;
use App\Models\Unidades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos =  Produtos::with('categoria')->with('unidade')->get();
        return view('pages.app.cadastro.produtos', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categorias::all();
        $unidades =  Unidades::all();
        return view('pages.app.cadastro.produtoAdicao', ['categorias' => $categorias,'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'produto' => 'required|max:255',
            'preco' => 'required',
            'estoqueAtual' => 'required'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
        ];
  
        $request->validate($regras, $feedback);


        Produtos::create($request->all());
        return back();

    }


    /**
     * Display the specified resource.
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produtos $produtos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produtos $produtos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produtos $produtos)
    {
        
    }
}
