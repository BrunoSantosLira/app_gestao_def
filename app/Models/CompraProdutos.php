<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produtos;
use App\Models\Compras;

class CompraProdutos extends Model
{
    use HasFactory;
    protected $table = 'compra_produtos';
    protected $fillable = ['compra_id', 'produto_id', 'preco', 'quantidade', 'valorTotal'];

    public function compra()
    {
        return $this->belongsTo(Compras::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produtos::class);
    }

}
