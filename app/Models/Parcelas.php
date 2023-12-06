<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contrato;

class Parcelas extends Model
{
    use HasFactory;
    protected $fillable = ['contrato_id', 'valor', 'data_vencimento', 'status_pagamento'];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}
