<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    public function agregarTutor(){
        return view('admin.tutor.agregar');
    }

    public function gestionarTutores(){
        return view('admin.tutor.gestionar');
    }

    public function agregarEstudiante(){
        return view('admin.estudiante.agregar');
    }

    public function gestionarEstudiantes(){
        return view('admin.estudiante.gestionar');
    }

    public function agregarVigilante(){
        return view('admin.vigilante.agregar');
    }

    public function gestionarVigilantes(){
        return view('admin.vigilante.gestionar');
    }

    public function agregarGrado(){
        return view('admin.grado.agregar');
    }

    public function gestionarGrados(){
        return view('admin.grado.gestionar');
    }

    public function agregarGrupo(){
        return view('admin.grupo.agregar');
    }

    public function gestionarGrupos(){
        return view('admin.grupo.gestionar');
    }

}