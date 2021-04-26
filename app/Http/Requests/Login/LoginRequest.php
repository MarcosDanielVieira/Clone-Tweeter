<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'login_email'     => 'required|email',
            'login_senha'     => 'required|max:255|min:5'
        ];
    }

    /**
     * Construindo mensagens personalizadas
     */

    public function messages()
    {
        return [
            'required'          => 'No login o campo :attribute é obrigatório.',
            'login_email.email' => "No login o :attribute está no formato incorreto.",

            'login_senha.max'  => "No login o :attribute deve ter no máximo 255 caracteres.",
            'login_senha.min'  => "No login o :attribute deve ter pelo menos 5 caracteres.",
        ];
    }

    /**
     * Atribuindo nomes pernonalizados aos names do input
     */

    public function attributes()
    {
        return [
            'login_email'     => 'E-mail',
            'login_senha'     => 'Senha'
        ];
    }
}
