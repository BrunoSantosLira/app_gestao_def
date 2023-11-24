<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OS;

class Clientes extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email', 'CPF/CNPJ', 'telefone', 'localizacao'];

    public function os()
    {
        return $this->hasMany(OS::class);
    }
}
