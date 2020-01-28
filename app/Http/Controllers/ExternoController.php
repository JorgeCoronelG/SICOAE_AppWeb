<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Externo;

class ExternoController extends Controller
{

    public function input(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:120',
            'telefono' => 'required|string|max:10',
            'personas' => 'required|min:1|max:99',
            'motivo' => 'required|string',
        ]);
        Externo::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'fecha' => date('Y/m/d'),
            'motivo' => $request->motivo,
            'personas' => $request->personas,
            'hora_entrada' => date('G:i:s'),
            'hora_salida' => null
        ]);
        return response()->json('OK', 200);
    }

    public function output($id){
        $externo = Externo::find($id);
        if($externo != null){
            $externo->hora_salida = date('G:i:s');
            $externo->save();
            return response()->json('OK', 200);
        }else{
            return response()->json(['errors' => ['externo' => ['No se encontraron registros']]]);
        }
    }

    public function findAll(){
        $externos = Externo::all();
        $arrExternos = array();
        foreach($externos as $externo){
            $externo->fecha = date('d/m/Y', strtotime($externo->hora_entrada));
            $externo->hora_entrada = date('h:i a', strtotime($externo->hora_entrada));
            if($externo->hora_salida != null)
                $externo->hora_salida = date('h:i a', strtotime($externo->hora_salida));
            $arrExternos[] = $externo;
        }
        return response()->json($arrExternos);
    }

    public function findAllWithoutOutput(){
        $externos = Externo::where('hora_salida', null)->get();
        $arrExternos = array();
        foreach($externos as $externo){
            $externo->fecha = date('d/m/Y', strtotime($externo->hora_entrada));
            $externo->hora_entrada = date('h:i a', strtotime($externo->hora_entrada));
            if($externo->hora_salida != null)
                $externo->hora_salida = date('h:i a', strtotime($externo->hora_salida));
            $arrExternos[] = $externo;
        }
        return response()->json($arrExternos);
    }

}