<?php

namespace App\Http\Controllers;

use App\Models\Localizacao;
use Illuminate\Http\Request;
use App\Models\Acervo;
use App\Models\Constante;
use Illuminate\Support\Facades\Validator;

class AcervController extends Controller
{
    public function create()
    {
        $assuntos = Constante::where('constante', 'Assunto')->get();
        $idiomas = Constante::where('constante', 'Idioma')->get();
        $tipos = Constante::where('constante', 'Tipografia')->select('nome', 'id', 'arquivos')->get();
        $localizacoes =Localizacao::all();
        return view('acervo.create', [
            'assuntos' => $assuntos,
            'idiomas' => $idiomas,
            'tipos' => $tipos,
            'localizacoes' => $localizacoes,
        ]);
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tipo' => 'required',
        ], [
            'tipo.required' => 'O campo tipo é obrigatório.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('acervo.create')
                ->withErrors($validator)
                ->withInput();
        }

        $tipo = $request->input('tipo');


        $rules = [
            'titulo' => 'required',
            'resenha' => 'required',
        ];

        if ($tipo == 'Livro') { // Livro
            $rules = array_merge($rules, [
                'nome_autor' => 'required',
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
        } elseif ($tipo == 'PDF') {
            $rules = array_merge($rules, [
            ]);
        } elseif ($tipo == 'DVD') {
            $rules = array_merge($rules, [
            ]);
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tipo = Constante::where('constante', 'Tipografia')
            ->where('nome', $request->input('tipo'))
            ->value('nome');

        if (!$tipo) {
            return redirect()->route('acervo.create')
                ->withErrors(['tipo' => 'Tipo inválido'])
                ->withInput();
        }

        $acervoData = $request->only([
            'tipo',
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
            'resenha',
            'arquivos',
        ]);

        $acervoData['tipo'] = $tipo;
        $acervo = Acervo::create($acervoData);


        if ($request->hasFile('arquivos')) {
            $this->store_file($request, $acervo->id, 'arquivos');

        }

        return redirect()->route('acervo.create')->with('success', 'Acervo cadastrado com sucesso!');
    }


    public function store_file(Request $request, $id, $fieldName)
    {
        $caminho = 'files/';
        $name = $request->$fieldName->hashName();
        $acervo = Acervo::find($id);
        $filePath = 'storage/files/' . $name;
        $acervo->$fieldName = $filePath;
        $acervo->save();

        $request->$fieldName->storeAs('files', $name);
    }

    public function edit($id)
    {

        $acervo = Acervo::find($id);

        if (!$acervo) {
            return redirect()->route('acervo.create')->with('error', 'Item não encontrado.');
        }

        $assuntos = Constante::where('constante', 'Assunto')->get();
        $idiomas = Constante::where('constante', 'Idioma')->get();
        $tipos = Constante::where('constante', 'Tipografia')->select('nome', 'id', 'arquivos')->get();
        $localizacoes =Localizacao::all();

        return view('acervo.edit', [
            'acervo' => $acervo,
            'assuntos' => $assuntos,
            'idiomas' => $idiomas,
            'tipos' => $tipos,
            'localizacoes' => $localizacoes,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome_autor' => 'required',
            'titulo' => 'required',
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
            'resenha.required' => 'A resenha é obrigatória.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $acervo = Acervo::find($id);

        if (!$acervo) {
            return redirect()->route('acervo.create')->with('error', 'Item não encontrado.');
        }

        $acervo->update($request->all());

        return redirect()->route('acervo.create')->with('success', 'Item atualizado com sucesso!');
    }

    public function show()
    {
        return view('acervo.show');
    }

    public function destroy($id)
    {
        $acervo = Acervo::find($id);

        if ($acervo) {
            $acervo->delete();
            return redirect()->route('home.index')->with('success', 'Item excluído com sucesso!');
        }

        return redirect()->route('home.index')->with('error', 'Item não encontrado.');
    }
}
