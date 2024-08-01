<?php

    //Inclui demais recursos que integram o MVC do objeto Post
    include_once("Model/Comentario/ComentarioModel.php");
    include_once("Model/Comentario/ComentarioDAO.php");
    include_once("Model/Comentario/ComentarioVO.php");
    include_once("View/ComentarioView.php");

    class ComentarioController //Classe responsável por controlar Model e View
        {
        public function EnviarComentarioController()
            {
            $Model = new ComentarioModel();
            $VO = new ComentarioVO();
            $comentario = $_POST['comentario'];
            $id_post = $_SESSION['id_post'];
            $id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : NULL;
            $VO->defineComentario($comentario);
            $VO->defineIdPost($id_post);
            $VO->defineIdUsuario($id_usuario);
            if($Model->EnviarComentarioModel($VO))
                {
                header("Location: post.php");
                }else 
                    if($id_usuario == false)
                        {
                        header("Location: post");
                        }else 
                            die('Falha ao enviar o comentario');
            }

        public function ApagarComentarioController()
            {
            $Model = new ComentarioModel();
            $VO = new ComentarioVO();
            $id_comentario = $_GET['id_comentario'];
            $VO->defineIdComentario($id_comentario);
            if($Model->ApagarComentarioModel($VO))
                {
                header("Location: post");
                }else die('Falha ao apagar o comentario');
            }

        public function ExibirComentariosController()
            {
            $IdPost = $_SESSION['id_post'];
            $Model = new ComentarioModel();
            $VO = new ComentarioVO();
            $VO->defineIdPost($IdPost);
            $comentarios = $Model->PegarComentariosUsuariosModel($VO);
            $View = new ComentarioView();
            return $View->ExibirComentariosView($comentarios);
            }

        public function ExibirAdmComentariosController()
            {
            $Model = new ComentarioModel();
            $comentarios = $Model->PegarAllComentariosUsuariosModel();
            $View = new ComentarioView();
            return $View->ExibirAdmComentariosView($comentarios);
            }

        public function ExibirAdmComentariosFiltroController()
            {
            $Model = new ComentarioModel();
            $VO = new ComentarioVO();
            $View = new ComentarioView();
            $GetTituloPost = $_GET['post'];
            $GetUsuario = $_GET['usuario'];
            $GetDataComentario = $_GET['data'];
            $VO->defineTituloPost($GetTituloPost);
            $VO->defineIdUsuario($GetUsuario);
            $VO->defineDataComentario($GetDataComentario);
            $comentarios = $Model->PegarComentariosUsuariosFiltroModel($VO);
            return $View->ExibirAdmComentariosView($comentarios);
            }

        public function RecuperarQntdComentariosController()
            {
            $Model = new ComentarioModel();
            return $comentarios = $Model->RecuperarQntdComentariosModel();
            }

        public function AtualizaAdmStatusComentarioController()
            { //Atualiza status do comentario escolhido pelo adm
            $Model = new ComentarioModel();
            $VO = new ComentarioVO();
            $status = $_GET['status'];
            $id_comentario = $_GET['id_comentario'];
            $VO->defineIdComentario($id_comentario);
            $VO->defineStatusComentario($status);
            if($Model->AtualizaStatusComentarioModel($VO))
                {
                header("Location: PainelGerenciamentoComentario");
                }else die('Falha ao atualizar status do comentario');
            }

        public function VerificaCurtidasComentarioController($IdComentario)
            {
            $Model = new ComentarioModel();
            $VO = new ComentarioVO();
            $IdUsuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : NULL;
            $VO->defineIdUsuario($IdUsuario);
            $VO->defineIdComentario($IdComentario);
            return $Model->VerificaCurtidasComentarioModel($VO);
            }

        public function AtualizaCurtidaComentarioController()
            {
            $Model = new ComentarioModel();
            $Acao = $_GET['acao'];
            $IdUsuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : NULL;
            if($IdUsuario != null)
                {
                if($Model->AtualizaCurtidaComentarioModel($Acao))
                    {
                    header("Location: post");
                    }else die('Falha ao Atualizar curtida do comentario');
                }else header("Location: post");
            }
        }

?>