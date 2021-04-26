<!--==========================
  INÍCIO DA HOMEPAGE
============================-->


<div class="topo">


  <div class="w-clearfix">

    <div class="div-azul"></div>

    {{-- 
      Renderizando modal de erro ou acerto
    --}}
      
    @include('app.erro.erro_acerto')

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

    <div class="div-formulario">
    
      {{-- 
        Renderizando formulario de login
      --}}
      
        @include('App.Form.Login')

      {{-- 
        Renderizando formulario de cadastro
      --}}
      
        @include('App.Form.Cadastro')

    </div>

  </div>

</div>


<!--==========================
  TÉRMINO DA HOMEPAGE
============================-->