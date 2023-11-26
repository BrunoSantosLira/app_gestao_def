<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('pages.app.cadastro.usuarios', ['usuarios' => $usuarios]);
    }


    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request){

        $regras = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
        ];
        $feedback = [
            'required:' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'Preencha com um email válido',
            'email.unique' => 'EMAIL JA CADASTRADO!',
            'max' => 'Pode haver ate 255 caracteres',
            'min' => 'Preencha o campo com ao menos 5 caracteres'
        ];

        $request->validate($regras, $feedback);
      
        $user = User::create($request->all());
        //auth()->login($user);
        
        return back()->with('success', 'Usuário adicionado com sucesso!');
    }

    public function update(Request $request, User $user)
    {
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success', 'Usuário deletado com sucesso!');
    }
    
    
}
