<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OS;

class OSParcelas extends Model
{
    use HasFactory;
    protected $table = "os_parcelas";
    protected $fillable = ['os_id', 'valor',  'data_vencimento',  'status_pagamento'];

    public function os()
    {
        return $this->belongsTo(OS::class,  'os_id', 'id');
    }

}
