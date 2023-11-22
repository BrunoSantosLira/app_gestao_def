<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Checklist;

class Campo extends Model
{
    use HasFactory;
    protected $fillable = ['checklist_id', 'nome', 'concluida'];


    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }
}
