

{{-- 
  
  O comentário só irá aparecer na publicação caso houver
  
--}}

@if ($item->Comentado != "")
  <div class="div-comentario-existente">

    <p class="nome-perfil-comentario">
      {{$item->UsuarioComentou}}
    </p>

    <div class="dataComentario">
      Comentado no dia {{$item->Comentado}}
    </div>
    
    <p class="comentario">
      {{$item->Comentario}} 
    </p>

  </div>
@endif


{{-- 
  Renderizando formulário comentário
--}}
  
@include('App.Form.FormComentario')
