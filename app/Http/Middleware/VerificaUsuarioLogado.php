<?php

namespace App\Http\Middleware;

use Closure;

class VerificaUsuarioLogado
{

  public function handle($request, Closure $next)
  {
    // Verificando se usuario efetou o login
    if (session()->has("guarda.usuarioLogado")) {
      return $next($request);
    } else {
      session()->flash('error', 'Desculpe, mas você precisa fazer login!');
      return redirect()->route('homePage');
    }
  }
}
