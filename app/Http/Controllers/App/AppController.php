<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Http\Requests\Cadastro\CadastroRequest;
use App\Http\Requests\Feed\FeedRequest;
use App\Http\Requests\Seguir\SeguirRequest;
use App\Http\Requests\Comentario\ComentarioRequest;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\This;

class AppController extends Controller
{

    /**
     * Criando função que tem em todas as páginass
     */

    public function temEmTodos($view, $titulo_pagina)
    {


        $prefixo = [

            # -------------------------------------------------------------
            # DADOS DA ESTRUTURA
            # -------------------------------------------------------------

            'desc_pagina'           => "Gallera Nerd | Soluções Inteligentes em Tecnologia da Informação.",
            'keywords_pagina'       => "Tecnologia,Inovação,Nerd,Nerds,Gallera",
            'autor_pagina'          => "Gallera Nerd",
            "icone_pagina"          => "img/favicon.ico",
            'robots'                => 'index,archive,nofollow,noimageindex',
            "view"                  => $view,
            'titulo_pagina'         => $titulo_pagina,
        ];

        return $prefixo;
    }

    /**
     * Criando função para visualizar a home page ( Login e cadastro )
     */

    public function homePage()
    {

        try {

            if (!session("guarda.usuarioLogado")) {
                $temEmTodos = $this->temEmTodos("section_site", "Desafio");

                $dados_view = [

                    # ----------------------------------------
                    # --- Local para colocar os rendimentos das páginas
                    # ----------------------------------------

                    "yields_header"          => [

                        "section_cabecalho",

                    ],

                    "yields_main"           => [

                        "section_todo",

                    ],


                    "yields_footer"         => [
                        // "section_rodape",
                    ],


                    # ----------------------------------------
                    # --- Local para colocar os estilos da internet na página
                    # ----------------------------------------

                    "styles"                => [
                        // "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
                        "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css",
                    ],


                    # ----------------------------------------
                    # --- Local para colocar os estilos personalizados na página
                    # ----------------------------------------

                    "css_custom"                                   => [

                        // "css/normalize.css",
                        "css/webflow.css",
                        "css/desafio.webflow.css",
                        "css/spinner.css"

                    ],


                    # ----------------------------------------
                    # --- Local para colocar os estilos js na página
                    # ----------------------------------------

                    "scripts"               => [

                        "https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js",
                        // "https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js",
                        "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js",
                        "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js",
                        "js/webflow.js",
                        "js/main.js",
                        "js/carregaSite.js"
                    ],


                ];


                return view("site." . $temEmTodos['view'], $dados_view, $temEmTodos);
            } else {
                return $this->feed();
            }
        } catch (\Throwable $th) {
            return $this->mensagemErro(
                $th,
                "Houve um erro na requisição de visualizar página inicial."
            );
        }
    }

    /**
     * Validando dados do login via Request 
     * E-mail e senha
     * Guardando usuario na sessão
     */

    public function verificaUsuario(LoginRequest $request)
    {

        try {

            $objUsuario     = resolve('App\Models\Usuario');

            $usuario        = $objUsuario->where('email', "=", $request->input("login_email"))->get();
            $result         = $objUsuario->where('email', "=", $request->input("login_email"))->exists();

            if ($result && Hash::check($request->input("login_senha"), $usuario[0]->senha)) {
                $request->session()->put('guarda.usuarioLogado', $usuario[0]->id);

                return redirect()->route('feed');
            } else {
                return back()->with('error', 'E-mail ou senhas não confere!');
            }
        } catch (\Throwable $th) {
            return $this->mensagemErro(
                $th,
                "Houve um erro na requisição de fazer login."
            );
        }
    }

    /**
     * Validando dados do cadastro via Request 
     * Antes de salvar, verifica se e-mail não existe no banco de dados
     * E-mail, senha, nome e salva no banco
     */

    public function cadastroUsuario(CadastroRequest $request)
    {
        try {

            $objUsuario         = resolve('App\Models\Usuario');

            /**
             * Verificando se e-mail já está cadastrado
             */

            $result = $objUsuario->where([
                'email'     =>  $request->input("cadastro_email")
            ])->exists();

            /**
             * Caso se não estiver cadastrado
             * Salve as informações no banco de dados
             */

            if ($result == false) {

                $objUsuario->senha  = Hash::make($request->input("cadastro_senha"));
                $objUsuario->email  = $request->input("cadastro_email");
                $objUsuario->nome   = $request->input("cadastro_nome");
                $objUsuario->save();

                /**
                 * Mandndo mensagem que deu certo para modal
                 */

                session()->flash('success', 'Informações cadastradas com sucesso!');
            } else {
                session()->flash('error', 'E-mail já existe cadastrado, tente outro.');
            }

            return redirect()->route('homePage');
        } catch (\Throwable $th) {
            return $this->mensagemErro(
                $th,
                "Houve um erro na requisição de cadastrar usuário."
            );
        }
    }

    /**
     * Função que mostra erro interno ( Servidor desligado, erro de sql, etc )
     */

    public function mensagemErro($th, $mensagem)
    {

        try {

            $temEmTodos = $this->temEmTodos("section_site", "Desafio");
            $objErro    = resolve('App\Models\Erro');

            $dadosView = [];

            $dadosView += [

                'yields_main' => [
                    'Site.ErroInterno',
                ],

                "erroGrave" => $mensagem,
            ];

            $objErro->nome = $mensagem;
            $objErro->th   = $th;
            $objErro->save();
            $dadosView += [
                'whatsApp'  => 'https://api.whatsapp.com/send?phone=553387503588' . '&text=' . $mensagem,
            ];

            return view("site." . $temEmTodos['view'], $dadosView, $temEmTodos);
        } catch (\Throwable $th) {
            $dadosView = [
                'yields_main' => [
                    'Site.ErroInterno',
                ],
                'whatsApp'  => 'https://api.whatsapp.com/send?phone=553387503588' . '&text=' . $mensagem,
                "erroGrave" => $mensagem,
            ];

            return view("site." . $temEmTodos['view'], $dadosView, $temEmTodos);
        }
    }


    /**
     * Função que mostra feed 
     */

    public function feed()
    {
        try {

            /**
             * Verificando se usuario está logado
             */

            if (session("guarda.usuarioLogado")) {

                $temEmTodos         = $this->temEmTodos("section_site", "Publicações");
                $objUsuario         = resolve('App\Models\Usuario');
                $objPublicacao      = resolve('App\Models\View_Publicao');
                $objComentario      = resolve('App\Models\View_Comentario');
                $objSeguidores      = resolve('App\Models\View_Seguidores');

                $usuario            = $objUsuario->where('id', "=", session("guarda.usuarioLogado"))->get();
                $publicacao         = $objPublicacao->where('IdUsuario', "=", session("guarda.usuarioLogado"))->orderBy("Publicado", "DESC")->get();
                $comentario         = $objComentario->orderBy("Comentado", "ASC")->get();
                $listaUsuario       = $objUsuario->get();
                $seguidores         = $objSeguidores->get();

                $primeiroNome       = explode(' ', trim($usuario[0]->nome));

                $dados_view = [

                    # ----------------------------------------
                    # --- Local para colocar os rendimentos das páginas
                    # ----------------------------------------

                    "yields_header"          => [

                        "section_cabecalho",

                    ],

                    "yields_main"           => [

                        "Site.Feed",

                    ],


                    "yields_footer"         => [
                        // "section_rodape",
                    ],


                    "dadosUsaurio"          => [
                        "nome"              => $primeiroNome[0],
                    ],


                    /**
                     * Jogando variaveis para a view
                     */

                    "objPublicacao"         => $publicacao,
                    "objComentario"         => $comentario,
                    "objUsuario"            => $listaUsuario,
                    "objSeguidores"         => $seguidores,

                    # ----------------------------------------
                    # --- Local para colocar os estilos da internet na página
                    # ----------------------------------------

                    "styles"                => [
                        // "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
                        "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css",
                    ],

                    # ----------------------------------------
                    # --- Local para colocar os estilos personalizados na página
                    # ----------------------------------------

                    "css_custom"                                   => [

                        // "css/normalize.css",
                        "css/webflow.css",
                        "css/desafio.webflow.css",
                        "css/spinner.css"

                    ],

                    # ----------------------------------------
                    # --- Local para colocar os estilos js na página
                    # ----------------------------------------

                    "scripts"               => [

                        "https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js",
                        // "https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js",
                        "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js",
                        "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js",
                        "js/webflow.js",
                        "js/main.js",
                        "js/carregaSite.js"
                    ],


                ];

                return view("site." . $temEmTodos['view'], $dados_view, $temEmTodos);
            } else {
                session()->flash('error', 'É necessário efetuar o login!');
                return redirect()->route('homePage');
            }
        } catch (\Throwable $th) {
            // dd($th);
            return $this->mensagemErro(
                $th,
                "Houve um erro na requisição de visualizar o feed."
            );
        }
    }

    /**
     * Recebe mensagem do formulario de publicação e salva no banco
     */

    public function publicaMensagem(FeedRequest $request)
    {
        try {

            $objPublicacao          = resolve('App\Models\Publicacao');
            $objPublicacao->texto   = $request->input("publica_mensagem");
            $objPublicacao->usuario = session("guarda.usuarioLogado");
            $objPublicacao->save();

            session()->flash('success', 'Twweet publicado com suceso!');
            return redirect()->route('feed');
        } catch (\Throwable $th) {

            // dd($th);

            return $this->mensagemErro(
                $th,
                "Houve um erro na requisição de publicar."
            );
        }
    }

    /**
     * Função de sair do site destruindo session
     */

    public function sairApp()
    {
        try {
            session()->forget('guarda.usuarioLogado');
            return redirect()->route('homePage');
        } catch (\Throwable $th) {
            return $this->mensagemErro(
                $th,
                "Houve um erro na requisição de sair do aplicativo"
            );
        }
    }


    /**
     * Função de comentar publicação
     */

    public function comentario(ComentarioRequest $request)
    {
        try {
            $objComentario              = resolve('App\Models\Comentario');
            $objComentario->comentario  = $request->input("comentario_texto");
            $objComentario->publicacao  = $request->input("comentario_id");
            $objComentario->usuario     = session("guarda.usuarioLogado");
            $objComentario->save();

            session()->flash('success', 'Comentário efetudo com sucesso!');
            return redirect()->route('feed');
        } catch (\Throwable $th) {
            return $this->mensagemErro(
                $th,
                "Houve um erro na requisição de comentar!"
            );
        }
    }


    /**
     * Função de seguir e deseguir usuario
     */

    public function seguir(SeguirRequest $request)
    {
        try {

            /**
             * Verificar se segue o usuario
             * Se seguir vai deixar de seguir usuario
             * Se não seguir adiciona no banco o registro
             */

            if ($this->checkFollow($request->input("id_seguido"))) {

                $objUsuarios_Seguir      = resolve('App\Models\Usuarios_Seguir');

                $objUsuarios_Seguir->where([
                    "id_usuario"        => session("guarda.usuarioLogado"),
                    "id_seguido"        => $request->input("id_seguido")
                ])->update([
                    "seguindo"          => "N"
                ]);

                /**
                 * Após registro deletado atribui parametros ao array que vai retornar pra view
                 */

                session()->flash('success', 'Usuário desseguido com sucesso!');
                return redirect()->route('feed');
            } else {

                $objUsuarios_Seguir      = resolve('App\Models\Usuarios_Seguir');

                $objUsuarios_Seguir->id_seguido = $request->input("id_seguido");
                $objUsuarios_Seguir->id_usuario = session("guarda.usuarioLogado");
                $objUsuarios_Seguir->seguindo   = "S";
                $objUsuarios_Seguir->save();

                session()->flash('success', 'Usuário seguido com sucesso!');
                return redirect()->route('feed');
            }
        } catch (\Throwable $th) {
            // dd($th);
            return $this->mensagemErro(
                $th,
                "Houve um erro na requisição de seguir ou deseguir usuário!"
            );
        }
    }

    /**
     * Função de verificar se usaurio já segue
     */

    public function checkFollow($id_user)
    {

        $objUsuarios_Seguir      = resolve('App\Models\Usuarios_Seguir');

        $qr = $objUsuarios_Seguir->where([
            "id_usuario"        => session("guarda.usuarioLogado"),
            "id_seguido"        => $id_user,
            "seguindo"          => "S"
        ])->get();

        if ($qr->count() > 0) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Função de verificar se usaurio já segue
     * Caso seguir retorna informações view
     */

    public function checkFollowJson($id_user)
    {

        $objUsuarios_Seguir      = resolve('App\Models\Usuarios_Seguir');

        $qr = $objUsuarios_Seguir->where([
            "id_usuario"        => session("guarda.usuarioLogado"),
            "id_seguido"        => $id_user,
            "seguindo"          => "S"
        ])->get();

        return response()->json($qr);
    }


    /**
     * Função de verificar se usaurio já segue
     * Caso seguir retorna informações view
     */

    public function publicaoSeguir($id_user)
    {

        if ($this->checkFollow($id_user)) {
            $View_Publicao      = resolve('App\Models\View_Publicao');

            $qr = $View_Publicao->where([
                "IdUsuario"        => $id_user,
            ])->get();
        } else {
            return "";
        }

        return response()->json($qr);
    }


    /**
     * Função de verificar se post foi comentado
     * Caso comentado retorna informações view
     */

    public function comentarioPost($idpost)
    {

        $View_Comentario      = resolve('App\Models\View_Comentario');

        $qr = $View_Comentario->where([
            "IdPublicacao"    => $idpost,
        ])->get();

        return response()->json($qr);
    }
}
