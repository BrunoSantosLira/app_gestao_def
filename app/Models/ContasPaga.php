<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasPaga extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'valor', 'data_vencimento', 'data_pagamento', 'status_pagamento', 'metodo_pagamento', 'observacoes'];
}
