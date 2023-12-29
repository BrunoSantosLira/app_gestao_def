<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistProdutos extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao'];
}
