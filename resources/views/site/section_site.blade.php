@extends( "app.templates.home" )

@section( "section_todo" )
  @include ( "app.introducao.view_introducao" )
@endsection

@section('Site.ErroInterno')
  @include ( "app.erro.ErroInterno" )
@endsection

@section('Site.Feed')
  @include ( "app.feed.publicacao" )
@endsection
