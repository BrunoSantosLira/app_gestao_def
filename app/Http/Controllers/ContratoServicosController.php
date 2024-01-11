<?php

namespace App\Http\Controllers;

use App\Models\ContratoServicos;
use App\Models\Contrato;
use App\Models\Servico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContratoServicosController extends Controller
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

        //CALCULANDO O VALOR DOS IMPOSTOS
        $produtoComImpostos = Servico::with('impostos')->find($request['servico_id']); //pega os impostos
        $valorImpostos = 0;

        foreach ($produtoComImpostos->impostos as $key => $imposto) {
            $valorImpostos += ($imposto->aliquota / 100) * $request->preco;
        }

        $precoUNI = $valorImpostos + $request->preco;
        $valorImpostos =  $valorImpostos * $request->quantidade;    
        //FIM CALCULO

        $dados = $request->all();
        $dados['valorTotal'] = $request->preco * $request->quantidade; //calculando o valor total
        $dados['valorTotal'] += $valorImpostos; //SOMANDO OS IMPOSTOS AO TOTAL

        $Contrato = Contrato::find($dados['contrato_id']);
        $Contrato->valorTotal += $dados['valorTotal'];
        $Contrato->save();

        $dados['preco'] = $precoUNI;
        ContratoServicos::create($dados);

        return back()->with('success', 'Serviço adicionado ao contrato com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContratoServicos $contratoServicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContratoServicos $contratoServicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContratoServicos $contratoServicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContratoServicos $contratoServicos)
    {
        //
    }

    public function deletar(Request $request)
    {
        // Busca o modelo pelo ID
        $registro = ContratoServicos::find($request->servico_id);

        // Verifica se o registro foi encontrado
        if ($registro) {
            // Chama o método delete() na instância do modelo
            $result = $registro->delete(); //deleta o registro
            $contrato = Contrato::find($request->contrato_id);
            $produto = $registro->getAttributes();
            
           
            $contrato->valorTotal -= $produto['valorTotal']; //excluir o valor dele na coluna total da OS
            $contrato->save();
            return back()->with('success', 'Serviço excluido com sucesso!');

            dd($OS);
        }
            return back();

    }
}
