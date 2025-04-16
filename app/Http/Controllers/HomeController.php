<?php

namespace App\Http\Controllers;
use App\Models\Acervo;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $itens = Acervo::with('tipo', 'assunto', 'idioma')->distinct()->get();
        $acervo = Acervo::paginate();
        return view('welcome',['acervo'=> $acervo,'itens'=>$itens]);
    }

}
