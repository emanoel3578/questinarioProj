<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomeFormulario',
        'titulo',
        'ownerId',
        'descricao',
        'pergunta',
        'ndeperguntas',
        'tipodepergunta',
        'opcao1',
        'opcao2',
        'opcao3',
        'opcao4',
        'opcao5',
        'opcao6',
        'opcao7',
        'opcao8',
        'opcao9',
        'opcao10',
    ];
}
