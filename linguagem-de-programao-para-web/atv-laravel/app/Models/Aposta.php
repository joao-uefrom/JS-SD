<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aposta extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'apostas';

    public $timestamps = false;

    public function apostador()
    {
        return $this->belongsTo(Apostador::class);
    }

}
