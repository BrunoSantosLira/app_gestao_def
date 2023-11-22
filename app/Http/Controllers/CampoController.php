<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampoController extends Controller
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
            Campo::create($request->all());
            return redirect()->route('checklist.index',['status'=> 'sucesso']);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('checklist.index',['status'=> 'erro']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Campo $campo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campo $campo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campo $campo)
    {
        $campo->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campo $campo)
    {
        $campo->delete();
        return back();
    }
}
