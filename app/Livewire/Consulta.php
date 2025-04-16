<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Acervo;
use App\Models\Caixa;
use App\Models\Localizacao;
use Illuminate\Support\Facades\Session;

class Consulta extends Component
{
    public $parameter = ''; // Tipo de pesquisa (acervo, caixa, estante)
    public $query = ''; // Consulta específica (ex.: título, nome, número)
    public $year = ''; // Ano do filtro
    public $results = []; // Resultados da pesquisa

    public function updatedParameter()
    {
        $this->query = ''; // Limpa o campo de consulta ao mudar o tipo
        $this->year = ''; // Limpa o ano ao alterar o tipo
        $this->results = []; // Limpa os resultados ao alterar o tipo de pesquisa
    }

    public function search()
{
    // Validação básica
    $this->validate([
        'parameter' => 'required',
    ]);

    // Lógica para buscar resultados
    if ($this->parameter === 'acervo') {
        $query = Acervo::query();

        // Filtra pelo título, se fornecido
        if (!empty($this->query)) {
            $query->where('titulo', 'like', "%{$this->query}%");
        }

        // Filtra pelo ano, se fornecido
        if (!empty($this->year)) {
            $query->where('ano', $this->year);
        }

        $this->results = $query->get();
    } elseif ($this->parameter === 'caixa') {
        $query = Caixa::query();

        if (!empty($this->query)) {
            $query->where('nome', 'like', "%{$this->query}%");
        }

        $this->results = $query->get();
    } elseif ($this->parameter === 'estante') {
        $query = Localizacao::query();

        if (!empty($this->query)) {
            $query->where('estante', 'like', "%{$this->query}%");
        }

        $this->results = $query->get();
    }

    Session::put('relatorio_results', $this->results);

}

    public function render()
    {
        return view('livewire.consulta', ['assuntos' => Acervo::distinct('assunto')->pluck('assunto'), // Lista de assuntos
        ]);
    }
}
