(function ($) {

    "use strict";
    $(window).on('load', function () {
        if ($('#carregaSite').length) {
            $('#carregaSite').delay(800).fadeOut('slow', function () {
                $(this).remove();
            });
        }
    });
}

)(jQuery);