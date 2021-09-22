<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respostas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomeFormulario',
        'titulo',
        'ownerId',
        'matricula',
        'nome',
        'descricao',
        'pergunta',
        'ndeperguntas',
        'tipodepergunta',
        'resposta1',
        'resposta2',
        'resposta3',
        'resposta4',
        'resposta5',
        'resposta6',
        'resposta7',
        'resposta8',
        'resposta9',
        'resposta10',
    ];

}
