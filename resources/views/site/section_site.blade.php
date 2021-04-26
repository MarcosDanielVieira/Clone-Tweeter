@extends( "app.templates.home" )

@section( "section_todo" )
  @include ( "app.introducao.introducao" )
@endsection

@section('Site.ErroInterno')
  @include ( "app.erro.erro_interno" )
@endsection

@section('Site.Feed')
  @include ( "app.feed.publicacao" )
@endsection
