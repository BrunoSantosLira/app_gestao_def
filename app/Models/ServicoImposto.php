<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;
use App\Models\ServicoCategoria;

class ServicoImposto extends Model
{
    use HasFactory;
    protected $table = 'servico_impostos';
    protected $fillable = ['servico_id', 'nome', 'aliquota', 'categoria_id'];

        
    public function servico()
    {
        return $this->belongsTo(Servico::class,  'servico_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo(ServicoCategoria::class,  'categoria_id', 'id');
    }

}
