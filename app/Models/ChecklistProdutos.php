<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CamposProduto;

class ChecklistProdutos extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao'];

    public function campos_produto()
    {
        return $this->hasMany(CamposProduto::class, 'checklist_id');
    }
    
}
