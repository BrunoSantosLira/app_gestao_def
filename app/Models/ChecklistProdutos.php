<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CamposProduto;
use App\Models\Clientes;
use App\Models\CheckParcelas;
use App\Models\FormaPagamento;

class ChecklistProdutos extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao', 'status', 'valorTotal', 'cliente_id', 'forma_id'];

    public function campos_produto()
    {
        return $this->hasMany(CamposProduto::class, 'checklist_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id', 'id');
    }

    public function parcelas()
    {
        return $this->hasMany(CheckParcelas::class, 'checklist_id', 'id');
    }

    public function formaPagamento()
    {
        return $this->belongsTo(FormaPagamento::class, 'forma_id', 'id');
    }
    
}
