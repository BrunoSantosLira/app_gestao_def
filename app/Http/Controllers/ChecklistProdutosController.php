<?php

namespace App\Http\Controllers;

use App\Models\ChecklistProdutos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.app.checklistprodutos.index');
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
    public function show(ChecklistProdutos $checklistProdutos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChecklistProdutos $checklistProdutos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChecklistProdutos $checklistProdutos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChecklistProdutos $checklistProdutos)
    {
        //
    }
}
