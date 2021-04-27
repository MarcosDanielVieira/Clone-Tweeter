<?php



use Illuminate\Support\Facades\Route;

/**
 * Acesso as rotas sem precisar de login
 */

Route::get('/', "App\AppController@homePage")->name('homePage');

Route::post("/login", "App\AppController@verificaUsuario")->name('verificaUsuario');

Route::post("/cadastro", "App\AppController@cadastroUsuario")->name('cadastroUsuario');


/**
 * Acesso as rotas abaixo somente se usuario estiver logado
 */

use \App\Http\Middleware\VerificaUsuarioLogado;

Route::middleware([VerificaUsuarioLogado::class])->group(function () {

  Route::get('/feed', "App\AppController@feed")->name('feed');
  Route::get('/sairApp', "App\AppController@sairApp")->name('sairApp');
  Route::post('/publicaMensagem', "App\AppController@publicaMensagem")->name('publicaMensagem');
  Route::post('/comentario', "App\AppController@comentario")->name('comentario');
  Route::post('/seguir', "App\AppController@seguir")->name('seguir');
  Route::get('/checkFollow/{id}', "App\AppController@checkFollowJson")->name('checkFollow');
});
