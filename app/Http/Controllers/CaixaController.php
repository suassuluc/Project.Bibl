<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caixa;
use App\Models\Localizacao;

class CaixaController extends Controller
{
    public function create()
    {
        $caixa = Caixa::with('localizacao')->get();
        $localizacoes = Localizacao::all();
        return view('caixa.create', ['caixa' => $caixa, 'localizacoes' => $localizacoes]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'resumo' => 'required|string|max:255',
            'localizacao_id' => 'required|exists:localizacao,id'
        ]);

        Caixa::create([
            'nome' => $request->nome,
            'resumo' => $request->resumo,
            'localizacao_id' => $request->localizacao_id,
        ]);

        return redirect()->route('caixa.create')->with('success', 'Caixa criada com sucesso!');
    }

    public function edit($id)
    {
        $caixa = Caixa::with('localizacao')->findOrFail($id);
        $localizacoes = Localizacao::all();
        if (!$caixa) {
            return redirect()->route('caixa.create')->with('error', 'Item não encontrado.');
        }

        return view('caixa.edit', compact('caixa', 'localizacoes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'resumo' => 'required|string|max:255',
            'localizacao_id' => 'required|exists:localizacao,id'
        ]);

        $caixa = Caixa::findOrFail($id);
        $caixa->update([
            'nome' => $request->nome,
            'resumo' => $request->resumo,
            'localizacao_id' => $request->localizacao_id,
        ]);

        return redirect()->route('caixa.create')->with('success', 'Estante/Prateleira atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $caixa = Caixa::find($id);

        if ($caixa) {
            $caixa->delete();
            return redirect()->route('caixa.create')->with('success', 'Item excluído com sucesso!');
        }

        return redirect()->route('caixa.create')->with('error', 'Item não encontrado.');
    }

    public function toggleStatus($id)
    {
        $caixa = Caixa::findOrFail($id);

        // Alternar o valor de status (se for true vira false, e vice-versa)
        $caixa->status = !$caixa->status;
        $caixa->save();

        return response()->json(['success' => 'Status atualizado com sucesso!']);
    }

}
