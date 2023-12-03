<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contrato;
use App\Models\Servico;

class ContratoServicos extends Model
{
    use HasFactory;
    protected $fillable = ['contrato_id', 'servico_id', 'preco', 'quantidade', 'valorTotal'];


    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
