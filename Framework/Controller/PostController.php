<?php

    //Inclui demais recursos que integram o MVC do objeto Post
    include_once("Framework/Model/Post/PostModel.php");
    include_once("Framework/Model/Post/PostDAO.php");
    include_once("Framework/Model/Post/PostVO.php");
    include_once("Framework/View/PostView.php");

    class PostController //Classe responsável por controlar Model e View
        {
        public function EnviarPostController()
            { //Monta VO e envia o post do usuario para model
            $Model = new PostModel();
            $VO = new PostVO();
            $post = $_POST['post'];
            $categoria = $_POST['categoria'];
            $id_usuario = $_SESSION['id_usuario'];
            $VO->definePost($post);
            $VO->defineTituloPost($post[1]);
            $VO->defineResumoPost($post[2]);
            $VO->defineUsuarioPost($id_usuario);
            $VO->defineCategoriaPost($categoria);
            if($Model->EnviarPostModel($VO))
                {
                header("Location: pagina_usuario");
                }else die('Falha ao enviar o post');
            }

        public function PegarAllPostController()
            { //Recupera todos os posts habilitados de model, envia para view formatar e retorna formatado
            $Model = new PostModel();
            $posts = $Model->PegarAllPostModel();
            $View = new PostView();
            return $View->ExibirAllPostView($posts);
            }

        public function PegarAllMelhoresPostController()
            { //Recupera todos os posts habilitados de model, envia para view formatar e retorna formatado
            $Model = new PostModel();
            $posts = $Model->PegarAllMelhoresPostModel();
            $View = new PostView();
            return $View->ExibirAllPostView($posts);
            }

        public function PegarMeusPostsSugeridosController()
            {
            $IdUsuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : NULL;
            $Model = new PostModel();
            $View = new PostView();
            $posts = $Model->PegarMeusPostsSugeridosModel($IdUsuario);
            return $View->ExibirAllPostView($posts);
            }

        public function ExibirAdmAllPostController()
            { //Recupera todos os posts junto com info. de usuarios de model, envia para view formatar e retorna
            $Model = new PostModel();
            $posts = $Model->PegarAllPostsUsuariosModel();
            $View = new PostView();
            return $View->ExibirAdmAllPostView($posts);
            }

        public function ExibirAdmPostFiltroController()
            { //Recupera posts junto com info. de usuarios que passem pelo filtro enviado pelo cliente,
            //envia para view formatar e retorna para a pagina formatado
            $Model = new PostModel();
            $VO = new PostVO();
            $View = new PostView();
            $GetUsuario = $_GET['usuario'];
            $GetCategoria = $_GET['categoria'];
            $GetStatus = $_GET['status'];
            $GetDataPost = $_GET['data'];
            $VO->defineUsuarioPost($GetUsuario);
            $VO->defineCategoriaPost($GetCategoria);
            $VO->defineStatusPost($GetStatus);
            $VO->defineDataPost($GetDataPost);
            $posts = $Model->PegarPostFiltroModel($VO);
            return $View->ExibirAdmAllPostView($posts);
            }

        public function AllPostController()
            { //Recupera todos os posts habilitados e retorna para pagina
            $Model = new PostModel();
            return $posts = $Model->PegarAllPostModel();
            }

        public function PegarPostCategoriaController()
            { //Recupera posts da categoria escolhida pelo cliente, envia para view formatar e retorna á pagina
            $Categoria = $_GET['categoria'];
            $Model = new PostModel();
            $posts = $Model->PegarPostCategoriaModel($Categoria);
            $View = new PostView();
            $Posts = $View->ExibirAllPostView($posts);
            return $Posts;
            }

        public function PegarPostController()
            { //Recupera post escolhido pelo cliente, formata e retorna a página
            $IdPost = $_GET['post'];
            $Model = new PostModel();
            $post = $Model->ConsultaPostModel($IdPost);
            $View = new PostView();
            $Post = $View->ExibirPostView($post);
            header("Location: post");
            }

        public function PegarMeusPostController()
            { //Recupera posts enviados pelo usuario, formata e retorna a página
            $IdUsuario = $_SESSION['id_usuario'];
            $Model = new PostModel();
            $post = $Model->ConsultaMeusPostModel($IdUsuario);
            $View = new PostView();
            return $View->ExibirMeusPostView($post);
            }

        public function AtualizarPostController()
            { //Segue sem uso atualmente
            $Model = new PostModel();
            $VO = new PostVO();
            $post = $_POST['post'];
            $VO->definePost($post);
            $VO->defineTituloPost($post[1]);
            $VO->defineResumoPost($post[2]);
            $VO->defineUsuarioPost(1);
            if($Model->AtualizarPostModel($VO))
                {
                header("Location: pagina_usuario");
                }else die('Falha ao atualizar o post');
            }

        public function ApagarPostController()
            { //Segue sem uso atualmente
            $Model = new PostModel();
            $VO = new PostVO();
            $post = $_GET['post'];
            $VO->defineIdPost($post);
            if($Model->ApagarPostModel($VO))
                {
                header("Location: pagina_usuario");
                }else die('Falha ao apagar o post');
            }

        public function ApagarPostAdmController()
            { //Segue sem uso atualmente
            $Model = new PostModel();
            $VO = new PostVO();
            $post = $_GET['post'];
            $VO->defineIdPost($post);
            if($Model->ApagarPostModel($VO))
                {
                header("Location: PainelGerenciamentoPost");
                }else die('Falha ao apagar o post');
            }

        public function AtualizaStatusPostController()
            { //Atualiza status do post escolhido pelo cliente
            $Model = new PostModel();
            $VO = new PostVO();
            $status = $_GET['status'];
            $id_post = $_GET['id_post'];
            $VO->defineIdPost($id_post);
            $VO->defineStatusPost($status);
            if($Model->AtualizaStatusPostModel($VO))
                {
                header("Location: PainelGerenciamentoPost");
                }else die('Falha ao atualizar status do post');
            }

        public function AtualizaStatusMeusPostController()
            { //Atualiza status do post escolhido pelo cliente
            $Model = new PostModel();
            $VO = new PostVO();
            $status = $_GET['status'];
            $id_post = $_GET['id_post'];
            $VO->defineIdPost($id_post);
            $VO->defineStatusPost($status);
            if($Model->AtualizaStatusPostModel($VO))
                {
                header("Location: pagina_usuario");
                }else die('Falha ao atualizar status do post');
            }
        }

?>