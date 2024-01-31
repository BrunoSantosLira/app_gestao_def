<?php

namespace App\Http\Controllers;

use App\Models\Vendas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query  = Vendas::with('os');

        // Verifica se tipo foi fornecido na requisição
        if ($request->filled('tipo')) {
            $query->where('tipo', '=', $request->tipo);
        }
    
        // Verifica se a data foi fornecida na requisição
        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        $vendas = $query->paginate(5);

                // Obter a data de início do ano corrente (1º de janeiro)
        $dataInicio = \Carbon\Carbon::now()->startOfYear();

        // Obter a data de fim do ano corrente (31 de dezembro)
        $dataFim = \Carbon\Carbon::now()->endOfYear();

        // Consultar o banco de dados para obter o valor total das vendas de janeiro a dezembro
        $valorVendas = Vendas::whereBetween('created_at', [$dataInicio, $dataFim])
            ->sum('valor');

        $imposto = 0;
        if($valorVendas <= 180000){
            $imposto = (4.50 / 100) * $valorVendas;
            $impostoqtd= 4.50;
        }
        if($valorVendas >= 180000.01 && $valorVendas <= 360000){
            $imposto = (9.00 / 100) * $valorVendas;
            $impostoqtd= 9.00;
        }
        if($valorVendas >= 360000.01 && $valorVendas <= 720000){
            $imposto = (10.20 / 100) * $valorVendas;
            $impostoqtd= 10.20;
        }
        if($valorVendas >= 720000.01 && $valorVendas <= 1800000){
            $imposto = (14.00 / 100) * $valorVendas;
            $impostoqtd= 10.20;
        }
        if($valorVendas >= 1800000.01 && $valorVendas <= 3600000.01){
            $imposto = (22.00 / 100) * $valorVendas;
            $impostoqtd= 22.20;
        }
        if($valorVendas >= 3600000.01 && $valorVendas <= 4800000.01){
            $imposto = (33.00 / 100) * $valorVendas;
            $impostoqtd= 33.20;
        }

        return view('pages.app.financeiro.vendas_compras.vendas', ['impostoqtd' => $impostoqtd ,'imposto' => $imposto,'vendas' => $vendas, 'valorVendas' => $valorVendas]);
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
    public function show(Vendas $vendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendas $vendas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendas $vendas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendas $vendas)
    {
        //
    }
}
