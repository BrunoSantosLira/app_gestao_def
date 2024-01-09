<?php

namespace App\Http\Controllers;

use App\Models\OSParcelas;
use App\Models\OS;

use App\Models\ContaEntradas;
use App\Models\Conta;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OSParcelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OS $os)
    {
        // Obtém todas as parcelas relacionadas ao contrato
        $parcelas = $os->parcelas()->get();
      
        // Exibe as parcelas
        return view('pages.app.cadastro.os.parcelas.index', ['parcelas' => $parcelas]);
    }

    public function aprovar(OSParcelas $parcela){
 
            //FINANCEIRO
            // 1 => CONTA  PRINCIPAL
            $conta = Conta::find(1);
            $conta['capital'] += $parcela->valor;
            $conta->save();

            $ContaEntradas = new ContaEntradas([
                'conta_id' => 1,
                'tipo' => 'entrada',
                'capital' => $parcela->valor,
                'detalhes' => 'APROVAÇÃO DE PARCELA N:' . $parcela->id . ' DA OS N:' . $parcela->os_id
                // Atribua outros valores conforme necessário
            ]);
            $ContaEntradas->save();
            //FIM FINANCEIRO

        // Atualiza apenas o campo desejado
        $parcela->update([
            'status_pagamento' => 'Pago'
        ]);

        return back();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OSParcelas $oSParcelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OSParcelas $oSParcelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OSParcelas $oSParcelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OSParcelas $oSParcelas)
    {
        //
    }
}
