<?php

namespace App\Http\Controllers;

use App\Models\osServico;
use App\Models\Servico;
use App\Models\OS;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OsServicoController extends Controller
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

        //CALCULANDO O VALOR DOS IMPOSTOS
        $produtoComImpostos = Servico::with('impostos')->find($request['servico_id']); //pega os impostos
        $valorImpostos = 0;

        foreach ($produtoComImpostos->impostos as $key => $imposto) {
            $valorImpostos += ($imposto->aliquota / 100) * $request->preco;
        }
   
        $precoUNI = $valorImpostos + $request->preco;
        $valorImpostos =  $valorImpostos * $request->quantidade;

        $dados = $request->all();
        $dados['valorTotal'] = $request->preco * $request->quantidade;
        $dados['valorTotal'] = $dados['valorTotal'] - $request->desconto; //calculando o desconto em cima do valor  total
        $dados['valorTotal'] += $valorImpostos;


        $OS = OS::find($dados['os_id']);
        $OS->valorTotal += $dados['valorTotal'];
        $OS->save();

        $dados['preco'] = $precoUNI;
        osServico::create($dados);


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(osServico $osServico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(osServico $osServico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, osServico $osServico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(osServico $osServico)
    {
        //
    }

    public function deletar(Request $request)
    {
        $registro = osServico::find($request->servico_id);
        // Verifica se o registro foi encontrado
        if ($registro) {
            // Chama o método delete() na instância do modelo

            $result = $registro->delete(); //deleta o registro
            $OS = OS::find($request->os_id);
            $produto = $registro->getAttributes();
         
            $OS->valorTotal -= $produto['valorTotal']; //excluir o valor dele na coluna total da OS
            $OS->save();
            return back();

            dd($OS);
        }
            return back();
    }
}
