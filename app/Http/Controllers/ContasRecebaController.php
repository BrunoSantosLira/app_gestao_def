<?php

namespace App\Http\Controllers;

use App\Models\ContasReceba;
use App\Models\Conta;
use App\Models\ContaEntradas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContasRecebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query  = ContasReceba::query();

        // Verifica se a data foi fornecida na requisição
        if ($request->filled('created_at')) {
           
            $query->whereDate('data_vencimento', $request->created_at);
        }

        // Verifica se a data foi fornecida na requisição
        if ($request->filled('status')) {
    
            $query->where('status', $request->status);
        }

        $contas = $query->paginate(12);
       
        return view('pages.app.contas_a_receber.index', ['contas' => $contas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.app.contas_a_receber.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ContasReceba::create($request->all());
        return back()->with('success', 'Conta adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContasReceba $ContasReceber)
    {
        return view('pages.app.contas_a_receber.show', ['conta' => $ContasReceber]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContasReceba $ContasReceber)
    {
       return view('pages.app.contas_a_receber.edit', ['conta' => $ContasReceber]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContasReceba $ContasReceber)
    {
        $ContasReceber->update($request->all());
        return back()->with('success', 'Conta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContasReceba $ContasReceber)
    {
        $ContasReceber->delete();
        return back()->with('success', 'Conta deletada com sucesso!');
    }

    public  function aprovar(ContasReceba $conta){
        //FINANCEIRO
        // 1 => CONTA  PRINCIPAL
        $contaFinanceira = Conta::find(1);
        $contaFinanceira['capital'] += $conta->valor;
        $contaFinanceira->save();

        $ContaEntradas = new ContaEntradas([
            'conta_id' => 1,
            'tipo' => 'entrada',
            'capital' => $conta->valor,
            'detalhes' => 'APROVAÇÃO DE UMA CONTA RECEBIDA NO ID:' . $conta->id
            // Atribua outros valores conforme necessário
        ]);
        $ContaEntradas->save();
        //FIM FINANCEIRO

        $dataAtual = \Carbon\Carbon::now();
        $conta->update(['status' => 'pago', 'data_recebimento' => $dataAtual]);
        return back()->with('success', 'A conta foi paga com sucesso!');
    }

}
