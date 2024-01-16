<?php

namespace App\Http\Controllers;

use App\Models\Taxa;
use App\Models\Categorias;
use App\Models\FormaPagamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formas = FormaPagamento::all();
        $taxas = Taxa::all();
        return view('pages.app.cadastro.taxa.index',['taxas' => $taxas, 'formas' => $formas]);
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

        Taxa::create($request->all());
        return back()->with('success', 'Taxa adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Taxa $taxa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taxa $taxon)
    {
        return view('pages.app.cadastro.taxa.edit',['taxa' => $taxon]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taxa $taxon)
    {

        $taxon->update($request->all());
        return back()->with('success', 'Serviço atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taxa $taxon)
    {
        $taxon->delete();
        return back()->with('success', 'Taxa deletada com sucesso!');
    }
}
