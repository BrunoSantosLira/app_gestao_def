<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->all()){
            //Busca os fornecedores pelo buscador a partir do unique_id
            $fornecedores = Fornecedores::where('cnpj', 'like', "$request->cnpj%")->get();
            return view('pages.app.financeiro.fornecedores.fornecedores', ['fornecedores' => $fornecedores]);

        }else{
            $fornecedores = Fornecedores::all();
            return view('pages.app.financeiro.fornecedores.fornecedores', ['fornecedores' => $fornecedores]);
        };

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.app.financeiro.fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome_fantasia' => 'required|max:255',
            'razao_social' => 'required|max:255',
            'email' => 'required|email|max:255|unique:fornecedores,email',
            'cnpj' => 'required|max:255|unique:fornecedores,cnpj',
            'endereco' => 'required|max:255',
            'contato' => 'required|max:255',
            'telefone_fixo' => 'max:255',
            'telefone_celular' => 'max:255',
            'whatsapp' => 'max:255',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'Preencha com um email válido',
            'email.unique' => 'EMAIL JA CADASTRADO!',
            'cnpj.unique' => 'CNPJ JA CADASTRADO!',
            'max' => 'Pode haver ate 255 caracteres',
        ];
  
        $request->validate($regras, $feedback);
        $fornecedores = Fornecedores::create($request->all());
        return back()->with('success', 'Fornecedor adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedores $fornecedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fornecedores $fornecedore)
    {
        return view('pages.app.financeiro.fornecedores.edit', ['fornecedor' => $fornecedore]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fornecedores $fornecedore)
    {
        $regras = [
            'nome_fantasia' => 'required|max:255',
            'razao_social' => 'required|max:255',
            'email' => 'required|email|max:255',
            'cnpj' => 'required|max:255',
            'endereco' => 'required|max:255',
            'contato' => 'required|max:255',
            'telefone_fixo' => 'max:255',
            'telefone_celular' => 'max:255',
            'whatsapp' => 'max:255',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'Preencha com um email válido',

            'max' => 'Pode haver ate 255 caracteres',
        ];
  
        $request->validate($regras, $feedback);
        $fornecedore->update($request->all());
        return back()->with('success', 'Fornecedor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedores $fornecedore)
    {
        $fornecedore->delete();
        return back()->with('success', 'Fornecedor deletado com sucesso!');
    }
}
