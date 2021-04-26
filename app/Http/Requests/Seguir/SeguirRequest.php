<?php

namespace App\Http\Requests\Seguir;

use Illuminate\Foundation\Http\FormRequest;

class SeguirRequest extends FormRequest
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
      'id_seguido'     => 'required|numeric|min:1'
    ];
  }

  /**
   * Construindo mensagens personalizadas
   */

  public function messages()
  {
    return [
      'required'  => 'Para seguir ou não o campo :attribute é obrigatório.',
      'min'       => "Para seguir ou não o campo :attribute deve ter pelo menos 1 caracter.",
      'numeric'   => "Para seguir ou não o campo :attribute deve número."
    ];
  }

  /**
   * Atribuindo nomes pernonalizados aos names do input
   */

  public function attributes()
  {
    return [
      'id_seguido'     => 'Id usuário',
    ];
  }
}
