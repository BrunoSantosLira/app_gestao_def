<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contrato;
use App\Models\Produtos;

class ContratoProdutos extends Model
{
    use HasFactory;
    protected $fillable = ['contrato_id', 'produto_id', 'preco', 'quantidade', 'valorTotal'];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produtos::class);
    }

}
