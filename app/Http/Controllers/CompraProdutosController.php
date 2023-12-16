<?php

namespace App\Http\Controllers;

use App\Models\CompraProdutos;
use App\Models\Compras;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompraProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $dados = $request->all();
        $dados['valorTotal'] = $request->preco * $request->quantidade; //calculando o valor total

        CompraProdutos::create($dados);
        $Compra = Compras::find($dados['compra_id']);
        $Compra->valorTotal += $dados['valorTotal'];
        $Compra->save();
        return back()->with('success', 'Produto adicionado na compra com sucesso!');

    }

    
    public function deletar(Request $request)
    {
        // Busca o modelo pelo ID
        $registro = CompraProdutos::find($request->produto_id);

        // Verifica se o registro foi encontrado
        if ($registro) {
            // Chama o método delete() na instância do modelo
            $result = $registro->delete(); //deleta o registro
            $compra = Compras::find($request->compra_id);
            $produto = $registro->getAttributes();

           
            $compra->valorTotal -= $produto['valorTotal']; //excluir o valor dele na coluna total da OS
            $compra->save();
            return back();
        }
            return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(CompraProdutos $compraProdutos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompraProdutos $compraProdutos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompraProdutos $compraProdutos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompraProdutos $compraProdutos)
    {
        //
    }
}
