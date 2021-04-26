<?php

namespace App\Http\Requests\Comentario;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioRequest extends FormRequest
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
      'comentario_id'     => 'required|min:1|numeric',
      'comentario_texto'  => 'required|max:2500|min:1',
    ];
  }

  /**
   * Construindo mensagens personalizadas
   */

  public function messages()
  {
    return [
      'required'  => 'No comentário o campo :attribute é obrigatório.',
      'max'       => "No comentário o campo :attribute deve ter no máximo 2500 caracteres.",
      'min'       => "No comentário o campo :attribute deve ter pelo menos 1 caracter.",
      'numeric'   => "No comentário o campo :attribute deve número."
    ];
  }

  /**
   * Atribuindo nomes pernonalizados aos names do input
   */

  public function attributes()
  {
    return [
      'comentario_id'     => 'ID',
      "comentario_texto"  => "Tweet seu comentário"
    ];
  }
}
