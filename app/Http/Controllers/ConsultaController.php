<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acervo;
use App\Models\Caixa;
use App\Models\Localizacao;


class ConsultaController extends Controller
{
    public function index()
    {
        $consulta = collect();
        $parameter = null;

        return view('consulta.index', compact('consulta', 'parameter'));
    }

    public function search(Request $request)
    {
        $parameter = $request->parameter;

        $consulta = collect();

        if ($parameter == 'acervo') {
            $consulta = Acervo::where('titulo', 'LIKE', '%' . $request->titulo . '%')->get();
        } elseif ($parameter == 'caixa') {
            $consulta = Caixa::where('nome', 'LIKE', '%' . $request->nome . '%')->get();
        } elseif ($parameter == 'estante') {
            $consulta = Localizacao::where('estante', 'LIKE', '%' . $request->estante . '%')->get();
        }
        return view('consulta.index', compact('consulta', 'parameter'));
    }
}
