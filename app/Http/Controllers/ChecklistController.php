<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Checklist;
use App\Models\Servico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        // Obtém um serviço com suas checklists
        /*
        $servico = Servico::find(10);
        $checklists = $servico->checklists;
        */

        $query  = Checklist::with('servico');

        // Verifica se foi fornecida na requisição
        if ($request->filled('nome')) {
            $query->where('nome', 'like', "$request->nome%");
        }

        $checklists = $query->paginate(10);


        $servicos = Servico::all();
        return view('pages.app.checklist', ['servicos' => $servicos, 'checklists' => $checklists]);
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
            Checklist::create($request->all());
            return redirect()->route('checklist.index',['status'=> 'sucesso']);
        } catch (\Throwable $th) {
            return redirect()->route('checklist.index',['status'=> 'erro']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Checklist $checklist)
    {
        $checklist= $checklist->campos()->get();
        return view('pages.app.checklistshow', ['checklist' => $checklist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checklist $checklist)
    {
        $servicos = Servico::all();
        return view('pages.app.checklistEdit', ['checklist' => $checklist, 'servicos' => $servicos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checklist $checklist)
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

        $checklist->update($request->all());
        return back()->with('success', 'Checklist atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checklist $checklist)
    {
        //$campos = $checklist->with('campos')->get()->find($checklist['id']);
        $checklist->campos()->delete(); //exclui todos os campos da checklist
        $checklist->delete(); //excluir a checklist
        return back();
    }
}
