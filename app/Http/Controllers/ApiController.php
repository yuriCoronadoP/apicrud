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
        
        // crea variable que guarda status y msj y lo inicializa como error
        $reponse = ["status" => 0, "msg" => ""];
        
        // decodifica el contenido del request enviado con la contraseña y email
        $data = json_decode($request->getContent());

        // consulta en bd si existe el email
        $user = User::where('email', $data->email)->first();

        // si existe 
        if($user){
            // desencripta y evalua si el password indicado por el usuario coincide con el de bd
            if(Hash::check($data->password, $user->password )){
                // crea token
                $token = $user->createToken("example");
                // guarda mensjae de exito
                $reponse["status"] = 1;
                $reponse["msg"] = $token->plainTextToken;
            }else{
                // de lo contrario guarda mensaje de error
                $reponse["msg"] = "Credenciales incorrectas";
            }
        // si el usr no existe
        }else{
            $reponse["msg"] = "Ususario no encontrado";
        }

        
        return response()->json($reponse);
    }
}
