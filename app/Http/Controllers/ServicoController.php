<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.app.servicos');
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
        try {
            Servico::create($request->all());
            return redirect()->route('servico.index',['status'=> 'sucesso']);
        } catch (\Throwable $th) {
            return redirect()->route('servico.index',['status'=> 'erro']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Servico $servico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servico $servico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servico $servico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servico $servico)
    {
        //
    }
}
