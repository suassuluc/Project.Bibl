<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movi extends Model
{
    use HasFactory;

    protected $table = 'movimentacoes';

    protected $fillable = [
        'acervo_id',
        'exmp_ats',
        'exmp_dp',
        'tipo_mvt',
        'destino',
        'observacao',
    ];

    public function acervo()
    {
        return $this->belongsTo(Acervo::class, 'acervo_id');
    }
}
