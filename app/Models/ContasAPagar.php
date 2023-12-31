<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasAPagar extends Model
{
    use HasFactory;
    protected $table = ['contas_a_pagar'];
    protected $fillable = ['nome', 'valor', 'data_vencimento', 'data_pagamento', 'status_pagamento', 'metodo_pagamento', 'observacoes'];
}
