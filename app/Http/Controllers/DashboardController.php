<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Produtos;

class DashboardController extends Controller
{
    public function index()
    {
        $quantidadeClientes = Clientes::count();
        $quantidadeProdutos = Produtos::count();
        return view('dashboard.index',['quantidadeClientes' => $quantidadeClientes, 'quantidadeProdutos' => $quantidadeProdutos]);
    }
}
