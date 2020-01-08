<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$usuarios = Usuario::all();
        //return view('login')->with('usuarios', $usuarios);
        //return view('login')->with(['usuarios' => $usuarios]);
        //return view('login', ['usuarios' => $usuarios]);
        //return view('login', compact('usuarios'));
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = new Usuario;
        $usuario->correo = "ejemplo@gmail.com";
        $usuario->clave = md5('password');
        $usuario->tipo_usuario = 1;
        $usuario->estatus = 1;
        $usuario->save();
        return 'AGREGADO';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Eliminar
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return 'ELIMINADO';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        //$usuario = Usuario::where('correo', $id)->firstOrFail();
        //$usuario = Usuario::where('correo', '=', $id)->firstOrFail();
        $usuario->correo = "update@gmail.com";
        $usuario->save();
        return 'ACTUALIZADO';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
