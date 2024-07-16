<?php

    class UsuarioModel //Classe responsável por aplicar as regras de negocio da aplicação
        {
        public function RegistraUsuarioModel(UsuarioVO $Usuario)
            {
            $usuario = new UsuarioDAO();
            $usuarioVerificado = $usuario->VerificaUsuario($Usuario);
            $emailVerificado = $usuario->VerificaEmail($Usuario);
            if($usuarioVerificado && $emailVerificado)
                {
                if($usuario->RegistrarUsuario($Usuario))
                    {
                    return $usuario->LoginUsuario($Usuario);
                    }
                }
            }

        public function LoginUsuarioModel(UsuarioVO $Usuario)
            {
            $usuario = new UsuarioDAO();
            return $usuario->LoginUsuario($Usuario);
            }

        public function DeslogaUsuarioModel()
            {
            $usuario = new UsuarioDAO();
            return $usuario->DeslogaUsuario();
            }

        public function ApagarUsuarioModel($IdUsuario)
            {
            $usuario = new UsuarioDAO();
            return $usuario->ApagarUsuario($IdUsuario);
            }

        public function AtualizaUsuarioModel(UsuarioVO $Usuario)
            {
            $usuario = new UsuarioDAO();
            $img = $usuario->VerificaImgUsuario($Usuario);
            $nome = $Usuario->retornaNomeUsuario($Usuario);
            if(strlen($nome) != 0)
                {
                $usuario->AtualizaNomeUsuario($Usuario);
                $_SESSION['usuario'] = $nome;
                }
            if($img)
                {
                $usuario->AtualizaImgUsuario($Usuario);
                $_SESSION['img_perfil'] = $img;
                }
            return true;
            }

        public function VerificaLoginModel(UsuarioVO $Usuario)
            {
            $Nome = $Usuario->retornaNomeUsuario();
            $Img = $Usuario->retornaImgUsuario();
            if($Nome != NULL)
                {
                if($Img != NULL)
                    {
                    }
                    else{
                        $Usuario->defineImgUsuario('imagens/logo.png');
                        }
                }else{
                     $Usuario->defineNomeUsuario('Faça o seu login e aproveite');
                     $Usuario->defineImgUsuario('imagens/logo.png');
                     }
            }

        public function GetAllUsuariosModel()
            {
            $usuarios = new UsuarioDAO();
            return $usuarios->GetAllUsuarios();
            }
        }

?>