<?php

    include("Model/Usuario/UsuarioModel.php");
    include("Model/Usuario/UsuarioDAO.php");
    include("Model/Usuario/UsuarioVO.php");

    class UsuarioController
        {
        public function RegistraUsuarioController()
            {
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $VO->defineNomeUsuario($usuario);
            $VO->defineEmailUsuario($email);
            $VO->defineSenhaUsuario($senha);
            if($RetornoModel = $Model->RegistraUsuarioModel($VO))
                {
                header("Location: index.php");
                }else 
                    return $RetornoModel;
            }

        public function LoginUsuarioController()
            {
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $usuario = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            $VO->defineNomeUsuario($usuario);
            $VO->defineSenhaUsuario($senha);
            if($Model->LoginUsuarioModel($VO))
                {
                header("Location: index.php");
                }else header("Location: login.php?erro=1");
            }

        public function DeslogaUsuarioController()
            {
            $Model = new UsuarioModel();
            if($Model->DeslogaUsuarioModel())
                {
                header("Location: index.php");
                }else die ('Ocorreu um erro ao tentar deslogar da sua conta');
            }

        public function ApagarUsuarioController()
            {
            $Model = new UsuarioModel();
            $idUsuario = $_GET['id_usuario'];
            if($Model->ApagarUsuarioModel($idUsuario))
                {
                header("Location: index.php"); //Futuramente pagina de admin
                }else die ('Ocorreu um erro ao tentar apagar esta conta');
            }

        public function AtualizaUsuarioController()
            {
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $VO->defineIdUsuario($_SESSION['id_usuario']);
            $VO->defineNomeUsuario($_POST['nome']);
            if($RetornoAttUsuario = $Model->AtualizaUsuarioModel($VO))
                {
                header("Location: index.php");
                }
            }

        public function VerificaLoginController()
            {
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $VO->defineNomeUsuario($_SESSION['usuario']);
            $VO->defineImgUsuario($_SESSION['img_perfil']);
            $Model->VerificaLoginModel($VO);

            return [$VO->retornaNomeUsuario(), $VO->retornaImgUsuario()];
            }
        }

?>