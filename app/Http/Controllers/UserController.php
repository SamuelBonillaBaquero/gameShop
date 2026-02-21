<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function ViewiniciarSesion() {
        return view('login');
    }

    public function Viewregistrar() {
        return view('register');
    }

    public function register(Request $request) {


        $validated = $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'direccion' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email debe ser un email valido',
            'email.unique' => 'El email ya existe',
            'direccion.required' => 'El campo direccion es obligatorio',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.confirmed' => 'Las contraseñas deben coincidir',
            'password_confirmation.required' => 'Debe repetir la contraseña'
        ]);



        User::create($validated);

        Session::flash('mensage', '¡Tarea completada con éxito!');

        return redirect()->route('user.ViewiniciarSesion');
    }

    public function iniciarSesion(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email obligatorio',
            'email.email' => 'El usuario debe ser un email',
            'password.required' => 'Password obligatoria',
        ]);

        //dd($credentials);

        if(Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect()->route('game.index');

        } else {
            Session::flash('mensageError', 'Fallo al iniciar sesion');
            return redirect()->route('user.ViewiniciarSesion');
        }

    }

    public function cerrarSesion(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('game.index');

    }

}
