<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VigilanteViewController extends Controller
{
    
    public function index(){
        return view('vigilante.home');
    }

    public function entradaEstudiante(){
        return view('vigilante.referencia.entrada');
    }

    public function salidaEstudiante(){
        return view('vigilante.referencia.salida');
    }

    public function entradaExterno(){
        return view('vigilante.externo.entrada');
    }

    public function salidaExterno(){
        return view('vigilante.externo.salida');
    }

}