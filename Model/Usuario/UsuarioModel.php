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
                        $Usuario->defineImgUsuario('imagens/AgeOfGamesLogo.jpg');
                        }
                }else{
                     $Usuario->defineNomeUsuario('Faça o seu login e aproveite');
                     $Usuario->defineImgUsuario('imagens/AgeOfGamesLogo.jpg');
                     }
            }

        public function VerificaAcessoModel(UsuarioVO $Usuario)
            {
            $usuario = new UsuarioDAO();
            return $usuario->VerificaAcesso($Usuario);
            }

        public function VerificaCurtidasPostModel(UsuarioVO $Usuario)
            {
            $usuario = new UsuarioDAO();
            return $usuario->VerificaCurtidasPost($Usuario);
            }

        public function VerificaCurtidasAutorPostModel(UsuarioVO $Usuario)
            {
            $usuario = new UsuarioDAO();
            return $usuario->VerificaCurtidasAutorPost($Usuario);
            }

        public function AtualizaCurtidaPostModel($Acao)
            {
            $usuario = new UsuarioDAO();
            if($Acao == 'Curtir')
                {
                return $usuario->AdicionarCurtidaPost();
                }
            if($Acao == 'Descurtir')
                {
                return $usuario->RemoverCurtidaPost();
                }
            }

        public function AtualizaCurtidaAutorModel($Acao)
            {
            $usuario = new UsuarioDAO();
            if($Acao == 'Curtir')
                {
                return $usuario->AdicionarCurtidaAutor();
                }
            if($Acao == 'Descurtir')
                {
                return $usuario->RemoverCurtidaAutor();
                }
            }

        public function GetAllUsuariosModel()
            {
            $usuarios = new UsuarioDAO();
            return $usuarios->GetAllUsuarios();
            }

        public function PegarUsuariosFiltroModel(UsuarioVO $Usuarios)
            {
            $usuarios = new UsuarioDAO();
            return $usuarios->PegarUsuariosFiltro($Usuarios);
            }

        public function AtualizaStatusUsuarioModel(UsuarioVO $Usuario)
            {
            $usuario = new UsuarioDAO();
            $status = $Usuario->retornaStatusUsuario();
            if($_SESSION['credencial_adm'] == 'Gestor')
                {
                if($status == 'Habilitado')
                    {
                    $_SESSION['credencial'] = 'Habilitado';
                    }else unset($_SESSION['credencial']);
                return $usuario->AtualizarStatusUsuario($Usuario);
                } else 
                    {
                    if($status == 'Habilitado')
                        {
                        return true;
                        } else return $usuario->AtualizarStatusUsuario($Usuario);
                    }
            }
        }

?>