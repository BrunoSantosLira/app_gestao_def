<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasReceba extends Model
{
    use HasFactory;
    protected $fillable =  ['nome',  'valor', 'data_vencimento', 'status', 'observacoes', 'data_recebimento'];
}
