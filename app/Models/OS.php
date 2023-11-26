<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;
use App\Models\Clientes;
use App\Models\Produtos;
use App\Models\OsProdutos;

class OS extends Model
{
    use HasFactory;
    protected $table = 'os';
    protected $fillable = ['nome', 'servico_id', 'cliente_id', 'produto_id', 'responsavel', 'observacoes', 'status','data_inicial','data_final','dias_garantia', 'valorTotal'];


    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
    }

    public function os_produtos()
    {
        return $this->hasMany(OsProdutos::class, 'os_id');
    }

}