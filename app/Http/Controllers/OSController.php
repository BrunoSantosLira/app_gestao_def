<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\OS;
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
        if($request->all()){
            //Busca as OS pelo buscador a partir do unique_id
            $os = OS::where('unique_id', 'like', "$request->id%")->get();
            $produtos = Produtos::all();
            return view('pages.app.cadastro.os.os',['os' => $os, 'produtos' => $produtos]);

        }else{

            $os = OS::all();
            $produtos = Produtos::all();
            return view('pages.app.cadastro.os.os',['os' => $os, 'produtos' => $produtos]);

        };

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

        return back()->with('success', 'OS Aprovada com sucesso!');
    }
}
