<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constante;

class ConstanteController extends Controller
{
    public function index()
    {

        $cons = Constante::all();
        return view('constante.index', ['cons' => $cons]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $tipoConstante = $request->input('constante');
        $ultCod = Constante::where('constante', $tipoConstante)->max('codigo');
        $nvCod = ($ultCod ?? 0) + 1;

        Constante::create([
            'nome' => $request->nome,
            'constante' => $request->constante,
            'codigo' => $nvCod,
            'aceita_arquivos' => $request->has('aceita_arquivos'),
        ]);

        return redirect()->route('constante.index')->with('success', 'Constante criada com sucesso!');

    }

    public function toggleStatus($id)
    {
        $cons = Constante::findOrFail($id);
        $cons->status = !$cons->status;
        $cons->save();

        return response()->json(['success' => 'Status atualizado com sucesso!']);
    }

    public function toggleArquivos($id)
    {
        $cons = Constante::findOrFail($id);
        $cons->arquivos = !$cons->arquivos;
        $cons->save();

        return response()->json(['success' => 'Arquivos Habilitados com sucesso!']);
    }
    public function filtrarConstante(Request $request)
    {
        $cons = $request->constante;
        $constantes = Constante::where('constante', $cons)->get();

        return response()->json($constantes);
    }

}
