<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produtos;
use App\Models\Categorias;

class Impostos extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'aliquota', 'produto_id', 'categoria_id'];

    
    public function produto()
    {
        return $this->belongsTo(Produtos::class,  'produto_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class,  'categoria_id', 'id');
    }

}
