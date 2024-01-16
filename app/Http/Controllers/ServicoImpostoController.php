<?php

namespace App\Http\Controllers;

use App\Models\ServicoImposto;
use App\Models\Servico;
use App\Models\ServicoCategoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicoImpostoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $impostos = ServicoImposto::with(['servico', 'categoria'])->get();
        $servicos = Servico::all();
        $categorias = ServicoCategoria::all();
        return view('pages.app.financeiro.impostos.servico_imposto', ['impostos' => $impostos, 'servicos' => $servicos, 'categorias' => $categorias]);

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

        
        $produtos = Servico::where('categoria_id', $request->categoria_id)->get();
        // Criar um imposto para cada produto
        foreach ($produtos as $produto) {
            $impostoProduto = ServicoImposto::create([
                'nome' => $request->nome,
                'aliquota' => $request->aliquota,
                'servico_id' => $produto->id,
                'categoria_id' => $request->categoria_id,
                // Adicione outros campos conforme necessário
            ]);
        }

        return back()->with('success', 'Imposto adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServicoImposto $servicoImposto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServicoImposto $servicoImposto)
    {
        $Servico = Servico::all();
        return view('pages.app.financeiro.impostos.edit', ['imposto' => $servicoImposto, 'Servico' => $Servico]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServicoImposto $servico_imposto)
    {
        $servico_imposto->update($request->all());
        return back()->with('success', 'Serviço atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicoImposto $servico_imposto)
    {
        $servico_imposto->delete();
        return back()->with('success', 'Imposto deletado com sucesso!');
    }
}
