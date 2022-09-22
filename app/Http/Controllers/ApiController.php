<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function users(Request $request){
        // filtrar por parámetro de activo
        if($request->has('active')){
            $users = User::where('active', true)->get();
        }else{
            // obtiene todos los registros de la tabla users
            $users = User::all();
        }
        // devolver como json
        return response()->json($users);
    }

    public function login(Request $request){
        
        // mensaje de error o exito
        $reponse = ["status" => 0, "msg" => ""];
        
        $data = json_decode($request->getContent());

        $user = User::where('email', $data->email)->first();

        if($user){
            if(Hash::check($data->password, $user->password )){
                $token = $user->createToken("example");
                $reponse["status"] = 1;
                $reponse["msg"] = $token->plainTextToken;
            }else{
                $reponse["msg"] = "Credenciales incorrectas";
            }
    
        }else{
            $reponse["msg"] = "Ususario no encontrado";
        }


        return response()->json($reponse);
    }
}
