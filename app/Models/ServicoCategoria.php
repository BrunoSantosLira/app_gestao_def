<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;
use App\Models\ServicoImposto;

class ServicoCategoria extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    public function servico()
    {
        return $this->hasMany(Servico::class);
    }

    public function imposto()
    {
        return $this->hasMany(ServicoImposto::class, 'categoria_id', 'id');
    }

}
