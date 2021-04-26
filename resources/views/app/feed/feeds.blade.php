
<h2>
  Feeds
</h2>

@isset($objPublicacao)
  @foreach ($objPublicacao as $item)
  <div class="div-publicacao-feed">

    <p class="nome-perfil-publicacao sombraDiv">
      {{$item->Usuario}}
    <p>
      <small>
        Publicado no dia {{$item->Publicado}}
      </small>
    </p>
    </p>

    <p class="texto-publicacao">
      {{$item->Publicacao}}
    </p>

    {{--
      Renderizando comentário se existir
    --}}

    @include('App.Feed.comentario')

  </div>
  @endforeach
@endisset

<div class="feeds"></div>


