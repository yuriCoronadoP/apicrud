<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importamos modelo de usuario
use App\Models\User;
// importamos para encrpatar contraseñas
use Illuminate\Support\Facades\Hash;
// importamos para verificar autorizacion
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request){
        // validar los datos (pendiente)

        // creamos el usuario con el modelo
        $user = new User();
        // asignamos el nombre, correo y pass
        $user->name = $request->name;
        $user->email = $request->email;
        // ciframos la contraseña
        $user->password = Hash::make($request->password);

        // guardamos en BD
        $user->save();

        // autenticar el usuario
        Auth::login($user);
        // redirigimos a la pantalla privada
        return redirect(route('privada'));

    }

    public function login(Request $request){
        
        // dd(route('privada'));
        // validacion de datos

        $credentials = $request->only([
            "email",
            "password",
            "active"
        ]);

        // mantener sesion iniciada
        $remember = ($request->has('remember') ? true : false);
        
        // intento de inicio de sesion
        if(Auth::attempt($credentials,$remember)){
            // si los datos son correctos
            // prepara la sesion
            $request->session()->regenerate();
            // redirige a la ruta que se havbia intentado acceder o bien a una por defecto
            return redirect()->intended(route('privada'));

        }else{
            return redirect('login');
        }

    }

    public function logout(Request $request){
        // Usamos la funcion auth
        Auth::logout();
        // resetear la sesion
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //redirigir al login
        return redirect(route('login'));
    }
}
