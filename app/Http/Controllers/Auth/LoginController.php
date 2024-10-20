<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login-app'); // Aquí se cargará tu vista de login
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa, redirigir al dashboard
            return redirect()->intended('dashboard');
        }

         // Si las credenciales son incorrectas, redirige de vuelta al login con un mensaje de error
         return redirect()->back()->with('error', 'Credenciales incorrectas. Inténtelo de nuevo.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
