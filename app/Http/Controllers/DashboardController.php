<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Produtos;
use App\Models\Vendas;
use App\Models\Conta;

class DashboardController extends Controller
{
    public function index()
    {
        // Obter todas as vendas do banco de dados
        $vendas = Vendas::all();

        // Inicializar um array para armazenar o total de vendas por mês
        $vendasPorMes = [];

        foreach ($vendas as $venda) {
            $dataVenda = \Carbon\Carbon::parse($venda->created_at);
            $mesAno = $dataVenda->format('Y-m'); // Obtém o formato ano-mês
        
            // Verifica se a chave já existe no array e inicializa com zero se não existir
            if (!isset($vendasPorMes[$mesAno])) {
                $vendasPorMes[$mesAno] = 0;
            }
        
            // Adiciona o valor da venda ao total para esse mês
            $vendasPorMes[$mesAno] += $venda->valor;
        }


        // Obter a data de 30 dias atrás a partir de hoje
        $dataInicio = \Carbon\Carbon::now()->subDays(30);

        // Consultar o banco de dados para obter o valor total das vendas nos últimos 30 dias
        $Valorvendas = Vendas::where('created_at', '>=', $dataInicio)
            ->sum('valor');
        

        $clientes = Clientes::all();
        $produtos =  Produtos::with('categoria')->with('unidade')->get();
        $contaCapital = Conta::all();
        
        //$capitalTotal = $contaCapital[0]['capital'];
        
        $quantidadeClientes = Clientes::count();
        $quantidadeProdutos = Produtos::count();
        return view('dashboard.index',['quantidadeClientes' => $quantidadeClientes, 'quantidadeProdutos' => $quantidadeProdutos, 'clientes' => $clientes, 'produtos' => $produtos, 'Valorvendas' => $Valorvendas,  'contaCapital' => 0]);
    }
}
