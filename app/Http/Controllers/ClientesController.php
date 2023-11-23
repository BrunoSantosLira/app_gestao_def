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

    public function index()
    {
        $clientes = Clientes::all();
        return view('pages.app.cadastro.clientes',['clientes' => $clientes]);
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
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255|unique:clientes,email',
            'CPF/CNPJ' => 'required|min:11|max:255',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'Preencha com um email válido',
            'email.unique' => 'EMAIL JA CADASTRADO!',
            'CPF/CNPJ.unique' => 'CPF/CNPJ JA CADASTRADO!',
            'max' => 'Pode haver ate 255 caracteres',
            'min' => 'Preencha o campo com ao menos 1 caracteres'
        ];
  
        $request->validate($regras, $feedback);
        $cliente = Clientes::create($request->all());
        return back();
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
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $clientes = $this->clientes->find($id);

        $regras = [
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255|unique:clientes,email,' . $clientes['id'],
            'CPF/CNPJ' => 'required|min:11|max:255',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'Preencha com um email válido',
            'email.unique' => 'EMAIL JA CADASTRADO!',
            'CPF/CNPJ.unique' => 'CPF/CNPJ JA CADASTRADO!',
            'max' => 'Pode haver ate 255 caracteres',
            'min' => 'Preencha o campo com ao menos 1 caracteres'
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
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $cliente)
    {
      
        $cliente->delete();
        return back();
    }
}
