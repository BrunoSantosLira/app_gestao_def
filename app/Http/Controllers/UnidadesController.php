<?php

namespace App\Http\Controllers;

use App\Models\Unidades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades = Unidades::all();
        return view('pages.app.cadastro.unidades', ['unidades' => $unidades]);
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
            'unidade' => 'required|max:255',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'max' => 'Limite de caracteres ultrapassado'
        ];

        $request->validate($regras,$feedback);
        Unidades::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Unidades $unidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unidades $unidades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unidades $unidades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unidades $unidade)
    {
        $unidade->delete();
        return back();
    }
}
