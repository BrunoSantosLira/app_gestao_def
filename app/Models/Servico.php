<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Checklist;

class Servico extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
}
