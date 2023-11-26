<?php

namespace App\Http\Controllers;

use App\Models\osProdutos;
use App\Models\Produtos;
use App\Models\OS;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OsProdutosController extends Controller
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
        return 'oii create';
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

        //alterando o estoque
        $produto = Produtos::find($request->produto_id);
        if($produto['estoqueAtual'] >= $request->quantidade){
            $produto['estoqueAtual'] -= $request->quantidade;
            $produto->save();
        }else{
            return back()->withErrors('Produto com estoque insuficiente')->withInput();
        };

        osProdutos::create($dados);
        $OS = OS::find($dados['os_id']);
        $OS->valorTotal += $dados['valorTotal'];
        $OS->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(osProdutos $osProdutos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(osProdutos $osProdutos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, osProdutos $osProdutos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    /*
    public function destroy($osprodutos)
    {
    // Busca o modelo pelo ID
    $registro = osProdutos::find($osprodutos);

    // Verifica se o registro foi encontrado
    if ($registro) {
        // Chama o método delete() na instância do modelo
        $result = $registro->delete();
        $OS = OS::find($osprodutos);

        dd($OS);
        }
        return back();
    }*/


    public function deletar(Request $request)
    {
        // Busca o modelo pelo ID
        $registro = osProdutos::find($request->produto_id);


        

        // Verifica se o registro foi encontrado
        if ($registro) {
            // Chama o método delete() na instância do modelo
            $result = $registro->delete(); //deleta o registro
            $OS = OS::find($request->os_id);
            $produto = $registro->getAttributes();

            
            //alterando o estoque(adicionando de volta ao estoque)
            $produtoEstoque = Produtos::find($registro['produto_id']);
            $produtoEstoque['estoqueAtual'] += $registro->quantidade;
            $produtoEstoque->save();

         
            $OS->valorTotal -= $produto['valorTotal']; //excluir o valor dele na coluna total da OS
            $OS->save();
            return back();

            dd($OS);
        }
            return back();

    }


}
