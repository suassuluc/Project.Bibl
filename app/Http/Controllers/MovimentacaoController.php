<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public function index(){
        return view('movimentacao.index');
    }
}
