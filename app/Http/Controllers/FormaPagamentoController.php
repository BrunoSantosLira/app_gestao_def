<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use App\Models\Taxa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormaPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taxas = Taxa::all();
        $formas = FormaPagamento::with('taxas')->get();
        return view('pages.app.cadastro.formaPagamento.index',['formas' => $formas, 'taxas' => $taxas]);

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
        FormaPagamento::create($request->all());
        return back()->with('success', 'Forma de pagamento adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormaPagamento $formaPagamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormaPagamento $formaPagamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormaPagamento $formaPagamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormaPagamento $formaPagamento)
    {
        $formaPagamento->delete();
        return back()->with('success', 'Forma de pagamento deletada com sucesso!');
    }
}
