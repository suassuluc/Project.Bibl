<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Acervo;
use Illuminate\Support\Facades\Session;

class CreateRelatorio extends Component
{

    // public $results; // Resultados da pesquisa

    public $ids =[];
    public $acervos = [];


    public function mount($ids)
    {
        $this->ids = explode(',', $ids);
        $this->acervos = Acervo::with('localizacao')->whereIn('id', $this->ids)->get();

        if (!$this->acervos) {
            abort(404, 'Registro não encontrado.');
        }
    }
    public function render()
    {
        return view('livewire.create-relatorio', [
            'acervos' => $this->acervos, // Envia os dados para a view
        ]);
    }
}
