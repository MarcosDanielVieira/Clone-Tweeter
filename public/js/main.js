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
      url: '/checkFollowJson/' + id,
      success: function (valores) {

        if (valores.length > 0) {
          jQuery.each(valores, function (i, val) {

            /**
             * Verificano se usuario já não foi seguido
             */

            if (val['id_seguido'] == id) {

              elemento.addClass("desseguir");
              elemento.val("Desseguir");
              $(".feed".id).show();

            } else {

              elemento.removeClass("desseguir");
              elemento.val("Seguir");
              $(".feed" + id).hide();
            }

          });

        } else {
          elemento.removeClass("desseguir");
          elemento.val("Seguir");
          $(".feed" + id).hide();
        }

      },
      error: function (mensagemError) {
        console.log("error", mensagemError);
      }
    });

  });


});