<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;
use App\Models\Campo;

class Checklist extends Model
{
    use HasFactory;
    protected $fillable = ['servico_id', 'nome'];

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }

    public function campos()
    {
        return $this->hasMany(Campo::class);
    }
}
