<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OS;
use App\Models\Contrato;
use App\Models\ChecklistProdutos;

class Vendas extends Model
{
    use HasFactory;
    protected $fillable = ['os_id', 'contrato_id', 'valor', 'tipo', 'checklist_id'];

    public function os()
    {
        return $this->belongsTo(OS::class, 'os_id');
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }

    
    public function checklist()
    {
        return $this->belongsTo(ChecklistProdutos::class, 'checklist_id')->optional();
    }
}
