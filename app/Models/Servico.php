<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Checklist;
use App\Models\OS;
use App\Models\osServico;

class Servico extends Model
{
    use HasFactory;
    protected $fillable = ['nome','preco','descricao'];

    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
    public function os()
    {
        return $this->hasMany(OS::class);
    }

    public function os_servico()
    {
        return $this->hasMany(osServico::class, 'servico_id');
    }
}
