$(document).ready(function () {

  /**
   * Mostrar modal por 4 minutos
   */

  $('#myModal').modal('show');

  setTimeout(function () {
    $('#myModal').modal('hide');
  }, 4000); // 4000 = 4 segundos 


  /**
   * Função de verificar senha quando sair do campo cadastro_senha_confirma
   */

  $("#cadastro_senha_confirma").blur(function () {

    //confirmando senha
    var senhaconfirm = $("#cadastro_senha_confirma").val();
    var senhaCompara = $("#cadastro_senha").val();

    if (senhaconfirm == senhaCompara) {
      $("#cadastro_senha_confirma").removeClass("is-invalid");
      $(".confrmacaoErro").text("");
    } else {
      $("#cadastro_senha_confirma").addClass("is-invalid");
      $(".confrmacaoErro").text('A confirmação da senha não confere com a senha digitada anterior!');
      // $('#cadastro_senha_confirma').focus();
      return false;
    }

    return true;

  });


  /**
   * Função de pegar os usuario quando página recarregar
   */

  $(".listaUsuarios").each(function () {

    var id = $(this).val();
    var elemento = $(this).next();

    jQuery.ajax({
      type: 'GET',
      async: true,
      url: '/checkFollow/' + id,
      success: function (valores) {

        if (valores.length > 0) {
          jQuery.each(valores, function (i, val) {

            /**
             * Verificano se usuario já não foi seguido
             */

            if (val['id_seguido'] == id) {

              elemento.addClass("desseguir");
              elemento.val("Desseguir");

            } else {

              elemento.removeClass("desseguir");
              elemento.val("Seguir");

            }

          });

        } else {
          elemento.removeClass("desseguir");
          elemento.val("Seguir");
        }

      },
      error: function (mensagemError) {
        console.log("error", mensagemError);
      }
    });

  });


  /**
   * 
   * Criando função que renderiza feed
   */


  function constroeDivFeed(nome, dataPublic, texto, usuario = null, data = null, comentario = null) {

    var divComent;

    if (usuario != null) {
      return divComent = `
        {{-- Div Comentário --}}

        <div class="div-comentario-existente">

          <p class="nome-perfil-comentario">
            ${usuario}
          </p>

          <small class="dataComentario">
            Comentado no dia ${data}
          </small>

          <p class="comentario">
            ${comentario}
          </p>

        </div>
      `;
    }



    return `
      <div class="div-publicacao-feed">
      
        <p class="nome-perfil-publicacao sombraDiv">
          ${nome}
        </p>

        <p>
          <small>
            Publicado no dia ${dataPublic}
          </small>
        </p>

        <p class="texto-publicacao">
          ${texto}
        </p>

         ${divComent}
        
      </div>
    `;
  }



  /**
   * Função de carregar posts somente de quem o usuario logado segue
   */


  $(".listaUsuarios").each(function () {

    var id = $(this).val();

    jQuery.ajax({
      type: 'GET',
      async: true,
      url: '/publicaoSeguir/' + id,
      success: function (valores) {

        if (valores.length > 0) {
          jQuery.each(valores, function (i, val) {

            // console.log(val);
            /**
             * A função constroeDivFeed vai ser chamada após fazer consulta dos posts
             * Após a consulta ela joga para view o resultado em formato de html
             * O que precisa ser feito é colocar o html dos comentários abaixo do resultado da função constroeDivFeed
             * 
             */

            $(".feeds").prepend(
              constroeDivFeed(
                val['Usuario'],
                val['Publicado'],
                val['Publicacao']
              )
            );

          });

        } else {

          return "não tem nada";
        }

      },
      error: function (mensagemError) {
        console.log("error", mensagemError);
      }
    });

  });

});