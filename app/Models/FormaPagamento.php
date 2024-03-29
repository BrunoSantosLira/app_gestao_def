<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Taxa;
use App\Models\OS;
use App\Models\Contrato;
use App\Models\ChecklistProdutos;

class FormaPagamento extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'detalhes', 'taxa_id', 'qtd_parcelas'];

    public function taxas()
    {
        return $this->belongsTo(Taxa::class, 'taxa_id', 'id');
    }

    public function OS()
    {
        return $this->hasMany(OS::class, 'forma_id', 'id');
    }

    public function contrato()
    {
        return $this->hasMany(Contrato::class, 'forma_id', 'id');
    }

    public function checklist()
    {
        return $this->hasMany(ChecklistProdutos::class, 'forma_id', 'id');
    }

}
