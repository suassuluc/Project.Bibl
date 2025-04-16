<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Acervo;

class DetalhesPage extends Component
{
    public $acervoId;
    public $detalhesAcervo;

    public function mount($id)
    {
        $this->acervoId = $id;
        $this->detalhesAcervo = Acervo::with('localizacao')->findOrFail($id);
    }
    public function render()
    {
        return view('livewire.detalhes-page',[
            'detalhes' =>$this->detalhesAcervo,
        ]);
    }
}
