<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (!$user) {
            return redirect()->back()->with('error', 'Falha ao cadastrar o usuário');
        }

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso. Faça o login.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('pontos.entrada.create');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
            'password' => 'Senha incorreta'
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if (!$user->isAdmin() || ($user->isAdmin() && $user->pontos()->whereNotNull('hora_entrada')->whereNotNull('hora_saida')->exists())) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }

        return redirect()->back()->with('error', 'Você não tem permissão para fazer logout. Você deve registrar seu ponto de saída.');
    }
}
