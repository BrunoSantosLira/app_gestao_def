<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FormaPagamento;

class Taxa extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'valor'];

    public function formaPagamento()
    {
        return $this->hasMany(FormaPagamento::class, 'taxa_id', 'id');
    }


}
