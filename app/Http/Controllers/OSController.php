<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\OS;
use App\Models\Impostos;
use App\Models\ContaEntradas;
use App\Models\Conta;

use App\Models\Clientes;
use App\Models\Servico;
use App\Models\Produtos;
use App\Models\osProdutos;
use App\Models\osServico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendas;

class OSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientes = Clientes::all();
        $produtos = Produtos::paginate(5);

        $query  = OS::query();

        // Verifica se tipo foi fornecido na requisição
        if ($request->filled('id')) {
            $query->where('unique_id', 'like', "$request->id%");
        }
    
        // Verifica se a data foi fornecida na requisição
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Verifica se a data foi fornecida na requisição
        if ($request->filled('cliente_id')) {
            $query->where('cliente_id', $request->cliente_id);
        }

        $os = $query->paginate(10);
    
        return view('pages.app.cadastro.os.os', ['os' => $os, 'produtos' => $produtos, 'clientes' => $clientes]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicos = Servico::all();
        $produtos = Produtos::all();
        $clientes = Clientes::all();
        return view('pages.app.cadastro.os.oscreate', ['servicos' => $servicos, 'produtos' => $produtos, 'clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3',
            'responsavel' => 'required|min:3',
            'dias_garantia' => 'required',
            'data_inicial' => 'required',
            'data_final' => 'required'
            
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute precisa ter ao menos 3 caracteres'
        ];
  
        $request->validate($regras, $feedback);

        $dados = $request->all();
        $ultimoID = OS::latest()->value('id') + 1;
        $dados['unique_id'] = now()->format('Ymd') . '/' . $ultimoID ;

        OS::create($dados);
        return back()->with('success', 'OS adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OS $o)
    {
        $produtos = osProdutos::with('produto')->where('os_id', '=', $o->id)->get();
        $servicos = osServico::with('servico')->where('os_id', '=', $o->id)->get();
        // Substitua 'osProdutos' pelo nome correto do seu modelo
        $somaProdutosOS = osProdutos::where('os_id', $o->id)->sum('valorTotal');
        $somaServicosOS = osServico::where('os_id', $o->id)->sum('valorTotal');

        $produtosTabela = Produtos::all();
        $servicosTabela = Servico::all();
        $o = Os::with('os_produtos')->where('id', '=', $o->id )->get();
        return view('pages.app.cadastro.os.osshow', ['os' => $o, 'produtos' => $produtos, 'produtosTabela' => $produtosTabela, 'somaProdutosOS' =>  $somaProdutosOS, 'servicos' => $servicos, 'servicosTabela' => $servicosTabela, 'somaServicosOS' => $somaServicosOS]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OS $o)
    {
        $servicos = Servico::all();
        $produtos = Produtos::all();
        $clientes = Clientes::all();
        return view('pages.app.cadastro.os.osedit', ['os'=> $o, 'servicos' => $servicos, 'produtos' => $produtos, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OS $o)
    {
        $regras = [
            'nome' => 'required|min:3',
            'responsavel' => 'required|min:3',
            'dias_garantia' => 'required',
            'data_inicial' => 'required',
            'data_final' => 'required'
            
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute precisa ter ao menos 3 caracteres'
        ];
        $request->validate($regras, $feedback);


        $o->update($request->all());
        return back()->with('success', 'OS atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OS $o)
    {
        $o->delete();
        return back()->with('success', 'OS removida com sucesso!');
    }

    public function exportar(Request $request){
        
        $produtos = osProdutos::with('produto')->where('os_id', '=', $request->o)->get();
        $servicos = osServico::with('servico')->where('os_id', '=', $request->o)->get();
        // Substitua 'osProdutos' pelo nome correto do seu modelo
        $somaProdutosOS = osProdutos::where('os_id', $request->o)->sum('valorTotal');
        $somaServicosOS = osServico::where('os_id', $request->o)->sum('valorTotal');

        $produtosTabela = Produtos::all();
        $servicosTabela = Servico::all();
        $o = Os::with('os_produtos')->where('id', '=', $request->o )->get();
        $pdf = Pdf::loadView('exportar.osexportar', ['os' => $o, 'produtos' => $produtos, 'produtosTabela' => $produtosTabela, 'somaProdutosOS' =>  $somaProdutosOS, 'servicos' => $servicos, 'servicosTabela' => $servicosTabela, 'somaServicosOS' => $somaServicosOS]);
        return $pdf->download('OS.pdf');
    }

    public function aprovar(OS $os){
        // Atualiza o status da os apenas se todos os produtos tiverem estoque suficiente

        $impostos = Impostos::all();
        $valor_com_impostos = $os->valorTotal;

        foreach ($impostos as $imposto) {
            

            if ($imposto->nome  == 'ICMS') {
                $valor_icms = $os->valorTotal * ($imposto->aliquota / 100);
                $valor_com_impostos -= $valor_icms;
            }

            if ($imposto->nome  == 'PIS') {
                $valor_icms = $os->valorTotal * ($imposto->aliquota / 100);

                
            }

        }
        

        
        $os->update(['status' => 'finalizado']);

        // Cria o registro de venda na tabela Vendas
        $venda = new Vendas([
            'os_id' => $os->id,
            'contrato_id' => null,
            'valor' => $os->valorTotal,
            'tipo' => 'OS'
            // Atribua outros valores conforme necessário
        ]);
    
        $venda->save();

        //FINANCEIRO
        // 1 => CONTA  PRINCIPAL
        $conta = Conta::find(1);
        $conta['capital'] += $os->valorTotal;
        $conta->save();

        $ContaEntradas = new ContaEntradas([
            'conta_id' => 1,
            'tipo' => 'entrada',
            'capital' => $os->valorTotal,
            'detalhes' => 'APROVAÇÃO DA OS N:' . $os->id
            // Atribua outros valores conforme necessário
        ]);
        $ContaEntradas->save();
        //FIM FINANCEIRO

        return back()->with('success', 'OS Aprovada com sucesso!');
        
    }
}
