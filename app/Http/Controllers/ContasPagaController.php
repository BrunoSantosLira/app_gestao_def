<?php

namespace App\Http\Controllers;

use App\Models\ContasPaga;

//FINANCEIRO
use App\Models\ContaEntradas;
use App\Models\Conta;
use App\Http\Controllers\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContasPagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contas = ContasPaga::all();
       
        return view('pages.app.contas_a_pagar.index', ['contas' => $contas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('pages.app.contas_a_pagar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3',
            'status_pagamento' => 'required',
            'data_vencimento' => 'required',
            'valor' => 'required',
            'metodo_pagamento'  => 'required',
            'observacoes'  => 'required',
            
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute precisa ter ao menos 3 caracteres'
        ];
  
        $request->validate($regras, $feedback);

        ContasPaga::create($request->all());
        return back()->with('success', 'Conta adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContasPaga $ContasPaga)
    {
        
        return view('pages.app.contas_a_pagar.show', ['conta' => $ContasPaga]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContasPaga $ContasPaga)
    {
        return view('pages.app.contas_a_pagar.edit', ['conta' => $ContasPaga]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContasPaga $ContasPaga)
    {

        $ContasPaga->update($request->all());
        return back()->with('success', 'Compra atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContasPaga $ContasPaga)
    {
       
        $ContasPaga->delete();
        return back()->with('success', 'Conta Removido com sucesso!');
    }

    public function aprovar(ContasPaga $conta){
        //FINANCEIRO
        // 1 => CONTA  PRINCIPAL
        $contaFinanceira = Conta::find(1);

        if($contaFinanceira['capital'] >= $conta->valor){
            $contaFinanceira['capital'] -= $conta->valor;
            $contaFinanceira->save();

            $ContaEntradas = new ContaEntradas([
                'conta_id' => 1,
                'tipo' => 'saida',
                'capital' => $conta->valor,
                'detalhes' => 'APROVAÇÃO DE UMA CONTA PAGA NO ID' . $conta->id
                // Atribua outros valores conforme necessário
            ]);
            $ContaEntradas->save();
            //FIM FINANCEIRO

            $dataAtual = \Carbon\Carbon::now();
            $conta->update(['status_pagamento' => 'pago', 'data_pagamento' => $dataAtual]);
            return back()->with('success', 'A conta foi paga com sucesso!');
        }else{
            return back()->with('success', 'Não há saldo suficiente no caixa');
        }

        
    }
}
