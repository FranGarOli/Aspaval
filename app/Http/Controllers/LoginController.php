<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//validacion del formulario de registro
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    //saca el formulario de registro
    public function registerForm()
    {
        //si está logueado no puede acceder al formulario de registro.
        if(auth()->check()){
            return redirect(route('inicio'));
        }else{
            return view('auth.register');
        }
    }

    //recibe datos del formulario de registro
    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->username = $request->get('username');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->birthday = $request->get('birthday');
        $user->twitter = $request->get('twitter');
        $user->instagram = $request->get('instagram');
        $user->twitch = $request->get('twitch');

        if($request->hasFile('image')){
            $archivo = $request->file('image');
            $destino = 'img/perfiles/';
            $nombreArchivo = $request->get('username').'.png';
            $subidaExitosa = $archivo->move($destino, $nombreArchivo);
        }

        $user->save();

        Auth::login($user);

        return redirect()->route('inicio');
    }

    //saca el formulario de login
    public function loginForm()
    {
        //si está logueado no puede acceder al formulario de iniciar sesión.
        if(auth()->check()){
            return redirect(route('inicio'));
        }else{
            return view('auth.login');
        }
    }

    //recibe datos del formulario login
    public function login(Request $request)
    {
        $credenciales = $request->only('username', 'password');

        //comprueba que las credenciales existen y coinciden con las de la bd
        if(Auth::guard('web')->attempt($credenciales))
        {
            //si se autentifica
            $request->session()->regenerateToken();
            return redirect()->route('inicio');
        }else {
            $error = 'Error al acceder a la aplicación.';
            return view('auth.login', compact('error'));
        }
    }

    //cierra sesión
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('auth.login');
    }
}
