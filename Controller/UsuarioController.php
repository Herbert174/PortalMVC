<?php

    include_once("Model/Usuario/UsuarioModel.php");
    include_once("Model/Usuario/UsuarioDAO.php");
    include_once("Model/Usuario/UsuarioVO.php");
    include_once("View/UsuarioView.php");

    class UsuarioController
        {
        public function RegistraUsuarioController()
            { //Registra usuario enviado pelo cliente no banco de dados
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
                header("Location: index");
                }else 
                    return $RetornoModel;
            }

        public function LoginUsuarioController()
            { //Realiza o acesso do usuario no sistema e o direciona para pagina inicial em caso de sucesso
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $usuario = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            $VO->defineNomeUsuario($usuario);
            $VO->defineSenhaUsuario($senha);
            if($Model->LoginUsuarioModel($VO))
                {
                header("Location: index");
                }else header("Location: login?erro=1");
            }

        public function DeslogaUsuarioController()
            { //Sem uso atualmente
            $Model = new UsuarioModel();
            if($Model->DeslogaUsuarioModel())
                {
                header("Location: index");
                }else die ('Ocorreu um erro ao tentar deslogar da sua conta');
            }

        public function ApagarUsuarioController()
            { //Sem uso atualmente
            $Model = new UsuarioModel();
            $idUsuario = $_GET['id_usuario'];
            if($Model->ApagarUsuarioModel($idUsuario))
                {
                header("Location: index"); //Futuramente pagina de admin
                }else die ('Ocorreu um erro ao tentar apagar esta conta');
            }

        public function AtualizaUsuarioController()
            { //Atualiza nome do usuario para nome enviado pelo cliente
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $VO->defineIdUsuario($_SESSION['id_usuario']);
            $VO->defineNomeUsuario($_POST['nome']);
            if($RetornoAttUsuario = $Model->AtualizaUsuarioModel($VO))
                {
                header("Location: index");
                }
            }

        public function VerificaLoginController()
            { //Verifica se cliente está logado no sistema
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $VO->defineNomeUsuario($_SESSION['usuario']);
            $VO->defineImgUsuario($_SESSION['img_perfil']);
            $Model->VerificaLoginModel($VO);

            return [$VO->retornaNomeUsuario(), $VO->retornaImgUsuario()];
            }

        public function VerificaAcessoController()
            {
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            if(isset($_SESSION['id_usuario']))
                {
                $VO->defineIdUsuario($_SESSION['id_usuario']);
                if($Model->VerificaAcessoModel($VO))
                    {
                    $Painel = $_GET['Painel'];
                    if($Painel == 'Geral')
                        {
                        header("Location: PainelControleGerenciamento");
                        }else header("Location: PainelGerenciamento".$Painel);
                    } else header("Location: index");
                } else header("Location: index");
            }

        public function VerificaCurtidasPostController()
            {
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $IdUsuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : NULL;
            $VO->defineIdUsuario($IdUsuario);
            return $Model->VerificaCurtidasPostModel($VO);
            }

        public function VerificaCurtidasAutorPostController()
            {
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $IdUsuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : NULL;
            $VO->defineIdUsuario($IdUsuario);
            return $Model->VerificaCurtidasAutorPostModel($VO);
            }

        public function AtualizaCurtidaPostController()
            {
            $Model = new UsuarioModel();
            $Acao = $_GET['acao'];
            $IdUsuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : NULL;
            if($IdUsuario != null)
                {
                if($Model->AtualizaCurtidaPostModel($Acao))
                    {
                    header("Location: post");
                    }else die('Falha ao Atualizar curtida do post');
                }else header("Location: post");
            }

        public function AtualizaCurtidaAutorController()
            {
            $Model = new UsuarioModel();
            $Acao = $_GET['acao'];
            $IdUsuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : NULL;
            if($IdUsuario != null)
                {
                if($Model->AtualizaCurtidaAutorModel($Acao))
                    {
                    header("Location: post");
                    }else die('Falha ao Atualizar curtida do post');
                }else header("Location: post");
            }

        public function GetAllUsuariosController()
            { //Recupera todos usuarios no sistema e retorna paga pagina
            $Model = new UsuarioModel();
            return $usuarios = $Model->GetAllUsuariosModel();  
            }

        public function ExibirAdmAllUsuariosController()
            { //Recupera todos os usuarios no sistema de model, envia para view formatar e retorna á pagina
            $Model = new UsuarioModel();
            $usuarios = $Model->GetAllUsuariosModel();
            $View = new UsuarioView();
            return $View->ExibirAdmAllUsuariosView($usuarios);
            }

        public function ExibirAdmUsuarioFiltroController()
            { //Recupera todos os usuarios que atendam os requisitos do filtro enviado pelo cliente de model,
            //Envia para view formatar e retorna para a pagina formatado
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $View = new UsuarioView();
            $GetUsuario = $_GET['usuario'];
            $GetEmail = $_GET['email'];
            $GetStatus = $_GET['status'];
            $VO->defineNomeUsuario($GetUsuario);
            $VO->defineEmailUsuario($GetEmail);
            $VO->defineStatusUsuario($GetStatus);
            $usuarios = $Model->PegarUsuariosFiltroModel($VO);
            return $View->ExibirAdmAllUsuariosView($usuarios);
            }

        public function AtualizaStatusUsuarioController()
            { //Atualiza status do usuario selecionado pelo cliente
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $status = $_GET['status'];
            $id_usuario = $_GET['id_usuario'];
            $VO->defineIdUsuario($id_usuario);
            $VO->defineStatusUsuario($status);
            if($Model->AtualizaStatusUsuarioModel($VO))
                {
                header("Location: PainelGerenciamentoUsuario");
                }else die('Falha ao atualizar status do usuario');
            }

        public function ExibirSelectUsuariosController()
            { //Recupera todos os usuarios de model, envia a view e retorna formatado a pagina 
            $Model = new UsuarioModel();
            $usuarios = $Model->GetAllUsuariosModel();
            $View = new UsuarioView();
            return $View->ExibirSelectUsuariosView($usuarios);
            }

        public function ExibirSelectEmailController()
            { //Recupera todos os emails de model, envia a view e retorna formatado a pagina
            $Model = new UsuarioModel();
            $usuarios = $Model->GetAllUsuariosModel();
            $View = new UsuarioView();
            return $View->ExibirSelectEmailView($usuarios);
            }
        }

?>