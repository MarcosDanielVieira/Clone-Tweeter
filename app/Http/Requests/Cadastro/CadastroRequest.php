<?php

namespace App\Http\Requests\Cadastro;

use Illuminate\Foundation\Http\FormRequest;

class CadastroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Pegando nomes do form e atribuindo regras
     */

    public function rules()
    {
        return [
            'cadastro_email'             => 'required|email',
            'cadastro_nome'              => 'required|max:255|min:3',
            'cadastro_senha'             => 'required|max:255|min:3',
            'cadastro_senha_confirma'    => 'required|max:255|min:3|same:cadastro_senha',

        ];
    }

    /**
     * Construindo mensagens personalizadas
     */

    public function messages()
    {
        return [
            'required'                  => 'No cadastro o campo :attribute é obrigatório.',
            'max'                       => "No cadastro o campo :attribute deve ter no máximo 255 caracteres.",
            'min'                       => "No cadastro o campo :attribute deve ter pelo menos 3 caracteres.",

            'cadastro_email.email'      => "No cadastro o campo :attribute está no formato incorreto.",
            'cadastro_senha_confirma.same' => 'No cadastro o campo :attribute não confere com a senha digitada anterior.',

        ];
    }

    /**
     * Atribuindo nomes pernonalizados aos names do input
     */

    public function attributes()
    {
        return [
            'cadastro_nome'             => 'Nome',
            "cadastro_email"            => "E-mail",
            "cadastro_senha"            => "Senha",
            "cadastro_senha_confirma"   => "Confirmação de senha"

        ];
    }
}
