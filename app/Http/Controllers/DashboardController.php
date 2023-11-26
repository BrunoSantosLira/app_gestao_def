<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Produtos;

class DashboardController extends Controller
{
    public function index()
    {
        $clientes = Clientes::all();
        $produtos =  Produtos::with('categoria')->with('unidade')->get();
        $quantidadeClientes = Clientes::count();
        $quantidadeProdutos = Produtos::count();
        return view('dashboard.index',['quantidadeClientes' => $quantidadeClientes, 'quantidadeProdutos' => $quantidadeProdutos, 'clientes' => $clientes, 'produtos' => $produtos]);
    }
}
