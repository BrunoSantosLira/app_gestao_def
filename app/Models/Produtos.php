<?php

namespace App\Models;
use App\Models\Categorias;
use App\Models\Unidades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OS;
use App\Models\osProdutos;
use App\Models\Entradas;
use App\Models\Saidas;


class Produtos extends Model
{
    use HasFactory;
    protected $fillable = ['produto', 'preco', 'estoqueAtual', 'categoria_id', 'unidade_id', 'codigo_de_barras', 'detalhes', 'valorCompra','valorVenda', 'NCM','codDistribuidor','codPessoal','unique_id'];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }

    public function unidade()
    {
        return $this->belongsTo(Unidades::class);
    }

    public function os()
    {
        return $this->hasMany(OS::class);
    }

    public function os_produto()
    {
        return $this->hasMany(osProdutos::class, 'produto_id');
    }

    public function entradas()
    {
        return $this->hasMany(Entradas::class);
    }

    public function saidas()
    {
        return $this->hasMany(Saidas::class);
    }

    
}
