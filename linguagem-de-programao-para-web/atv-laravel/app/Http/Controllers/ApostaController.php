<?php

namespace App\Http\Controllers;

use App\Models\Aposta;
use App\Models\Apostador;
use App\Helpers\Bichos;
use App\Rules\CPF;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApostaController extends Controller
{
    public function index(Request $request)
    {

        if (!isset($request->tipo_de_aposta) ||
            (int)$request->tipo_de_aposta < 1 ||
            (int)$request->tipo_de_aposta > 3) {
            return redirect()->route('aposta.index', ['tipo_de_aposta' => 1]
            );
        }

        return view('aposta', [
            'apostas' => Aposta::all(),
            'bichos' => Bichos::getNomes(),
        ]);
    }

    public function create(Request $request)
    {

        $request->validate([
            'cpf' => ['required', new CPF(), 'exists:apostadores'],
            'valor' => 'required|numeric',
            'n1' => [Rule::requiredIf(
                $request->tipo_de_aposta === '2' ||
                $request->tipo_de_aposta === '3'), 'min:100', 'max:9999', 'integer'],
            'n2' => [Rule::requiredIf($request->tipo_de_aposta === '3'), 'min:100', 'max:9999', 'integer'],
        ], $this->mensagens());

        $apostador = Apostador::where('cpf', $request->cpf)->first();

        $apostador->apostas()->create($request->except('cpf'));

        return redirect()->route(
            'aposta.index',
            ['tipo_de_aposta' => $request->tipo_de_aposta]
        );
    }

    private function mensagens(): array
    {
        return [
            '*.required' => 'Campo obrigatório.',
            '*.unique' => 'Campo já cadastrado.',
            'nome.min' => 'Nome muito curto.',
            'email.email' => 'Email inválido.'
        ];
    }
}


