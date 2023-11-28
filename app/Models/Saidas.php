<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produtos;

class Saidas extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id', 'tipo', 'quantidade'];

    public function produto()
    {
        return $this->belongsTo(Produtos::class);
    }
}
