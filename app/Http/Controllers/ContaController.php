<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\ContaEntradas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contas = Conta::all();
        return view('pages.app.financeiro.conta.conta', ['contas' => $contas]);

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
        Conta::create($request->all());
        return back()->with('success', 'Conta aberta com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Conta $contum, Request $request)
    {
        // Inicializa a consulta de histórico
        $query = ContaEntradas::where('conta_id', $contum->id);
    
        // Verifica se o tipo foi fornecido na requisição
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }
    
        // Verifica se a data foi fornecida na requisição
        if ($request->filled('data')) {
            $query->whereDate('created_at', $request->data);
        }
    
        // Obtém os resultados paginados
        $historico = $query->paginate(10);
    
        return view('pages.app.financeiro.conta.show', ['conta' => $contum, 'historico' => $historico]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conta $conta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conta $conta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conta $conta)
    {
        //
    }
}
