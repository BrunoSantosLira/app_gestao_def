<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ChecklistProdutos;
use App\Models\CamposProduto;
use App\Models\Produtos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query  = ChecklistProdutos::query();

        // Verifica se foi fornecida na requisição
        if ($request->filled('nome')) {
            $query->where('nome', 'like', "$request->nome%");
        }

        $checklists = $query->paginate(10);
        return view('pages.app.checklistprodutos.index', ['checklists' => $checklists]);
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
        ChecklistProdutos::create($request->all());
        return back()->with('success', 'Checklist adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ChecklistProdutos $checklistProduto)
    {
        $campos = $checklistProduto->campos_produto;
        $produtos = Produtos::all();
        return view('pages.app.checklistprodutos.show', ['checklist' => $checklistProduto, 'produtos' => $produtos, 'campos' => $campos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChecklistProdutos $checklistProduto)
    {
        return view('pages.app.checklistprodutos.edit', ['checklist' => $checklistProduto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChecklistProdutos $checklistProduto)
    {
        $checklistProduto->update($request->all());
        return back()->with('success', 'Checklist atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChecklistProdutos $checklistProduto)
    {
        $checklistProduto->delete();
        return back()->with('success', 'Checklist deletada com sucesso!');
    }

    public function exportar(ChecklistProdutos $checklistProduto){

        $pdf = Pdf::loadView('exportar.listaprodutos', ['produtos' => $checklistProduto->campos_produto]);
        return $pdf->download('lista_de_produtos_id'. $checklistProduto->id .'.pdf');
    }
}
