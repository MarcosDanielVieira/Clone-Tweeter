<div class="div-cadastrar">
  
  <p class="texto-centralizado">
    Cadastre-se
  </p>
  
  <div class="w-form">
    <form 
      id="form_cadastro" 
      action="cadastro" 
      method="POST"
      name="form_cadastro" 
      class="w-clearfix">

      {{ csrf_field() }}
      
      <input 
        type="text"
        class="text-field-cadastrar w-input" 
        maxlength="255" 
        minlength="3"
        name="cadastro_nome" 
        placeholder="NOME"
        id="cadastro_nome">

        <input 
          type="text" 
          class="text-field-cadastrar w-input" 
          maxlength="255" 
          minlength="3"
          name="cadastro_email"
          autocomplete="username"
          placeholder="E-MAIL" 
          id="cadastro_email">

        <input 
          type="password"
          class="text-field-cadastrar w-input" 
          maxlength="255" 
          minlength="3"
          name="cadastro_senha"
          autocomplete="new-password"
          placeholder="SENHA" 
          id="cadastro_senha">
        
        <input 
          type="password" 
          class="text-field-cadastrar w-input"
          maxlength="256" 
          autocomplete="new-password"
          name="cadastro_senha_confirma"
          placeholder="CONFIRMAR SENHA" 
          id="cadastro_senha_confirma">
          
          <p class="confrmacaoErro"></p>

        <input
          type="submit" 
          value="CADASTRAR" 
          data-wait="Please wait..." 
          class="botao-cadastrar w-button">

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