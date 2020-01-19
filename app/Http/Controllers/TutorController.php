<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\Usuario;
use App\Http\Requests\TutorRequest;

class TutorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TutorRequest $request)
    {
        $usuario = Usuario::create([
            'correo' => $request->correo,
            'clave' => bcrypt($request->telefono),
            'tipo_usuario' => 3,
            'estatus' => 1
        ]);
        $tutor = $usuario->tutor()->create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono
            //'correo' => $usuario->correo
        ]);
        return response()->json('OK', 200);
        /*return response()->json([
            'errors' => ['
                tutor' => [
                    'Error al agregar tutor. Vuelva a intentarlo más tarde'
                ]
            ]
        ], 422);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
