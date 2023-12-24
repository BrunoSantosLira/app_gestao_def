<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Conta;

class ContaEntradas extends Model
{
    use HasFactory;
    protected $table = 'conta_entradas';
    protected $fillable = ['conta_id', 'tipo', 'capital', 'detalhes'];

    public function conta()
    {
        return $this->belongsTo(Conta::class);
    }
}
