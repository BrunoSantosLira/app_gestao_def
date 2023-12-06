<?php

namespace App\Http\Controllers;

use App\Models\Parcelas;
use App\Models\Contrato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParcelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Contrato $contrato)
    {
    // Obtém todas as parcelas relacionadas ao contrato
    $parcelas = $contrato->parcelas()->get();

    // Exibe as parcelas
    return view('pages.app.servicos.contratos.parcelas.parcelas', ['parcelas' => $parcelas]);
    }

    public function aprovar(Parcelas $parcela){
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
    public function show(Parcelas $parcela)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcelas $parcelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parcelas $parcelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parcelas $parcelas)
    {
        //
    }
}
