
<div id="carregaSite"></div>

<div class="row">


  <div class="col-9">

    <div class="topo-publicacoes w-clearfix">

      <div class="div-perfil">    
            
        <p class="nome-perfil">
        
          {{--  
            Verifica se a variavel existe
          --}}
          
          @isset($dadosUsaurio)
            {{$dadosUsaurio['nome']}} 
          @endisset  

        </p>

        <a 
          href="{{route("sairApp")}}"
          class="botao-sair w-inline-block">
         Sair
        </a>

      </div>

      <div class="div-feed">

        {{-- 
          Renderizando de erro encontrados via framework
        --}}
          
        @if ($errors->any())
          <!-- Mensagens automáticas de erros da plataforma Laravel -->
          <div class="mx-auto my-2 mx-2">
                
            <h5 class="text-center h4 mb-3 text-danger">
              Ops, encontramos os seguintes erros:
            </h5>

            <ul class="list-group alert-danger">
              @foreach($errors->all() as $error)
                  <li class="list-group-item list-group-item-danger">{{ $error }}</li>
              @endforeach
            </ul>

          </div>
        @endif


        {{-- 
          Renderizando modal de erro ou acerto
        --}}
        
        @include('app.erro.erro_acerto')

        <div class="container-publicacoes">

          <div class="bloco-publicacao">
            <div class="w-form">
              <form 
                id="form_publica" 
                name="form_publica"
                action="publicaMensagem" 
                method="POST"
              >

                {{ csrf_field() }}

                <textarea 
                  placeholder="O que está acontecendo?" 
                  maxlength="2500" 
                  minlength="1"
                  required
                  id="publica_mensagem" 
                  name="publica_mensagem"
                  class="texto-publicar w-input"></textarea>

                <input 
                  type="submit" 
                  value="Tweetar" 
                  data-wait="Please wait..." 
                  class="botao-publicar w-button">

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
          </div>

          {{-- 
            Renderizando resultado da transição de página
          --}}
          
          @include('App.feed.feeds')
          
        </div>
      </div>
    </div>

  </div>

  {{-- 
    Renderizando tweetrs menos do usario logado
  --}}
  
  @include('App.Feed.tweetrs')
  
</div>
