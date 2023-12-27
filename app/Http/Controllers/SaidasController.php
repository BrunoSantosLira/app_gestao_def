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
    public function index(Request $request)
    {
        $produtos = Produtos::all();

        $query  = Saidas::query();

        // Verifica se tipo foi fornecido na requisição
        if ($request->filled('produto_id')) {
            $query->where('produto_id', '=', $request->produto_id);
        }
    
        // Verifica se a data foi fornecida na requisição
        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        $saidas = $query->paginate(12);

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
