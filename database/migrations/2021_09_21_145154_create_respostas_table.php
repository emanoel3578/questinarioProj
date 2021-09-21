<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->id();
            $table->integer('ownerId');
            $table->string("nomeFormulario", 1000);
            $table->string("titulo", 1000);
            $table->string("descricao", 1000)->nullable();
            $table->string("pergunta", 1000);
            $table->string("ndeperguntas", 1000);
            $table->string("tipodepergunta", 1000);
            $table->string("resposta1", 1000);
            $table->string("resposta2", 1000)->nullable();
            $table->string("resposta3", 1000)->nullable();
            $table->string("resposta4", 1000)->nullable();
            $table->string("resposta5", 1000)->nullable();
            $table->string("resposta6", 1000)->nullable();
            $table->string("resposta7", 1000)->nullable();
            $table->string("resposta8", 1000)->nullable();
            $table->string("resposta9", 1000)->nullable();
            $table->string("resposta10", 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respostas');
    }
}
