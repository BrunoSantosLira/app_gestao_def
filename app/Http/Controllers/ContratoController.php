<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrato $contrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrato $contrato)
    {
        //
    }
}
