<?php

namespace App\Models;
use App\Models\Categorias;
use App\Models\Unidades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;
    protected $fillable = ['produto', 'preco', 'estoqueAtual', 'categoria_id', 'unidade_id'];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }

    public function unidade()
    {
        return $this->belongsTo(Unidades::class);
    }
}
