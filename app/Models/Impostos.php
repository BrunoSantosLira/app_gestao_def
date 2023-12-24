<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impostos extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'aliquota'];
}
