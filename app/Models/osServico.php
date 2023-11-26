<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OS;
use App\Models\Servico;


class osServico extends Model
{
    use HasFactory;
    protected $table = 'os_servicos';
    protected $fillable = ['os_id','servico_id', 'preco', 'quantidade'];


    public function os()
    {
        return $this->belongsTo(OS::class);
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
