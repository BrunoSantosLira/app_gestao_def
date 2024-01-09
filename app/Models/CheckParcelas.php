<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChecklistProdutos;

class CheckParcelas extends Model
{
    use HasFactory;
    protected $table = 'check_parcelas';
    protected $fillable = ['checklist_id', 'valor', 'data_vencimento', 'status_pagamento'];

    public function checklist()
    {
        return $this->belongsTo(ChecklistProdutos::class,  'checklist_id', 'id');
    }
}
