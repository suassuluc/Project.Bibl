<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class Caixa extends Model
{
    protected $table ='caixa';

    protected $fillable =[
        'nome',
        'resumo',
        'status',
        'localizacao_id'
    ];

    public function localizacao()
    {
        return $this-> BelongsTo(Localizacao::class);
    }

}
