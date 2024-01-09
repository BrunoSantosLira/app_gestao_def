<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ChecklistProdutos;
use App\Models\CamposProduto;
use App\Models\FormaPagamento;
use App\Models\Produtos;
use App\Models\Conta;
use App\Models\Vendas;
use App\Models\Saidas;
use App\Models\ContaEntradas;
use App\Models\CheckParcelas;
use App\Models\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query  = ChecklistProdutos::with('cliente');

        // Verifica se foi fornecida na requisição
        if ($request->filled('nome')) {
            $query->where('nome', 'like', "$request->nome%");
        }

        $checklists = $query->paginate(10);
        $clientes = Clientes::all();
        $formas = FormaPagamento::all();
        return view('pages.app.checklistprodutos.index', ['checklists' => $checklists,'clientes' => $clientes, 'formas' => $formas]);
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
        ChecklistProdutos::create($request->all());
        return back()->with('success', 'Checklist adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ChecklistProdutos $checklistProduto)
    {
        $campos = $checklistProduto->campos_produto;
        $produtos = Produtos::all();
        return view('pages.app.checklistprodutos.show', ['checklist' => $checklistProduto, 'produtos' => $produtos, 'campos' => $campos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChecklistProdutos $checklistProduto)
    {
        $clientes = Clientes::all();
        $formas = FormaPagamento::all();
        return view('pages.app.checklistprodutos.edit', ['checklist' => $checklistProduto, 'clientes' => $clientes, 'formas' => $formas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChecklistProdutos $checklistProduto)
    {
        $checklistProduto->update($request->all());
        return back()->with('success', 'Checklist atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChecklistProdutos $checklistProduto)
    {
        $checklistProduto->delete();
        return back()->with('success', 'Checklist deletada com sucesso!');
    }

    public function exportar(ChecklistProdutos $checklistProduto){

        $valorTotal = $checklistProduto->campos_produto->sum('valorTotal');
        $pdf = Pdf::loadView('exportar.listaprodutos', ['produtos' => $checklistProduto->campos_produto, 'parcelas' => $checklistProduto->parcelas, 'valorTotal' => $valorTotal]);
        return $pdf->download('lista_de_produtos_id'. $checklistProduto->id .'.pdf');
    }

    public function aprovar(ChecklistProdutos $checklist){
        //ESTOQUE
        $produtosChecklist = $checklist->campos_produto;

        // Verifica o estoque antes de processar os produtos
        foreach ($produtosChecklist as $produto) {
            $produtoEstoque = Produtos::find($produto->produto_id);
         
            if ($produtoEstoque['estoqueAtual'] <  $produto->quantidade) {
                return back()->with('error', 'HÁ PRODUTOS COM ESTOQUE INSUFICIENTE NA CHECKLIST');
            }
        }

        // Atualiza a quantidade em estoque e cria as saídas
        foreach ($produtosChecklist as $produto) {
            $produtoEstoque = Produtos::find($produto->produto_id);
            
            $saida = [
                'produto_id' => $produto->produto_id,
                'tipo' => 'SAIDA POR APROVAÇAO DE CHECKLIST N:' . $checklist->id,
                'quantidade' => $produto->quantidade
            ];
    
            $produtoEstoque['estoqueAtual'] -= $produto->quantidade;
            $produtoEstoque->save();
    
            Saidas::create($saida);
        }

        //FIM ESTOQUE

        /*
        //FINANCEIRO
        // 1 => CONTA  PRINCIPAL
        $conta = Conta::find(1);
        $conta['capital'] += $checklist->valorTotal;
        $conta->save();

        $ContaEntradas = new ContaEntradas([
            'conta_id' => 1,
            'tipo' => 'entrada',
            'capital' => $checklist->valorTotal,
            'detalhes' => 'APROVAÇÃO DE CHEKLIST N:' . $checklist->id
            // Atribua outros valores conforme necessário
        ]);
        $ContaEntradas->save();
        */
        // Cria o registro de venda na tabela Vendas
        $venda = new Vendas([
            'os_id' => null,
            'contrato_id' => null,
            'checklist_id' => $checklist->id,
            'valor' => $checklist->valorTotal,
            'tipo' => 'CHECKLIST'
            // Atribua outros valores conforme necessário
        ]);
        $venda->save();
        //FIM FINANCEIRO


       
        $valorTaxa = ($checklist->formaPagamento->taxas['valor'] / 100 ) * $checklist->valorTotal; //CALCULANDO O VALOR DA  TAXA
        
        $valorTotalOS = $checklist->valorTotal + $valorTaxa;
        $quantidadeParcelas = $checklist->formaPagamento['qtd_parcelas'];
    
        if ($valorTotalOS > 0 && $quantidadeParcelas > 0) {
            $valorParcela = $valorTotalOS / $quantidadeParcelas;
        } else {
            // Caso contrário, define um valor padrão (ajuste conforme necessário)
            $valorParcela = 0;
        }
    
        // Criação das parcelas
        for ($i = 1; $i <= $quantidadeParcelas; $i++) {
            $dataVencimento = now()->addMonths($i);
    
            // Crie a parcela com base no valor calculado
            $parcela = new CheckParcelas([
                'valor' => $valorParcela,
                'data_vencimento' => $dataVencimento,
                'status_pagamento' => 'Pendente',
            ]);
    
            // Associe a parcela ao contrato
            $checklist->parcelas()->save($parcela);
        }

        // Atualiza o status para 'aprovada'
        $checklist->update(['status' => 'aprovada']);



        return back()->with('success', 'Checklist aprovada com sucesso!');
    }
}
