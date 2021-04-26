<div class="w-form">
  <form 
    action="comentario" 
    method="POST"
    name="form_comentario" 
    class="w-clearfix">

    {{ csrf_field() }}

    <input 
      type="hidden" 
      {{-- value="{{$item->IdPublicacao}}" --}}
      required
      name="comentario_id">

    <textarea 
      placeholder="Tweete seu comentário" 
      maxlength="2500"
      minlength="1"
      required
      name="comentario_texto"
      class="textarea w-input"></textarea>

    <input 
      type="submit" 
      value="Comentar" 
      class="submit-button w-button">

  </form>

  <div class="w-form-done">
    <div>
      Obrigada! Sua submissão foi recebida!
    </div>
  </div>

  <div class="w-form-fail">
    <div>
      Ops! Algo deu errado ao enviar o formulário.
    </div>
  </div>

</div>