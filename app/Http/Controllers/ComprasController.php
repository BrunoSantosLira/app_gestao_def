<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\CompraProdutos;
use App\Models\Fornecedores;
use App\Models\Produtos;

use App\Models\ContaEntradas;
use App\Models\Conta;

use App\Models\Entradas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Inicializa a consulta de compras
        $query = Compras::with('fornecedor');
    
        // Verifica se fornecedor_id foi fornecido na requisição
        if ($request->filled('fornecedor_id')) {
            $query->where('fornecedor_id', $request->fornecedor_id);
        }
    
        // Verifica se a data foi fornecida na requisição
        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        // Verifica se o status foi fornecida na requisição
        if ($request->filled('status')) {
            $query->where('status', '=', $request->status);
        }
    
        // Obtém os resultados paginados
        $compras = $query->paginate(5);
    
        // Obtém a lista de fornecedores para exibir no formulário
        $fornecedores = Fornecedores::all();
    
        return view('pages.app.financeiro.vendas_compras.compras', ['compras' => $compras, 'fornecedores' => $fornecedores]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedores::all();
        return view('pages.app.financeiro.vendas_compras.adicionar_compra', ['fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3',
            'detalhes' => 'required|min:3',
            'metodo_de_pagemento' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute precisa ter ao menos 3 caracteres'
        ];
  
        $request->validate($regras, $feedback);

        Compras::create($request->all());
        return back()->with('success', 'Ordem de compra adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Compras $compra)
    {
        $produtosTabela = Produtos::all();
        $produtos = CompraProdutos::with('produto')->where('compra_id', '=', $compra->id)->get();
        $somaProdutos = CompraProdutos::where('compra_id', $compra->id)->sum('valorTotal');
        $fornecedores = Fornecedores::all();
        return view('pages.app.financeiro.vendas_compras.compras_view', ['compra' => $compra, 'fornecedores' => $fornecedores, 'produtosTabela' => $produtosTabela, 'produtos' => $produtos, 'somaProdutos' => $somaProdutos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compras $compra)
    {
        $produtosTabela = Produtos::all();
        $produtos = CompraProdutos::with('produto')->where('compra_id', '=', $compra->id)->get();
        $somaProdutos = CompraProdutos::where('compra_id', $compra->id)->sum('valorTotal');
        $fornecedores = Fornecedores::all();
        return view('pages.app.financeiro.vendas_compras.compras_edit', ['compra' => $compra, 'fornecedores' => $fornecedores, 'produtosTabela' => $produtosTabela, 'produtos' => $produtos, 'somaProdutos' => $somaProdutos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compras $compra)
    {
        $regras = [
            'nome' => 'required|min:3',
            'detalhes' => 'required|min:3',
            'metodo_de_pagemento' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute precisa ter ao menos 3 caracteres'
        ];
  
        $request->validate($regras, $feedback);

        $compra->update($request->all());
        return back()->with('success', 'Compra atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compras $compra)
    {
        $compra->delete();
        return back()->with('success', 'Compra deletada com sucesso!');
    }

    public function aprovar(Compras $compra){
        $conta = Conta::find(1);

        //Só aprova caso o valor da ordem  de compra seja menor que o valor disponivel na conta
        if($conta['capital'] >= $compra->valorTotal){
                $produtosDoContrato = $compra->compra_produtos;

            // Atualiza a quantidade em estoque e cria as entradas
            
            foreach ($produtosDoContrato as $produto) {
                $produtoEstoque = Produtos::find($produto->produto_id);
        
                $entrada = [
                    'produto_id' => $produto->produto_id,
                    'tipo' => 'ENTRADA POR APROVAÇAO DE COMPRA N:' . $compra->id,
                    'quantidade' => $produto->quantidade
                ];
        
                $produtoEstoque['estoqueAtual'] += $produto->quantidade;
                $produtoEstoque->save();
        
                Entradas::create($entrada);
            }

            //FINANCEIRO
            // 1 => CONTA  PRINCIPAL
            $conta = Conta::find(1);
            $conta['capital'] -= $compra->valorTotal;
            $conta->save();

            $ContaEntradas = new ContaEntradas([
                'conta_id' => 1,
                'tipo' => 'saida',
                'capital' => $compra->valorTotal,
                'detalhes' => 'APROVAÇÃO DE ORDEM DE COMPRA N:' . $compra->id
                // Atribua outros valores conforme necessário
            ]);
            $ContaEntradas->save();

            // Atualiza o status da ordem de compra apenas 
            $compra->update(['status' => 1]);
            return back()->with('success', 'Ordem de compra Aprovada com sucesso!');
        }else{
            return back()->with('erro', 'VALOR INSUFICIENTE NA CONTA');
        }
        
    }
}
