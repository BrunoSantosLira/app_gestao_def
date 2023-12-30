<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChecklistProdutos;
use App\Models\Produtos;

class CamposProduto extends Model
{
    use HasFactory;
    protected $fillable = ['detalhes', 'checklist_id', 'produto_id'];

    public function checklist_produto()
    {
        return $this->belongsTo(ChecklistProdutos::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produtos::class);
    }
}
