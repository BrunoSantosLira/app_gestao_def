<?php

namespace App\Http\Controllers;

use App\Models\osServico;
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
  
        $dados = $request->all();
        $dados['valorTotal'] = $request->preco * $request->quantidade;


        osServico::create($dados);
        $OS = OS::find($dados['os_id']);
        $OS->valorTotal += $dados['valorTotal'];
        $OS->save();
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
