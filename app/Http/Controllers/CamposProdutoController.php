<?php

namespace App\Http\Controllers;

use App\Models\CamposProduto;
use App\Models\Produtos;
use App\Models\ChecklistProdutos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CamposProdutoController extends Controller
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
        $checklist = ChecklistProdutos::find($request->checklist_id);
        $produto = Produtos::find($request->produto_id);

        $dados = $request->all();

        //CALCULANDO O VALOR DOS IMPOSTOS
        $produtoComImpostos = Produtos::with('impostos')->find($request['produto_id']); //pega os impostos
        $valorImpostos = 0;
       
        
        foreach ($produtoComImpostos->impostos as $key => $imposto) {
            $valorImpostos += ($imposto->aliquota / 100) * $request->preco;
        }
        $precoUNI = $valorImpostos + $request->preco;
        $valorImpostos =  $valorImpostos * $request->quantidade;

        $dados['valorTotal'] = $request->preco * $request->quantidade; //calculando o VALOR TOTAL
        $dados['valorTotal'] = $dados['valorTotal'] - $request->desconto; //calculando o DESCONTO
        $dados['valorTotal'] += $valorImpostos; //SOMANDO OS IMPOSTOS AO TOTAL
        
        $checklist['valorTotal'] +=  $dados['valorTotal'];
        $checklist->save();

        $dados['preco'] = $precoUNI;
        CamposProduto::create($dados);
        return back()->with('success', 'Campo adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CamposProduto $camposProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CamposProduto $camposProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CamposProduto $camposProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CamposProduto $camposProduto)
    {
        $checklist = ChecklistProdutos::find($camposProduto->checklist_id);
        $produto = Produtos::find($camposProduto->produto_id);
        $checklist['valorTotal'] -= $produto->valorVenda;
        $checklist->save();

        $camposProduto->delete();
        return back()->with('success', 'Produto deletado com sucesso!');
    }
}
