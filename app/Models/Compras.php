<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fornecedores;
use App\Models\CompraProdutos;

class Compras extends Model
{
    use HasFactory;
    protected $fillable = ['fornecedor_id', 'nome', 'detalhes', 'metodo_de_pagemento', 'valorTotal', 'status'];

    public function compra_produtos()
    {
        return $this->hasMany(CompraProdutos::class, 'compra_id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedores::class);
    }

}
