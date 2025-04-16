<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acervo extends Model
{
    use HasFactory;
    protected $table = 'acervo';

    protected $fillable = [
        'nome_autor',
        'titulo',
        'Local_publicacao',
        'editora',
        'ano',
        'numero_pag',
        'volume',
        'ISBN',
        'ISSN',
        'numero_reg',
        'numero_cart',
        'assunto',
        'aquisicao',
        'CDD',
        'CDU',
        'idioma',
        'exemplares',
        'arquivos',
        'resenha',
        'tipo',
        'destino',
        'observacao',
        'localizacao_id',
    ];

    public function assunto()
    {
        return $this->belongsTo(Constante::class, 'assunto');
    }

    public function idioma()
    {
        return $this->belongsTo(Constante::class, 'idioma');
    }

    public function tipo()
    {
        return $this->belongsTo(Constante::class, 'tipo');
    }

    public function localizacao()
    {
        return $this->belongsTo(Localizacao::class, 'localizacao_id', 'id');
    }

    public function movimentacoes()
{
    return $this->hasMany(Movi::class, 'acervo_id');
}


}
