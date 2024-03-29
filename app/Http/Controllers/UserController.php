<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function listarUsuarios()
    {
        $usuarios = User::select('nome', 'cpf', 'funcao', 'turno')->get();

        return view('usuarios.index_usuarios', ['usuarios' => $usuarios]);
    }

    public function usuariosPDF()
    {
        $users = User::select('nome', 'cpf','email', 'funcao', 'turno')->get();

        $data = [
            'users' => $users
        ];

        $pdf = PDF::loadView('lista_usuarios', $data)->setPaper('a4', 'landscape');

        return $pdf->download('lista_usuarios.pdf');

    }

    public function profile()
    {      
        $user = auth()->user(); 
        return view('usuarios.profile', ['user' => $user]);
    }

    

}
