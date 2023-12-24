<?php

namespace App\Http\Controllers;

use App\Models\ContaEntradas;
use App\Models\Conta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContaEntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        ContaEntradas::create($request->all());

        $conta = Conta::find($request->conta_id);
        if($request->tipo == 'entrada'){
            $conta['capital'] += $request->capital;

        }elseif($request->tipo == 'saida'){
            $conta['capital'] -= $request->capital;
        }
        
        $conta->save();

        return back()->with('success', 'Saldo adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContaEntradas $contaEntradas)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContaEntradas $contaEntradas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContaEntradas $contaEntradas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContaEntradas $contaEntradas)
    {
        //
    }
}
