<?php

    include("Model/Post/PostModel.php");
    include("Model/Post/PostDAO.php");
    include("Model/Post/PostVO.php");
    include("View/PostView.php");

    class PostController //Classe responsável por controlar Model e View
        {
        public function EnviarPostController()
            {
            $Model = new PostModel();
            $VO = new PostVO();
            $post = $_POST['post'];
            $VO->definePost($post);
            $VO->defineTituloPost($post[1]);
            $VO->defineResumoPost($post[2]);
            $VO->defineUsuarioPost(1);
            $VO->defineCategoriaPost(1);
            if($Model->EnviarPostModel($VO))
                {
                header("Location: pagina_usuario.php");
                }else die('Falha ao enviar o post');
            }

        public function PegarAllPostController()
            {
            $Model = new PostModel();
            $posts = $Model->PegarAllPostModel();
            $View = new PostView();
            $Posts = $View->ExibirAllPostView($posts);
            return $Posts;
            }

        public function PegarPostCategoriaController()
            {
            $Categoria = $_GET['categoria'];
            $Model = new PostModel();
            $posts = $Model->PegarPostCategoriaModel($Categoria);
            $View = new PostView();
            $Posts = $View->ExibirPostCategoriaView($posts);
            return $Posts;
            }

        public function PegarPostController()
            {
            $IdPost = $_GET['post'];
            $Model = new PostModel();
            $post = $Model->ConsultaPostModel($IdPost);
            $View = new PostView();
            $Post = $View->ExibirPostView($post);
            return $Post;
            }

        public function AtualizarPostController()
            {
            $Model = new PostModel();
            $VO = new PostVO();
            $post = $_POST['post'];
            $VO->definePost($post);
            $VO->defineTituloPost($post[1]);
            $VO->defineResumoPost($post[2]);
            $VO->defineUsuarioPost(1);
            if($Model->AtualizarPostModel($VO))
                {
                header("Location: pagina_usuario.php");
                }else die('Falha ao atualizar o post');
            }

        public function ApagarPostController()
            {
            $Model = new PostModel();
            $VO = new PostVO();
            $post = $_GET['post'];
            $VO->defineIdPost($post);
            if($Model->ApagarPostModel($VO))
                {
                header("Location: pagina_usuario.php");
                }else die('Falha ao apagar o post');
            }
        }

?>