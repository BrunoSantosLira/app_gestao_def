<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OS;
use App\Models\Produtos;

class osProdutos extends Model
{
    use HasFactory;
    protected $table = 'os_produtos';
    protected $fillable = ['os_id','produto_id', 'preco', 'quantidade','valorTotal'];

    public function os()
    {
        return $this->belongsTo(OS::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produtos::class);
    }

}
