<?php

namespace App\Http\Controllers;

use App\Models\ServicoCategoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicoCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = ServicoCategoria::all();
        return view('pages.app.cadastro.servico_categoria',['categorias' => $categorias]);
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
        ServicoCategoria::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ServicoCategoria $servicoCategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServicoCategoria $servicoCategoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServicoCategoria $servicoCategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicoCategoria $servico_categorium)
    {
        $servico_categorium->delete();
        return back();
    }
}
