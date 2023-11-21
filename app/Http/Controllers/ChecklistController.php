<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Servico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        // Obtém um serviço com suas checklists
        /*
        $servico = Servico::find(10);
        $checklists = $servico->checklists;
        */
        $checklists = Checklist::with('servico')->get();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checklist $checklist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checklist $checklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checklist $checklist)
    {
        //
    }
}
