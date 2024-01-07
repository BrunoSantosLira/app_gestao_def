<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Produtos;
use App\Models\Empresa;
use App\Models\Vendas;
use App\Models\Conta;
use App\Models\ContasPaga;
use App\Models\ContasReceba;
use Carbon\Carbon;

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
        
        $capitalTotal = $contaCapital[0]['capital'];
        
        $quantidadeClientes = Clientes::count();
        $quantidadeProdutos = Produtos::count();

        // Obtém o primeiro dia do mês atual
        $primeiroDiaDoMes = Carbon::now()->firstOfMonth();

        // Obtém o último dia do mês atual
        $ultimoDiaDoMes = Carbon::now()->endOfMonth();

        // Consulta para obter os registros do mês atual
        $contasPagasDoMes = ContasPaga::whereBetween('data_vencimento', [$primeiroDiaDoMes, $ultimoDiaDoMes])->get();
        $contasAReceberDoMes = ContasReceba::whereBetween('data_vencimento', [$primeiroDiaDoMes, $ultimoDiaDoMes])->get();

        // Obtém a data atual
        $dataAtual = Carbon::now();

        // Obtém o número do mês (1 a 12)
        $numeroMes = $dataAtual->month;

        // Obtém o ano (4 dígitos)
        $ano = $dataAtual->year;

        // Combine o número do mês e o ano como uma string
        $mesEAno = $numeroMes . '/' . $ano;



        $somaPorDia = Vendas::selectRaw('DATE(created_at) as data, SUM(valor) as total')
        ->groupBy('data')
        ->get();


        return view('dashboard.index',['quantidadeClientes' => $quantidadeClientes, 'quantidadeProdutos' => $quantidadeProdutos, 'clientes' => $clientes, 'produtos' => $produtos, 'Valorvendas' => $Valorvendas,  'contaCapital' => $capitalTotal, 'ContasAPagar' => $contasPagasDoMes, 'mesEAno' => $mesEAno, 'contasReceber' => $contasAReceberDoMes, 'somaPorDia' => $somaPorDia ]);
    }

    public function somaVendasPorDia(){
        $dataAtual = Carbon::now();
        $dataInicio = $dataAtual->copy()->subDays(29); // 30 dias atrás
    
        // Gere as datas usando Carbon e mapeie para um array de datas no formato d-m
        $datas = collect(range(0, 29))
            ->map(function ($day) use ($dataInicio) {
                return $dataInicio->copy()->addDays($day)->format('d/m');
            });
    
        $somaVendas = Vendas::whereBetween('created_at', [$dataInicio, $dataAtual])
            ->selectRaw('DATE(created_at) as data, COALESCE(SUM(valor), 0) as total')
            ->groupBy('data')
            ->orderBy('data')
            ->get();
    
        // Complemente com os dias ausentes
        $dadosCompletos = collect($datas)
            ->map(function ($data) use ($somaVendas) {
                $venda = $somaVendas->first(function ($venda) use ($data) {
                    return Carbon::parse($venda->data)->format('d/m') === $data;
                });
    
                return [
                    'data' => $data,
                    'total' => $venda ? $venda->total : 0,
                ];
            });
    
        return response()->json($dadosCompletos);
    }

    public function vendasPorMes(){

        $dataAtual = Carbon::now();
        $dataInicio = $dataAtual->copy()->subMonths(11); // 12 meses atrás
    
        // Gere os meses usando Carbon e mapeie para um array de meses no formato M
        $meses = collect(range(0, 11))
            ->map(function ($month) use ($dataInicio) {
                return $dataInicio->copy()->addMonths($month)->format('M');
            });
    
        $somaVendas = Vendas::whereBetween('created_at', [$dataInicio, $dataAtual])
            ->selectRaw('MONTH(created_at) as mes, COALESCE(SUM(valor), 0) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
            
        // Complemente com os meses ausentes
        $dadosCompletos = collect($meses)
            ->map(function ($mes) use ($somaVendas) {
                $venda = $somaVendas->first(function ($venda) use ($mes) {
                    // Use Carbon para comparar meses
                    $dataVenda = Carbon::createFromDate($venda->ano, $venda->mes, 1); // Substitua 'ano' pelo nome correto da coluna no seu banco de dados
                    return $dataVenda->format('M') === $mes;
                });

                return [
                    'mes' => $mes,
                    'total' => $venda ? $venda->total : 0,
                ];
            });

    
        return response()->json($dadosCompletos);
    }

    public function modoEscuro(){
        $empresa = Empresa::find(1);
        return response()->json($empresa);
    }

}

