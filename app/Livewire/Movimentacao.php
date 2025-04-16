<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Acervo;
use App\Models\Constante;
use App\Models\Movi;

class Movimentacao extends Component
{
    public $titulo;
    public $exemplares_at;
    public $nv_exemplares;
    public $motivo;
    public $tipo;
    public $tipos;
    public $observacao;
    public $destino;

    protected $rules = [
        'titulo' => 'required',
        'nv_exemplares' => 'required|integer|min:0',
        'observacao' => 'required|string',
        'destino' => 'required|string',
    ];

    public function mount()
    {
        $this->tipos = Constante::where('constante', 'Tipografia')->select('nome', 'id', 'arquivos')->get();
    }

    public function buscarLivro()
    {
        $livro = Acervo::where('titulo', $this->titulo)
            ->where('tipo', $this->tipo)
            ->first();

        if ($livro) {
            $this->exemplares_at = $livro->exemplares;
        } else {
            $this->reset(['exemplares_at']);
            session()->flash('error', 'Livro não encontrado');
        }
    }

    public function atualizarExemplares()
    {
        $this->validate();

        $livro = Acervo::where('titulo', $this->titulo)->first();

        if ($livro) {
            Movi::create([
                'acervo_id' => $livro->id,
                'exmp_ats' => $livro->exemplares,
                'exmp_dp' => $this->nv_exemplares,
                'observacao' => $this->observacao,
                'destino' => $this->destino,
                'tipo_mvt' => $this->tipo,
            ]);

            $livro->exemplares = $this->nv_exemplares;
            $livro->save();

            $this->reset(['nv_exemplares', 'motivo']);
            session()->flash('success', 'Número de exemplares atualizado com sucesso!');
        } else {
            session()->flash('error', 'Acervo não encontrado');
        }
    }

    public function render()
    {
        $movimentacoes = Movi::with('acervo')->get();

    return view('livewire.movimentacao', compact('movimentacoes'));
    }
}
