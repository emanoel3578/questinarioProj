<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("nomeFormulario", 1000);
            $table->string("titulo", 1000);
            $table->string("descricao", 1000);
            $table->string("pergunta", 1000);
            $table->string("ndeperguntas", 1000);
            $table->string("tipodepergunta", 1000);
            $table->string("opcao1", 1000);
            $table->string("opcao2", 1000);
            $table->string("opcao3", 1000);
            $table->string("opcao4", 1000);
            $table->string("opcao5", 1000);
            $table->string("opcao6", 1000);
            $table->string("opcao7", 1000);
            $table->string("opcao8", 1000);
            $table->string("opcao9", 1000);
            $table->string("opcao10", 1000);
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
        Schema::dropIfExists('questions');
    }
}
