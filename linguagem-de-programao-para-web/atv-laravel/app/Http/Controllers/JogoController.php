<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use DateTime;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function index()
    {
        return view('jogo', [
            'jogos' => Jogo::all()->sortByDesc('id')
        ]);
    }

    public function create(Request $request)
    {

        Jogo::create([
            'data' => new DateTime('NOW'),
            'numeros_sorteados' =>
                json_encode(array(
                    rand(1000, 9999),
                    rand(1000, 9999),
                    rand(1000, 9999),
                    rand(1000, 9999),
                    rand(1000, 9999),
                    rand(100, 999))),
        ]);

        return redirect('jogo');
    }
}
