<?php

namespace App\Http\Controllers;

use App\Models\CamposProduto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CamposProdutoController extends Controller
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
        CamposProduto::create($request->all());
        return back()->with('success', 'Campo adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CamposProduto $camposProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CamposProduto $camposProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CamposProduto $camposProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CamposProduto $camposProduto)
    {
        $camposProduto->delete();
        return back()->with('success', 'Produto deletado com sucesso!');
    }
}
