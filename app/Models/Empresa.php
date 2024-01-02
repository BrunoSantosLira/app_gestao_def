<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = ['cnpj', 'razao_social', 'nome_fantasia', 'ie', 'cep', 'logradouro', 'numero', 'complemento', 'bairro', 'uf', 'municipio', 'fone'];
}
