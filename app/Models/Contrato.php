<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;
use App\Models\ContratoProdutos;
use App\Models\ContratoServicos;
use App\Models\Parcelas;
use App\Models\Vendas;
use App\Models\FormaPagamento;

class Contrato extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'nome', 'responsável', 'corpo', 'data_inicio', 'data_fim', 'forma_id', 'valorTotal', 'status'];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
    }

    public function contrato_produtos()
    {
        return $this->hasMany(ContratoProdutos::class, 'contrato_id');
    }

    public function contrato_servicos()
    {
        return $this->hasMany(ContratoServicos::class, 'contrato_id');
    }

    public function parcelas()
    {
        return $this->hasMany(Parcelas::class);
    }

    
    public function vendas()
    {
        return $this->hasMany(Vendas::class);
    }

        
    public function formaPagamento()
    {
        return $this->belongsTo(FormaPagamento::class, 'forma_id', 'id');
    }

}
