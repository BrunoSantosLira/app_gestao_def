<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    use HasFactory;
    protected $fillable = ['nome_fantasia', 'razao_social', 'cnpj', 'endereco', 'contato', 'email', 'telefone_fixo', 'telefone_celular', 'whatsapp'];
}
