<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localizacao;

class LocalizacaoController extends Controller
{
    public function create(){
        $localizacao = Localizacao::paginate(10);
        return view('localizacao.create', ['localizacao'=>$localizacao]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'estante' => 'required|string|max:255',
            'prateleira' => 'required|string|max:255',
        ]);

        Localizacao::create([
            'estante' => $request->estante,
            'prateleira' => $request->prateleira,
        ]);

        return redirect()->route('localizacao.create')->with('success', 'Estante criada com sucesso!');
    }

    public function edit($id)
    {
        $localizacao = Localizacao::find($id);

        if (!$localizacao) {
            return redirect()->route('localizacao.create')->with('error', 'Item não encontrado.');
        }

        return view('localizacao.edit', compact('localizacao'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'estante' => 'required|string|max:255',
            'prateleira' => 'required|string|max:255',
        ]);

        $localizacao = Localizacao::findOrFail($id);
        $localizacao->update([
            'estante' => $request->estante,
            'prateleira' => $request->prateleira,
        ]);

        return redirect()->route('localizacao.create')->with('success', 'Estante/Prateleira atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $localizacao = Localizacao::find($id);

        if ($localizacao) {
            $localizacao->delete();
            return redirect()->route('localizacao.create')->with('success', 'Item excluído com sucesso!');
        }

        return redirect()->route('localizacao.create')->with('error', 'Item não encontrado.');
    }
}
