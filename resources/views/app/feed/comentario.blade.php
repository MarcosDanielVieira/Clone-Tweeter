

{{-- 
  
  O comentário só irá aparecer na publicação caso houver
  
--}}

@isset($objComentario)
   
  @foreach ($objComentario as $coment)

    @if ($item->IdPublicacao == $coment->IdPublicacao)

      <div class="div-comentario-existente">

        <p class="nome-perfil-comentario">
          {{$coment->UsuarioComentou}}
        </p>

        <small class="dataComentario">
          Comentado no dia {{$coment->Comentado}}
        </small>

        <p class="comentario">
          {{$coment->Comentario}} 
        </p>

      </div>
        
    @endif

  @endforeach

@endisset

{{-- 
  Renderizando formulário comentário
--}}
  
@include('App.Form.FormComentario')
