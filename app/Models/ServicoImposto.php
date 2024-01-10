<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;

class ServicoImposto extends Model
{
    use HasFactory;
    protected $table = 'servico_impostos';
    protected $fillable = ['servico_id', 'nome', 'aliquota'];

        
    public function servico()
    {
        return $this->belongsTo(Servico::class,  'servico_id', 'id');
    }

}
