<?php

namespace App\Http\Controllers;

use App\Models\Relatorio;

use App\Models\Clientes;
use App\Models\Fornecedores;
use App\Models\ContasPaga;
use App\Models\ContasReceba;
use App\Models\ContaEntradas;
use App\Models\Produtos;


use App\Models\Empresa;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{


    public function geralClientes(){
        $clientes = Clientes::all();
        return view('pages.app.relatorios.geralClientes', ['clientes' => $clientes]);
    }

    
    public function geralClientesPDF(){
        $empresa = Empresa::find(1);
        $clientes = Clientes::all();
        $lista = $clientes;
        $param = [
            'id',
            'nome',
            'CPF/CNPJ',
            'logradouro',
            'telefone'
        ];
        $cabecalhos = [
            'Cód.',
            'Nome',
            'CPF/CNPJ',
            'Endereço',
            'Contato'
        ];
        $titulo = 'LISTA GERAL DE CLIENTES';

        $pdf = Pdf::loadView('relatoriosPDF.modeloLista', ['empresa' => $empresa, 'clientes' => $clientes, 'lista' => $lista, 'param' => $param, 'cabecalhos' => $cabecalhos, 'titulo' => $titulo ]);
        return $pdf->download('lista_de_Geral_de_clientes_id.pdf');
    }


   public function geralFornecedores(){
        $fornecedores = Fornecedores::all();
        return view('pages.app.relatorios.geralFornecedores', ['fornecedores' => $fornecedores]);
   }

   
   public function geralFornecedoresPDF(){
        $empresa = Empresa::find(1);
        $fornecedores = Fornecedores::all();
        $lista = $fornecedores;
        $param = [
            'id',
            'nome_fantasia',
            'cnpj',
            'endereco',
            'contato'
        ];
        $cabecalhos = [
            'Cód.',
            'Nome Fantasia',
            'CNPJ',
            'Endereço',
            'Contato'
        ];
        $titulo = 'LISTA GERAL DE FORNECEDORES';

        $pdf = Pdf::loadView('relatoriosPDF.modeloLista', ['empresa' => $empresa, 'lista' => $lista, 'param' => $param, 'cabecalhos' => $cabecalhos, 'titulo' => $titulo ]);
        return $pdf->download('lista_de_Geral_de_fornecedores_id.pdf');
   }

   public function ContasAPagar(){
    $ContasAPaga = ContasPaga::all();
    return view('pages.app.relatorios.ContasAPagar', ['ContasAPagar' => $ContasAPaga]);
    }


    public function ContasAPagarPDF(Request $request){
        $empresa = Empresa::find(1);

        $query = ContasPaga::query();

        // Verifica se a data de início foi fornecida na requisição
        if ($request->filled('data_inicio')) {
            $query->whereDate('data_vencimento', '>=', $request->data_inicio);
        }

        // Verifica se a data final foi fornecida na requisição
        if ($request->filled('data_final')) {
            $query->whereDate('data_vencimento', '<=', $request->data_final);
        }

        // Verifica se o status de pagamento foi fornecido na requisição
        if ($request->filled('status_pagamento')) {
            $query->where('status_pagamento', $request->status_pagamento);
        }

        $ContasAPagar = $query->get();


        $lista = $ContasAPagar;
        $param = [
            'id',
            'status_pagamento',
            'nome',
            'data_vencimento',
            'valor',
    
        ];
        $cabecalhos = [
            'ID.',
            'Status',
            'Nome',
            'Vencimento',
            'Valor',
    
        ];
        $titulo = 'LISTA CONTAS A PAGAR';

        $pdf = Pdf::loadView('relatoriosPDF.modeloLista', ['empresa' => $empresa, 'lista' => $lista, 'param' => $param, 'cabecalhos' => $cabecalhos, 'titulo' => $titulo ]);
        return $pdf->download('lista_de_contas_a_pagar_id.pdf');
    }

    public function ContasAReceber(){
        $ContasAReceber = ContasReceba::all();
        return view('pages.app.relatorios.ContasAReceber', ['ContasAReceber' => $ContasAReceber]);
        }


    public function ContasAReceberPDF(Request $request){
        $empresa = Empresa::find(1);

        $query = ContasReceba::query();

        // Verifica se a data de início foi fornecida na requisição
        if ($request->filled('data_inicio')) {
            $query->whereDate('data_vencimento', '>=', $request->data_inicio);
        }

        // Verifica se a data final foi fornecida na requisição
        if ($request->filled('data_final')) {
            $query->whereDate('data_vencimento', '<=', $request->data_final);
        }

        // Verifica se o status de pagamento foi fornecido na requisição
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $ContasAReceber = $query->get();


        $lista = $ContasAReceber;
        $param = [
            'id',
            'status',
            'nome',
            'data_vencimento',
            'valor',
    
        ];
        $cabecalhos = [
            'ID.',
            'Status',
            'Nome',
            'Vencimento',
            'Valor',
    
        ];
        $titulo = 'LISTA CONTAS A RECEBER';

        $pdf = Pdf::loadView('relatoriosPDF.modeloLista', ['empresa' => $empresa, 'lista' => $lista, 'param' => $param, 'cabecalhos' => $cabecalhos, 'titulo' => $titulo ]);
        return $pdf->download('lista_de_contas_a_receber_id.pdf');
    }


    public function HistoricoCaixa(){
        $ContaEntradas = ContaEntradas::take(50)->get();
        return view('pages.app.relatorios.HistoricoCaixa', ['HistoricoCaixa' => $ContaEntradas]);
    }


    public function HistoricoCaixaPDF(Request $request){
        $empresa = Empresa::find(1);

        $query = ContaEntradas::query();

        // Verifica se a data de início foi fornecida na requisição
        if ($request->filled('data_inicio')) {
            $query->whereDate('created_at', '>=', $request->data_inicio);
        }

        // Verifica se a data final foi fornecida na requisição
        if ($request->filled('data_final')) {
            $query->whereDate('created_at', '<=', $request->data_final);
        }

        // Verifica se o status de pagamento foi fornecido na requisição
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        $ContasAReceber = $query->get();


        $lista = $ContasAReceber;
        $param = [
            'id',
            'tipo',
            'capital',
            'detalhes',
            'created_at',
    
        ];
        $cabecalhos = [
            'ID.',
            'Tipo',
            'Valor',
            'detalhes',
            'Data',
    
        ];
        $titulo = 'Histórico do caixa';

        $pdf = Pdf::loadView('relatoriosPDF.modeloLista', ['empresa' => $empresa, 'lista' => $lista, 'param' => $param, 'cabecalhos' => $cabecalhos, 'titulo' => $titulo ]);
        return $pdf->download('historico_caixa.pdf');
    }

    public function ProdutosEstoque(){
        $Estoque = Produtos::all();
        return view('pages.app.relatorios.ProdutosEstoque', ['Estoque' => $Estoque]);
    }


    public function ProdutosEstoquePDF(Request $request){
        $empresa = Empresa::find(1);

        $produtos = Produtos::all();

        $lista = $produtos;
        $param = [
            'id',
            'produto',
            'codigo_de_barras',
            'estoqueAtual',
            'valorCompra',
            'valorVenda'
    
        ];
        $cabecalhos = [
            'ID.',
            'Nome',
            'Código de barras',
            'Estoque Atual',
            'Custo',
            'Venda'
    
        ];
        $titulo = 'Relatório de estoque';

        $pdf = Pdf::loadView('relatoriosPDF.modeloLista', ['empresa' => $empresa, 'lista' => $lista, 'param' => $param, 'cabecalhos' => $cabecalhos, 'titulo' => $titulo ]);
        return $pdf->download('relatorio_estoque.pdf');
    }

}
