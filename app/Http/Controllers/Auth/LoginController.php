<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Tenta autenticar o usuário
        if (Auth::attempt($request->only('email', 'password'))) {    
            // Redireciona conforme o papel do usuário
            $role = Auth::user()->role;
    
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'professor') {
                return redirect()->route('professor.dashboard');
            }
        }
    
        // Retorna com erro se a autenticação falhar
        return back()->withErrors([
            'email' => 'Credenciais inválidas, por favor tente novamente.'
        ]);
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}