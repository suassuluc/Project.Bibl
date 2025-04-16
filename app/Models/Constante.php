<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constante extends Model
{
    protected $table ='constante';

    protected $fillable = [
        'status',
        'nome',
        'codigo',
        'constante',

    ];
}
