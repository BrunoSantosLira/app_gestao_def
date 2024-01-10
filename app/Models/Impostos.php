<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produtos;

class Impostos extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'aliquota', 'produto_id'];

    
    public function produto()
    {
        return $this->belongsTo(Produtos::class,  'produto_id', 'id');
    }

}
