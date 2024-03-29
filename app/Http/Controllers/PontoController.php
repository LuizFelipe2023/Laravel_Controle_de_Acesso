<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ponto;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PontoController extends Controller
{
    public function indexPontos()
    {
        $pontos = Ponto::paginate(10);
        return view('pontos.index', ['pontos' => $pontos]);
    }

    public function createEntrada()
    {
        return view('pontos.entrada');
    }

    public function storeEntrada(Request $request)
    {
        $user = Auth::user();
        $nome_usuario = $user->nome;
        $request->validate([
            'data_entrada' => 'required|date',
            'hora_entrada' => 'required|date_format:H:i',
        ]);

        $ponto = Ponto::create([
            'user_id' => $user->id,
            'nome_usuario' => $nome_usuario,
            'data_entrada' => $request->data_entrada,
            'hora_entrada' => $request->hora_entrada,
        ]);

        if (!$ponto) {
            return redirect()->back()->with('errors', 'Erro ao cadastrar a entrada, verifique os dados enviados.');
        }

        return redirect()->route('acessos.index')->with('success', 'Entrada cadastrada com sucesso');
    }



    public function createSaida()
    {
        return view('pontos.saida');
    }

    public function storeSaida(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'data_saida' => 'required|date',
            'hora_saida' => 'required|date_format:H:i',
        ]);

        $ponto = Ponto::where('user_id', $user->id)
            ->where('data_saida', null)
            ->first();

        if (!$ponto) {
            return redirect()->back()->with('error', 'Não foi encontrado um registro de entrada para registrar a saída.');
        }

        $ponto->update([
            'data_saida' => $request->data_saida,
            'hora_saida' => $request->hora_saida,
        ]);

        return redirect()->route('login')->with('success', 'Saída registrada com sucesso.');
    }




    public function pontosPDF()
    {
        $pontos = Ponto::all();

        $data = [
            'pontos' => $pontos
        ];

        $pdf = PDF::loadView('lista_pontos', $data)->setPaper('a4', 'landscape');

        return $pdf->download('lista_pontos.pdf');
    }

    public function meusPontos()
    {
        $userId = Auth::id();
        $pontos = Ponto::where('user_id', $userId)->paginate(10);

        return view('pontos.meus_pontos', ['pontos' => $pontos]);
    }

    public function meuspontosPDF()
    {
        $userId = Auth::id();

        $pontos = Ponto::where('user_id', $userId)->get();

        if ($pontos->isEmpty()) {
            return "Você ainda não registrou nenhum ponto.";
        }

        $data = [
            'pontos' => $pontos
        ];

        $pdf = PDF::loadView('lista_meus_pontos', $data)->setPaper('a4', 'landscape');

        return $pdf->download('meus_pontos.pdf');
    }
}
