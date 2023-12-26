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
        return view('pages.app.financeiro.vendas_compras.vendas', ['vendas' => $vendas]);
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
