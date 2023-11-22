<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Checklist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::all();
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
            'nome' => 'required|min:3|max:255'
        ];

        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'nome.min' => 'Preencha o campo com ao menos 3 caracteres',
            'nome.max' => 'Pode haver no ate 255 caracteres'
        ];

        $request->validate($regras, $feedback);

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
        $regras = [
            'nome' => 'required|min:3|max:255'
        ];

        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'nome.min' => 'Preencha o campo com ao menos 3 caracteres',
            'nome.max' => 'Pode haver no ate 255 caracteres'
        ];

        $request->validate($regras, $feedback);

        $servico->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servico $servico)
    {

        $servico->checklists()->delete(); //exclui todos os campos da checklist
        $servico->delete(); //excluir a checklist
        return back();
    }
}
