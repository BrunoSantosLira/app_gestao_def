<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OS;
use App\Models\Contrato;

class Clientes extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email', 'CPF/CNPJ', 'telefone', 'logradouro', 'logradouroNumero', 'complemento', 'bairro', 'cidade', 'UF', 'CEP', 'rg'];

    public function os()
    {
        return $this->hasMany(OS::class);
    }
    public function contrato()
    {
        return $this->hasMany(Contrato::class);
    }
}
