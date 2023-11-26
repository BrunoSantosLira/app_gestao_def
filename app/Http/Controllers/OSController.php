<?php

namespace App\Http\Controllers;

use App\Models\OS;
use App\Models\Clientes;
use App\Models\Servico;
use App\Models\Produtos;
use App\Models\osProdutos;
use App\Models\osServico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $os = OS::with('os_produtos')->get();
        $produtos = Produtos::all();
        return view('pages.app.cadastro.os.os',['os' => $os, 'produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicos = Servico::all();
        $produtos = Produtos::all();
        $clientes = Clientes::all();
        return view('pages.app.cadastro.os.oscreate', ['servicos' => $servicos, 'produtos' => $produtos, 'clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3',
            'responsavel' => 'required|min:3',
            'dias_garantia' => 'required',
            'data_inicial' => 'required',
            'data_final' => 'required'
            
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute precisa ter ao menos 3 caracteres'
        ];
  
        $request->validate($regras, $feedback);

        OS::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(OS $o)
    {
        $produtos = osProdutos::with('produto')->where('os_id', '=', $o->id)->get();
        $servicos = osServico::with('servico')->where('os_id', '=', $o->id)->get();
        // Substitua 'osProdutos' pelo nome correto do seu modelo
        $somaProdutosOS = osProdutos::where('os_id', $o->id)->sum('valorTotal');

        $produtosTabela = Produtos::all();
        $servicosTabela = Servico::all();
        $o = Os::with('os_produtos')->where('id', '=', $o->id )->get();
        return view('pages.app.cadastro.os.osshow', ['os' => $o, 'produtos' => $produtos, 'produtosTabela' => $produtosTabela, 'somaProdutosOS' =>  $somaProdutosOS, 'servicos' => $servicos, 'servicosTabela' => $servicosTabela]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OS $o)
    {
        $servicos = Servico::all();
        $produtos = Produtos::all();
        $clientes = Clientes::all();
        return view('pages.app.cadastro.os.osedit', ['os'=> $o, 'servicos' => $servicos, 'produtos' => $produtos, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OS $o)
    {
        $regras = [
            'nome' => 'required|min:3',
            'responsavel' => 'required|min:3',
            'dias_garantia' => 'required',
            'data_inicial' => 'required',
            'data_final' => 'required'
            
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute precisa ter ao menos 3 caracteres'
        ];
        $request->validate($regras, $feedback);


        $o->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OS $o)
    {
        $o->delete();
        return back();
    }
}
