<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function users(Request $request){
        // obtiene todos los registros de la tabla users
        $users = User::all();
        // devolver como json
        return response()->json($users);
    }

    public function login(Request $request){

    }
}
