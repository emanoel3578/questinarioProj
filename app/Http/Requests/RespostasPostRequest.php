<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RespostasPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'nomeFormulario' => 'required|string',
            'titulo' => 'required|string',
            'descricao' => 'nullable|string',        
            'matricula' => 'required|string',        
            'nome' => 'required|string',        
            'pergunta' => 'required|string',
            'ndeperguntas' => 'required|string',
            'tipodepergunta' => 'required|string',
            'resposta1' => 'required|string',
            'resposta2' => 'nullable|string',
            'resposta3' => 'nullable|string',
            'resposta4' => 'nullable|string',
            'resposta5' => 'nullable|string',
            'resposta6' => 'nullable|string',
            'resposta7' => 'nullable|string',
            'resposta8' => 'nullable|string',
            'resposta9' => 'nullable|string',
            'resposta10' => 'nullable|string',
        ];
    }


    public function messages() {
        return [
            'nomeFormulario.required' => 'O campo nome do Formulário, é obrigatório', 
            'nomeFormulario.unique' => 'Esse nome de Formulário, já existe', 
            'titulo.required' => 'O campo Título, é obrigatório',
            'titulo.unique' => 'Já existe um formulário com esse título cadastrado',
            'pergunta.required' => 'O campo pergunta é obrigatório',
            'resposta1.required' => 'É obrigatório o preenchimento da primeira resposta',
        ];
    }
}
