<?php

namespace App\Models;

use App\Helpers\Bichos;
use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'jogos';

    public $timestamps = false;

    public function data(): string
    {

        $data = new \DateTime($this->data);

        return $data
            ->setTimezone(new DateTimeZone('America/Sao_Paulo'))
            ->format('d/m/Y * H:i:s');
    }

    public function sorteios(): array
    {
        $numerosSorteados = (array)json_decode($this->numeros_sorteados);

        $classificacao = [];

        foreach ($numerosSorteados as $i => $numeroSorteado) {

            $classificacao[] = [$i + 1, $numeroSorteado, Bichos::encontrar($numeroSorteado)];

        }

        return $classificacao;

    }

}
