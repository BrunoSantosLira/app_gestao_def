<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OS;
use App\Models\Contrato;

class Vendas extends Model
{
    use HasFactory;
    protected $fillable = ['os_id', 'contrato_id', 'valor', 'tipo'];

    public function os()
    {
        return $this->belongsTo(OS::class, 'os_id');
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }
}
