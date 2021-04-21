<?php

namespace App\Http\Controllers;

use App\Models\Apostador;
use App\Rules\CPF;
use Illuminate\Http\Request;

class ApostadorController extends Controller
{
    public function index(Request $request)
    {
        return view('apostador', ['apostadores' => Apostador::all()]);
    }

    public function create(Request $request)
    {

        $request->validate([
            'nome' => 'required|min:5',
            'email' => 'required|email:rfc,dns|unique:apostadores',
            'cpf' => ['required', 'unique:apostadores', new CPF()]
        ], $this->mensagens());

        Apostador::create($request->all());

        return redirect('apostador');
    }

    public function mensagens(): array
    {
        return [
            '*.required' => 'Campo obrigatório.',
            '*.unique' => 'Campo já cadastrado.',
            'nome.min' => 'Nome muito curto.',
            'email.email' => 'Email inválido.'
        ];
    }
}
