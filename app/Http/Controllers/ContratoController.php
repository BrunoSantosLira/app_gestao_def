<?php

namespace App\Http\Controllers;

use App\Models\Saidas;
use App\Models\Contrato;
use App\Models\Servico;
use App\Models\ContratoProdutos;
use App\Models\ContratoServicos;
use App\Models\Clientes;
use App\Models\Produtos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Parcelas;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::with('cliente')->get();
        return view('pages.app.servicos.contratos.contrato', ["contratos" => $contratos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Clientes::all();
        return view('pages.app.servicos.contratos.contratocreate', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3',
            'responsável' => 'required|min:3',
            'data_inicio' => 'required',
            'data_fim' => 'required',
            'metodo_de_pagemento'  => 'required',
            'quantidade_parcelas'  => 'required',
            'corpo'  => 'required',
            
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute precisa ter ao menos 3 caracteres'
        ];
  
        $request->validate($regras, $feedback);
        Contrato::create($request->all());
        
        return back()->with('success', 'Contrato adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrato $contrato)
    {
        $contrato = Contrato::with('cliente')->where('id', '=', $contrato->id )->get();

        return view('pages.app.servicos.contratos.contrato_show', ["contrato" => $contrato]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
        $produtosTabela = Produtos::all();
        $servicosTabela = Servico::all();
        $clientes = Clientes::all();
        $produtos = ContratoProdutos::with('produto')->where('contrato_id', '=', $contrato->id)->get();
        $servicos = ContratoServicos::with('servico')->where('contrato_id', '=', $contrato->id)->get();
        $somaProdutosContrato = ContratoProdutos::where('contrato_id', $contrato->id)->sum('valorTotal');
        $somaServicosContrato = ContratoServicos::where('contrato_id', $contrato->id)->sum('valorTotal');

        return view('pages.app.servicos.contratos.contrato_edit', ["contrato" => $contrato, 'clientes' => $clientes, 'produtosTabela' => $produtosTabela, 'produtos' => $produtos, 'somaProdutosContrato' => $somaProdutosContrato, 'servicosTabela' => $servicosTabela, 'servicos' => $servicos, 'somaServicosContrato' => $somaServicosContrato]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrato $contrato)
    {
        $regras = [
            'nome' => 'required|min:3',
            'responsável' => 'required|min:3',
            'data_inicio' => 'required',
            'data_fim' => 'required',
            'metodo_de_pagemento'  => 'required',
            'quantidade_parcelas'  => 'required',
            'corpo'  => 'required',
            
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute precisa ter ao menos 3 caracteres'
        ];
  
        $request->validate($regras, $feedback);

        $contrato->update($request->all());
        return back()->with('success', 'Contrato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrato $contrato)
    {
        $contrato->delete();
        return back()->with('success', 'Contrato Removido com sucesso!');
    }


    public function exportar(Request $request){
        $contrato = Contrato::with('cliente')->where('id', '=', $request->contrato )->get();

        $pdf = Pdf::loadView('pages.app.servicos.contratos.contratoPDF2', ['contrato' => $contrato]);
   
        return $pdf->download('contrato.pdf');
    }

    public function update_corpo(Request $request, $id)
        {
            // Obtém o modelo com base no ID
            $registro = Contrato::find($id);

            // Atualiza apenas o campo desejado
            $registro->update([
                'corpo' => $request->corpo,
            ]);

            return back()->with('success', 'Contrato atualizado com sucesso!');
        }
        
    public function aprovar(Contrato $contrato){
        // Obtém o modelo com base no ID
        $produtosDoContrato = $contrato->contrato_produtos;
        

        // Atualiza apenas o campo desejado
        $contrato->update([
            'status' => 1
        ]);

                // Atualiza a quantidade em estoque de cada produto
        foreach ($produtosDoContrato as $produto) {
            // Supondo que haja um campo 'quantidade_em_estoque' no modelo de Produto
            //alterando o estoque(adicionando de volta ao estoque)
            $produtoEstoque = Produtos::find($produto->produto_id);

            $saida = [
                'produto_id' => $produto->produto_id,
                'tipo' => 'SAIDA POR APROVAÇAO DE CONTRATO N:'. $contrato->id,
                'quantidade' => $produto->quantidade
            ];


            $produtoEstoque['estoqueAtual'] -= $produto->quantidade;
            $produtoEstoque->save();
            Saidas::create($saida);
            // Reduz a quantidade em estoque (ajuste conforme necessário)

        }

        // Crie as parcelas com base na quantidade especificada no contrato
        for ($i = 1; $i <= $contrato->quantidade_parcelas; $i++) {
            $valorParcela = 12; // Implemente essa lógica conforme necessário
            $dataVencimento = now()->addMonths($i);

            // Crie a parcela
            $parcela = new Parcelas([
                'valor' => $valorParcela,
                'data_vencimento' => $dataVencimento,
                'status_pagamento' => 'Pendente', // Defina o status inicial conforme necessário
            ]);

            // Associe a parcela ao contrato
            $contrato->parcelas()->save($parcela);
        }
        return back()->with('success', 'Contrato Aprovado com sucesso!');
    }
}
