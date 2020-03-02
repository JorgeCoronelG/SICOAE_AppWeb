<?php

namespace App\Http\Controllers\webservices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Token;

class TokenController extends Controller
{

    public function update(Request $request){
        $token = Token::find($request->id);
        if($token != null){
            $token->token = $request->token;
            $token->save();
            return response()->json([
                'code' => 4
            ], 200);
        }else{
            return response()->json([
                'error' => 'Error al actualizar token',
                'code' => 404
            ], 200);
        }
    }

    public function delete($id){
        $token = Token::find($id);
        if($token != null){
            $token->token = '';
            $token->save();
            return response()->json([
                'code' => 2
            ], 200);
        }else{
            return response()->json([
                'error' => 'Error al actualizar token',
                'code' => 404
            ], 200);
        }
    }

}