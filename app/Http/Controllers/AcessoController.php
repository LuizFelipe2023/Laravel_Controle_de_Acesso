<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;
use App\Models\Acesso;

class AcessoController extends Controller
{
    public function index()
    {
        $acessos = Acesso::paginate(10);

        return view('acessos.index', ['acessos' => $acessos]);
    }

    public function createAcesso()
    {
        return view('acessos.create');
    }

    public function storeAcesso(Request $request)
    {
        $request->validate([
            'nome_pessoa' => 'required|string|min:2',
            'assunto' => 'required|string|min:2',
            'cpf' => 'required|string',
            'data' => 'required|date_format:Y-m-d',
            'hora_entrada' => 'required|date_format:H:i',
            'hora_saida' => 'required|date_format:H:i|after:hora_entrada',
            'destino' => 'required|string|min:2',
        ], [
            'nome_pessoa.required' => 'O campo nome da pessoa é obrigatório.',
            'nome_pessoa.min' => 'O campo nome da pessoa deve ter pelo menos :min caracteres.',
            'assunto.required' => 'O campo assunto é obrigatório.',
            'assunto.min' => 'O campo assunto deve ter pelo menos :min caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.cpf' => 'O CPF inserido é inválido.',
            'data.required' => 'O campo data é obrigatório.',
            'data.date' => 'O campo data deve ser uma data válida.',
            'data.date_format' => 'O campo data deve estar no formato YYYY-MM-DD.',
            'hora_entrada.required' => 'O campo hora de entrada é obrigatório.',
            'hora_entrada.date_format' => 'O campo hora de entrada deve estar no formato HH:MM.',
            'hora_saida.required' => 'O campo hora de saída é obrigatório.',
            'hora_saida.date_format' => 'O campo hora de saída deve estar no formato HH:MM.',
            'hora_saida.after' => 'A hora de saída deve ser posterior à hora de entrada.',
            'destino.required' => 'O campo destino é obrigatório.',
            'destino.min' => 'O campo destino deve ter pelo menos :min caracteres.',
        ]);

        $acesso = Acesso::create($request->all());

        if (!$acesso) {
            return redirect()->back()->with('error', 'Falha ao cadastrar o acesso');
        }

        return redirect()->route('acessos.index');
    }

    public function show($id)
    {
        $acesso = Acesso::findorFail($id);

        return view('acessos.show', ['acesso' => $acesso]);
    }

    public function edit($id)
    {
        $acesso = Acesso::findorFail($id);

        return view('acessos.edit', ['acesso' => $acesso]);
    }

    public function updateAcesso(Request $request, $id)
    {
        $acesso = Acesso::findorFail($id);

        $request->validate([
            'nome_pessoa' => 'required|string|min:2',
            'assunto' => 'required|string|min:2',
            'cpf' => 'required|string',
            'data' => 'required|date_format:Y-m-d',
            'hora_entrada' => 'required|date_format:H:i',
            'hora_saida' => 'required|date_format:H:i|after:hora_entrada',
            'destino' => 'required|string|min:2',
        ], [
            'nome_pessoa.required' => 'O campo nome da pessoa é obrigatório.',
            'nome_pessoa.min' => 'O campo nome da pessoa deve ter pelo menos :min caracteres.',
            'assunto.required' => 'O campo assunto é obrigatório.',
            'assunto.min' => 'O campo assunto deve ter pelo menos :min caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.cpf' => 'O CPF inserido é inválido.',
            'data.required' => 'O campo data é obrigatório.',
            'data.date' => 'O campo data deve ser uma data válida.',
            'data.date_format' => 'O campo data deve estar no formato YYYY-MM-DD.',
            'hora_entrada.required' => 'O campo hora de entrada é obrigatório.',
            'hora_entrada.date_format' => 'O campo hora de entrada deve estar no formato HH:MM.',
            'hora_saida.required' => 'O campo hora de saída é obrigatório.',
            'hora_saida.date_format' => 'O campo hora de saída deve estar no formato HH:MM.',
            'hora_saida.after' => 'A hora de saída deve ser posterior à hora de entrada.',
            'destino.required' => 'O campo destino é obrigatório.',
            'destino.min' => 'O campo destino deve ter pelo menos :min caracteres.',
        ]);

        $updatedAcesso = $acesso->update($request->all());

        if (!$updatedAcesso) {
            return redirect()->back()->with('errors', 'Erro ao atualizar o Acesso');
        }

        return redirect()->back()->with('success', 'Acesso atualizado com sucesso');
    }

    public function destroy($id)
    {
        $acesso = Acesso::findOrFail($id);
        $acesso->delete();

        return redirect()->back()->with('success', 'Acesso deletado com sucesso');
    }

    public function generatePDF()
    {
        $acessos = Acesso::all();

        $data = [
            'acessos' => $acessos
        ];

        $pdf = PDF::loadView('lista_acessos', $data)->setPaper('a4', 'landscape');

        return $pdf->download('lista_acessos.pdf');
    }
}
