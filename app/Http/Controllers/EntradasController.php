<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.app.estoque.entrada');
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
    public function show(Entradas $entradas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entradas $entradas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entradas $entradas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entradas $entradas)
    {
        //
    }
}
