<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $request)
    {
        /*$usuario = Usuario::where([
            'correo' => $request->correo, 
            'clave' => md5($request->clave)
        ])->first();*/
        $data = $request->validate([
            'correo' => 'required|email|max:120',
            'clave' => 'required',
        ]);
        if(Auth::attempt(['correo' => $request->correo, 'password' => $request->clave], false)){
            return response()->json('Has iniciado sesión', 200);
        }else{
            return response()->json(['errors' => ['login' => ['Correo y/o contraseña incorrectos']]], 422);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

}
