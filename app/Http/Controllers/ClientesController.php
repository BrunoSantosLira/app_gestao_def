<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(Clientes $clientes){
        $this->clientes = $clientes;
    }

    public function index(Request $request)
    {

        $query  = Clientes::query();

        // Verifica se foi fornecida na requisição
        if ($request->filled('nome')) {
            $query->where('nome', 'like', "$request->nome%");
        }

        // Verifica se foi fornecida na requisição
        if ($request->filled('email')) {
            $query->where('email', 'like', "$request->email%");
        }

        // Verifica se foi fornecida na requisição
        if ($request->filled('CPF')) {
            $query->where('CPF/CNPJ', 'like', "$request->CPF%");
        }

        $clientes = $query->paginate(10);

        return view('pages.app.cadastro.clientes.clientes',['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.app.cadastro.clientes.clientecreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255|unique:clientes,email',
            'CPF/CNPJ' => 'required|min:11|max:255|unique:clientes,CPF/CNPJ',
            'rg' => 'required|min:10|max:255|unique:clientes,rg',
            'logradouro' => 'required',
            'logradouroNumero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'UF' => 'required|max:2',
            'CEP' => 'required',
            'telefone' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'Preencha com um email válido',
            'email.unique' => 'EMAIL JA CADASTRADO!',
            'CPF/CNPJ.unique' => 'CPF/CNPJ JA CADASTRADO!',
            'rg.unique' => 'RG JA CADASTRADO!',
            'rg.min' => 'RG precisa ter no minimo 11 digitos',
            'max' => 'Pode haver ate 255 caracteres',
            'min' => 'Preencha o campo com ao menos 11 caracteres',
            "UF.max" => "Preencha com a sigla"
        ];
  
        $request->validate($regras, $feedback);
        $cliente = Clientes::create($request->all());
        return back()->with('success', 'Cliente adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $cliente)
    {
       
        return view('pages.app.cadastro.clientes.clienteedit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $clientes = $this->clientes->find($id);

        $regras = [
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255',
            'CPF/CNPJ' => 'required|min:11|max:255',
            'rg' => 'required|min:10|max:255',
            'logradouro' => 'required',
            'logradouroNumero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'UF' => 'required|max:2',
            'CEP' => 'required',
            'telefone' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'Preencha com um email válido',
            'max' => 'Pode haver ate 255 caracteres',
            'min' => 'Preencha o campo com ao menos 1 caracteres',
            "UF.max" => "Preencha com a sigla",
            'rg.min' => 'RG precisa ter no minimo 11 digitos',
        ];
  
        if($clientes === NULL){
            return response()->json(['erro' => 'Recurso não encontrado'], 404)  ;
        }

        if($request->method() === 'PATCH'){

            $regrasDinamicas = array();

            foreach ($regras as $input => $regra) {
                if(array_key_exists($input, $request->all())){
                    $regrasDinamicas[$input] = $regra;
                };

            }
            $request->validate($regrasDinamicas,$feedback);
        }else{
            $request->validate($regras,$feedback);
        }


        $clientes->fill($request->all());

        $clientes->save();
        return back()->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $cliente)
    {
      
        $cliente->delete();
        return back()->with('success', 'Cliente deletado com sucesso!');
    }
}
