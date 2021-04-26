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