<?php

namespace App\Http\Controllers;

use App\Models\CheckParcelas;
use App\Models\ChecklistProdutos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ContaEntradas;
use App\Models\Conta;

class CheckParcelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChecklistProdutos $checklist)
    {
        $parcelas = $checklist->parcelas()->get();
        // Exibe as parcelas
        return view('pages.app.checklistprodutos.parcelas.index', ['parcelas' => $parcelas]);
    }

    public function aprovar(CheckParcelas $parcela){
        //FINANCEIRO
        // 1 => CONTA  PRINCIPAL
        $conta = Conta::find(1);
        $conta['capital'] += $parcela->valor;
        $conta->save();

        $ContaEntradas = new ContaEntradas([
            'conta_id' => 1,
            'tipo' => 'entrada',
            'capital' => $parcela->valor,
            'detalhes' => 'APROVAÇÃO DE PARCELA N:' . $parcela->id . ' DA CHECKLIST N:' . $parcela->checklist_id
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
    public function show(CheckParcelas $checkParcelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CheckParcelas $checkParcelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CheckParcelas $checkParcelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CheckParcelas $checkParcelas)
    {
        //
    }
}
