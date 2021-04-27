
<div class="col-3 divSeguir">
  <h3>Tweeters</h3>
  <hr/>
  
  {{-- 
    Listando todos os usuarios
  --}}

    @isset($objUsuario)
      
      @foreach ($objUsuario as $usuario)

        {{-- 
          Verificando se não é usuario logado
        --}}

        @if ($usuario->id != session("guarda.usuarioLogado"))
          
          {{-- 
            Renderizando view seguir
          --}}
        
          @include('app.form.seguir')
            
        @endif

      @endforeach

    @endisset
 
</div>