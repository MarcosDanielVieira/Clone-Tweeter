<?php try { ?>

<!DOCTYPE html>
<html lang="pt-BR" data-wf-page="5da766d32783b34770fbc796" data-wf-site="5da766d32783b3459dfbc795">

    <head>
    
        @include ( "app.templates.metatags" )
        
        <link href="{{ isset( $icone_pagina ) ? $icone_pagina : "" }}" rel="icon">

        @isset( $styles )
            @foreach ( $styles as $css )
                <link rel="stylesheet" href="{{ url( $css ) }}" />
            @endforeach
        @endisset

        @isset( $css_custom )
            @foreach ( $css_custom as $css )
                <link rel="stylesheet" href="{{ url( $css ) }}" />
            @endforeach
        @endisset
        
        <title>
            {{ isset( $titulo_pagina ) ? $titulo_pagina : "Gallera Nerd | Soluções Inteligentes" }}
        </title>

    </head>

    <body>
            
        @if ( isset( $yields_header ) )
            @foreach ( $yields_header as $yield )
                @yield( $yield )
            @endforeach
        @endif

        <main id="main">
            @if ( isset( $yields_main ) )
                @foreach ( $yields_main as $yield )
                    @yield( $yield )
                @endforeach
            @endif
        </main>

        @if ( isset( $yields_footer ) )
            @foreach ( $yields_footer as $yield )
                @yield( $yield )
            @endforeach
        @endif
        
        @isset( $scripts )
            @foreach ( $scripts as $js )
                <script src="{{ url( $js ) }}"></script>
            @endforeach
        @endisset

        @isset( $js_custom )
            @foreach ( $js_custom as $js )
                <script src="{{ url( $js ) }}"></script>
            @endforeach
        @endisset
        
    </body>

</html>

<?php
} catch ( \Exception $e ) {

    dd ( $e );

}?>