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
      
      {{-- @include('app.form.login') --}}

      <div id="carregaSite"></div>

        <div class="div-entrar">
          
          <p class="texto-centralizado">
            Login
          </p>

          <div class="w-form">
            <form 
              id="form_login" 
              action="login" 
              method="POST"
              name="email-form" 
              class="w-clearfix">

              {{ csrf_field() }}
              
              <div class="div-text-field w-clearfix">
                <input 
                  type="email" 
                  autofocus 
                  required 
                  autocomplete="username"
                  maxlength="256" 
                  placeholder="E-MAIL" 
                  id="login_email"
                  name="login_email"
                  class="text-field-entrar margem-right w-input">
                  
                  <input 
                    type="password" 
                    maxlength="256"  
                    placeholder="SENHA"
                    id="login_senha" 
                    autocomplete="current-password"
                    name="login_senha"
                    minlength="5"
                    class="text-field-entrar w-input">

                  {{-- <a href="#" class="link-esqueceu-sua-senha">Esqueceu sua senha?</a> --}}
                </div>
                <input type="submit" value="ENTRAR" data-wait="Please wait..." class="botao-entrar w-button">
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
        Renderizando formulario de cadastro
      --}}
      
      @include('app.form.cadastro')

    </div>

  </div>

</div>


<!--==========================
  TÉRMINO DA HOMEPAGE
============================-->