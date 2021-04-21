<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apostador extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'cpf'];
    protected $table = 'apostadores';

    public $timestamps = false;

    public function apostas()
    {
        return $this->hasMany(Aposta::class);
    }

}
