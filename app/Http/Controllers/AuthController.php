<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $usuario = DB::table('usuarios')->where('email', $request->email)->first();

        if ($usuario && $usuario->password === $request->password) {
            Session::put('usuario_id', $usuario->id_usuario); 

            return redirect()->route('index');
        } else {
            return back()->withErrors(['email' => 'Credenciales incorrectas.']);
        }
    }

    public function logout()
    {
        Session::forget('usuario_id');
        
        return redirect()->route('login');
    }

}
