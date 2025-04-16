<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    protected $table = 'localizacao';

    protected $fillable =[
        'prateleira',
        'estante',
        'status',
    ];

    public function caixas()
    {
        return $this->hasMany(Caixa::class);
    }
}
