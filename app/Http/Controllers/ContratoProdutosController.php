<?php

namespace App\Http\Controllers;

use App\Models\ContratoProdutos;
use App\Models\Contrato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContratoProdutosController extends Controller
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
        $regras = [
            'preco' => 'required',
            'quantidade' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
        ];
  
        $request->validate($regras, $feedback);
        $dados = $request->all();
        $dados['valorTotal'] = $request->preco * $request->quantidade; //calculando o valor total

        ContratoProdutos::create($dados);
        $Contrato = Contrato::find($dados['contrato_id']);
        $Contrato->valorTotal += $dados['valorTotal'];
        $Contrato->save();
        return back()->with('success', 'Produto adicionado ao contrato com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContratoProdutos $contratoProdutos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContratoProdutos $contratoProdutos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContratoProdutos $contratoProdutos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContratoProdutos $contratoProdutos)
    {
        //
    }

    public function deletar(Request $request)
    {
        // Busca o modelo pelo ID
        $registro = ContratoProdutos::find($request->produto_id);

        // Verifica se o registro foi encontrado
        if ($registro) {
            // Chama o método delete() na instância do modelo
            $result = $registro->delete(); //deleta o registro
            $contrato = Contrato::find($request->contrato_id);
            $produto = $registro->getAttributes();

           
            $contrato->valorTotal -= $produto['valorTotal']; //excluir o valor dele na coluna total da OS
            $contrato->save();
            return back();

            dd($OS);
        }
            return back();

    }
}
