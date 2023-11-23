<?php

namespace App\Models;
use App\Models\Produtos;

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
}
