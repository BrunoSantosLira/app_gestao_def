<?php

namespace App\Http\Controllers;

use App\Models\osProdutos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OsProdutosController extends Controller
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
        return 'oii create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'preco' => 'required',
            'quantidade' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
        ];
  
        $request->validate($regras, $feedback);
        $dados = $request->all();
        $dados['valorTotal'] = $request->preco * $request->quantidade;

        osProdutos::create($dados);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(osProdutos $osProdutos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(osProdutos $osProdutos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, osProdutos $osProdutos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(osProdutos $osprodutos)
    {
        return 'oii destroy';
    }
}
