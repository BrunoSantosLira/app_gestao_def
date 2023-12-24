<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContaEntradas;

class Conta extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'capital'];

    public function conta_entradas()
    {
        return $this->hasMany(ContaEntradas::class);
    }
}
