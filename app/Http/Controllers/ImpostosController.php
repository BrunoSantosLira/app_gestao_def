<?php

namespace App\Http\Controllers;

use App\Models\Impostos;
use App\Models\Produtos;
use App\Models\Categorias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImpostosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $impostos = Impostos::with('produto')->get();
        $produtos = Produtos::all();
        $categorias = Categorias::all();
        return view('pages.app.financeiro.impostos.impostos', ['impostos' => $impostos, 'produtos' => $produtos, 'categorias' => $categorias]);

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
            'nome' => 'required|max:255',
            'aliquota' => 'required'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',

        ];
  
        $request->validate($regras, $feedback);

        $produtos = Produtos::where('categoria_id', $request->categoria_id)->get();
       
            // Criar um imposto para cada produto
            foreach ($produtos as $produto) {
                $impostoProduto = Impostos::create([
                    'nome' => $request->nome,
                    'aliquota' => $request->aliquota,
                    'produto_id' => $produto->id,
                    'categoria_id' => $request->categoria_id,
                    // Adicione outros campos conforme necessário
                ]);
            }
        return back()->with('success', 'Imposto adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Impostos $impostos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Impostos $imposto)
    {
        $produtos = Produtos::all();
        return view('pages.app.financeiro.impostos.imposto_edit', ['imposto' => $imposto, 'produtos' => $produtos]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Impostos $imposto)
    {
        $imposto->update($request->all());
        return back()->with('success', 'Serviço atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Impostos $imposto)
    {
        $imposto->delete();
        return back()->with('success', 'Imposto deletado com sucesso!');
    }
}
