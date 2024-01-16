<?php

namespace App\Models;
use App\Models\Produtos;
use App\Models\Impostos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $fillable = ['categoria'];

    public function produtos()
    {
        return $this->hasMany(Produtos::class);
    }

    public function imposto()
    {
        return $this->hasMany(Impostos::class, 'categoria_id', 'id');
    }


}
