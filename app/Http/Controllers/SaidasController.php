<?php

namespace App\Http\Controllers;

use App\Models\Saidas;
use App\Models\Produtos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saidas = Saidas::with('produto')->paginate(5);
        $produtos = Produtos::all();
        
        return view('pages.app.estoque.saida', ['produtos' => $produtos, 'saidas' => $saidas]);
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

        //Reduzindo o estoque
        $produto = Produtos::find($request->produto_id);

        if($produto['estoqueAtual'] > 0 && $produto['estoqueAtual'] >= $request->quantidade){
            Saidas::create($request->all());
            $produto['estoqueAtual'] -= $request->quantidade;
            $produto->save();
            return back()->with('success', 'O estoque do produto foi reduzido com sucesso');
        }

        return back()->with('erro', 'O estoque do produto já está zerado ou a quantidade de retirada foi maior do que a disponível');

    }

    /**
     * Display the specified resource.
     */
    public function show(Saidas $saidas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saidas $saidas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saidas $saidas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saidas $saidas)
    {
        //
    }
}
