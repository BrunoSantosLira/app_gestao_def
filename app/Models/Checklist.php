<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;

class Checklist extends Model
{
    use HasFactory;
    protected $fillable = ['servico_id', 'nome'];

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
