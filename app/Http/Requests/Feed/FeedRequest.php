<?php

namespace App\Http\Requests\Feed;

use Illuminate\Foundation\Http\FormRequest;

class FeedRequest extends FormRequest
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
      'publica_mensagem'     => 'required|max:2500|min:1'
    ];
  }

  /**
   * Construindo mensagens personalizadas
   */

  public function messages()
  {
    return [
      'required'  => 'Na publicação o campo :attribute é obrigatório.',
      'max'       => "Na publicação o campo :attribute deve ter no máximo 2500 caracteres.",
      'min'       => "Na publicação o campo :attribute deve ter pelo menos 1 caracter.",
    ];
  }

  /**
   * Atribuindo nomes pernonalizados aos names do input
   */

  public function attributes()
  {
    return [
      'publica_mensagem'     => 'Texto da Publicação',
    ];
  }
}
