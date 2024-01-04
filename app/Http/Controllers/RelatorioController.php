<?php

namespace App\Http\Controllers;

use App\Models\Relatorio;
use App\Models\Clientes;
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
        $pdf = Pdf::loadView('relatoriosPDF.geralClientes', ['empresa' => $empresa]);
        return $pdf->download('lista_de_Geral_de_clientes_id.pdf');
    }

   
}
