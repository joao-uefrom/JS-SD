<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apostas', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('tipo_de_aposta');
            $table->decimal('valor', 8, 2);
            $table->unsignedTinyInteger('tipo_de_jogo')->nullable();
            $table->unsignedTinyInteger('bicho')->nullable();
            $table->unsignedSmallInteger('n1')->nullable();
            $table->unsignedSmallInteger('n2')->nullable();
            $table->foreignId('apostador_id')
                ->constrained('apostadores')
                ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apostas');
    }
}
