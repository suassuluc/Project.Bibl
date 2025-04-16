<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Constante;
use App\Models\Localizacao;
use App\Models\Acervo;

class PageAcervo extends Component
{
    public $assuntos;
    public $idiomas;
    public $tipos;
    public $localizacoes;

    // input
    public $titulo;
    public $nome_autor;
    public $tipo;
    public $localizacao_id;
    public $resenha;
    public $Local_publicacao;
    public $editora;
    public $ano;
    public $numero_pag;
    public $volume;
    public $ISBN;
    public $ISSN;
    public $numero_reg;
    public $numero_cart;
    public $assunto;
    public $aquisicao;
    public $CDD;
    public $CDU;
    public $idioma;
    public $exemplares;

    public function mount()
    {
        $this->assuntos = Constante::where('constante', 'Assunto')->orderBy('nome')->get();
        $this->idiomas = Constante::where('constante', 'Idioma')->get();
        $this->tipos = Constante::where('constante', 'Tipologia')->get();
        $this->localizacoes = Localizacao::all();
    }

    public function updatedAssunto($value)
    {
        \Log::info('Assunto selecionado: ' . $value);

        if ($value) {
            $assuntoSelecionado = Constante::find($value);
            if ($assuntoSelecionado) {
                $this->CDU = $assuntoSelecionado->codigo;
                \Log::info('CDU preenchido: ' . $this->CDU);
            } else {
                $this->CDU = null;
                \Log::info('Assunto não encontrado para ID: ' . $value);
            }
        } else {
            $this->CDU = null;
            \Log::info('Nenhum assunto selecionado, CDU limpo.');
        }
    }
    public function save()
    {
        $validatedData = $this->validate([
            'titulo' => 'required|min:5',
            'nome_autor' => 'required',
            'tipo' => 'required',
            'localizacao_id' => 'required',
            'resenha' => 'required',
            'Local_publicacao' => 'required',
            'editora' => 'required',
            'ano' => 'required',
            'numero_pag' => 'required',
            'volume' => 'required',
            'ISBN' => 'required',
            'ISSN' => 'required',
            'numero_reg' => 'required',
            'numero_cart' => 'required',
            'assunto' => 'required',
            'aquisicao' => 'required',
            'CDD' => 'required',
            'CDU' => 'required',
            'idioma' => 'required',
            'exemplares' => 'required',
        ]);

        $acervo = Acervo::create($validatedData);

        // // Lógica para salvar o arquivo, caso exista
        // if ($this->arquivos) {
        //     $filePath = $this->arquivos->store('files', 'public');
        //     $acervo->arquivos = $filePath;
        //     $acervo->save();
        // }

        session()->flash('success', 'Acervo cadastrado com sucesso!');
        return redirect()->route('acervo.create');
    }
    public function render()
    {
        return view('livewire.pageacervo');
    }
}
