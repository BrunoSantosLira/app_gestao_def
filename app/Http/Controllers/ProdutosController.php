<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\Categorias;
use App\Models\Unidades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos =  Produtos::with('categoria')->with('unidade')->get();
        return view('pages.app.cadastro.produtos.produtos', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categorias::all();
        $unidades =  Unidades::all();
        return view('pages.app.cadastro.produtos.produtoAdicao', ['categorias' => $categorias,'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'produto' => 'required|max:255',
            'preco' => 'required',
            'estoqueAtual' => 'required',
            'codigo_de_barras' => 'required|unique:produtos,codigo_de_barras',
            'valorCompra' => 'required',
            'valorVenda' => 'required',
            'NCM' => 'required|min:10',
            'codDistribuidor' => 'required',
            'codPessoal' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'codigo_de_barras.unique' => 'Esse código de barras já foi registrado!',
            'NCM.min' => 'O código precisa ter 8 dígitos',
        ];
  
        $request->validate($regras, $feedback);
        $dados = $request->all();

        $ultimoID = Produtos::latest()->value('id') + 1;
        $dados['unique_id'] = now()->format('Ymd') . '/' . $ultimoID ;

        Produtos::create($dados);
        return back()->with('success', 'Produto adicionado com sucesso!');

    }


    /**
     * Display the specified resource.
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produtos $produto)
    {
        $categorias = Categorias::all();
        $unidades =  Unidades::all();
        $dadosMonetarios = [
            'MargemLucro' => (($produto['valorVenda'] - $produto['valorCompra']) / $produto['valorCompra'] ) * 100,
            'Variação Percentual:' => ($produto['valorVenda'] - $produto['valorCompra']) / $produto['valorCompra'],
            'lucro/prejuico bruto' => $produto['valorVenda']- $produto['valorCompra'],
            'Rentabilidade' =>  (($produto['valorVenda']- $produto['valorCompra']) / $produto['valorVenda']) * 100
        ];

        return view('pages.app.cadastro.produtos.produtoedit', ['categorias' => $categorias,'unidades' => $unidades, 'produto' => $produto, 'dadosMonetarios' => $dadosMonetarios]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produtos $produto)
    {
        $regras = [
            'produto' => 'required|max:255',
            'preco' => 'required',
            'estoqueAtual' => 'required',
            'codigo_de_barras' => 'required',
            'valorCompra' => 'required',
            'valorVenda' => 'required',
            'NCM' => 'required|min:10',
            'codDistribuidor' => 'required',
            'codPessoal' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'NCM.min' => 'O código precisa ter 8 dígitos',

        ];
  
        $request->validate($regras, $feedback);
        $produto->update($request->all());
        return back()->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produtos $produto)
    {   
        $produto->delete();
        return back()->with('success', 'Produto deletado com sucesso!');
    }
}
