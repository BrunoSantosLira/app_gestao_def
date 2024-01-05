<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Servico;
use App\Models\Checklist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query  = Servico::query();

        // Verifica se foi fornecida na requisição
        if ($request->filled('nome')) {
            $query->where('nome', 'like', "$request->nome%");
        }

        $servicos = $query->paginate(10);
        return view('pages.app.servicos', ['servicos' => $servicos]);
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
            'nome' => 'required|min:3|max:255',
            'preco' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'nome.min' => 'Preencha o campo com ao menos 3 caracteres',
            'nome.max' => 'Pode haver no ate 255 caracteres'
        ];

        $request->validate($regras, $feedback);

        try {
            Servico::create($request->all());
            return back()->with('success', 'Serviço adicionado com sucesso com sucesso!');
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
       
        return view('pages.app.servicoEdit', ['servico' => $servico]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servico $servico)
    {
        $regras = [
            'nome' => 'required|min:3|max:255',
            'preco' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'nome.min' => 'Preencha o campo com ao menos 3 caracteres',
            'nome.max' => 'Pode haver no ate 255 caracteres'
        ];

        $request->validate($regras, $feedback);

        $servico->update($request->all());
        return back()->with('success', 'Serviço atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servico $servico)
    {

        $servico->checklists()->delete(); //exclui todos os campos da checklist
        $servico->delete(); //excluir a checklist
        return back()->with('success', 'Serviço deletado com sucesso!');
    }

    public function exportar(){
        $servicos = Servico::all();
        $pdf = Pdf::loadView('exportar.pdf', ['servicos' => $servicos]);
        return $pdf->download('lista_de_serviços.pdf');
    }
}
