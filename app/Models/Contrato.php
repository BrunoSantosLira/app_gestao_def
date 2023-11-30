<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;

class Contrato extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'nome', 'responsável', 'corpo', 'data_inicio', 'data_fim', 'metodo_de_pagemento', 'quantidade_parcelas', 'valorTotal', 'status'];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
    }

}
