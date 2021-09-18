<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'nomeFormulario' => 'required|unique:App\Models\Question|string',
            'titulo' => 'required|unique:App\Models\Question|string',
            'descricao' => 'nullable|string',
            'pergunta' => 'required|string',
            'ndeperguntas' => 'required|string',
            'tipodepergunta' => 'required|string',
            'opcao1' => 'required|string',
            'opcao2' => 'nullable|string',
            'opcao3' => 'nullable|string',
            'opcao4' => 'nullable|string',
            'opcao5' => 'nullable|string',
            'opcao6' => 'nullable|string',
            'opcao7' => 'nullable|string',
            'opcao8' => 'nullable|string',
            'opcao9' => 'nullable|string',
            'opcao10' => 'nullable|string',
        ];
    }


    public function messages() {
        return [
            'nomeFormulario.required' => 'O campo nome do Formulário, é obrigatório', 
            'nomeFormulario.unique' => 'Esse nome de Formulário, já existe', 
            'titulo.required' => 'O campo Título, é obrigatório',
            'titulo.unique' => 'Já existe um formulário com esse título cadastrado',
            'pergunta.required' => 'O campo pergunta é obrigatório',
            'opcao1.required' => 'É obrigatório o preenchimento da primeira opção de resposta',
        ];
    }
}
