<?php

namespace App\Http\Controllers;

use App\Models\Impostos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImpostosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $impostos = Impostos::all();
        return view('pages.app.financeiro.impostos.impostos', ['impostos' => $impostos]);

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
        $regras = [
            'nome' => 'required|max:255',
            'aliquota' => 'required'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',

        ];
  
        $request->validate($regras, $feedback);

        Impostos::create($request->all());
        return back()->with('success', 'Imposto adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Impostos $impostos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Impostos $impostos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Impostos $impostos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Impostos $imposto)
    {
        $imposto->delete();
        return back()->with('success', 'Imposto deletado com sucesso!');
    }
}
