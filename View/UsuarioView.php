<?php

    class UsuarioView
        {
        public function ExibirAdmAllUsuariosView($listaUsuarios)
            {
            $retorno_lista = '';
            foreach($listaUsuarios as $usuario)
                {
                $acao_retorno_usuario = 'Suspender Usuario';
                $acao_usuario = 'Suspenso';
                $acao_retorno_usuario_ = 'Bloquear Usuario';
                $acao_usuario_ = 'Bloqueado';
                if($usuario['img_perfil'] == null)
                    $usuario['img_perfil'] = 'imagens/AgeOfGamesLogo.jpg';

                if($usuario['status_usuario'] == 'Suspenso')
                    {
                    $acao_retorno_usuario = 'Liberar Usuario';
                    $acao_usuario = 'Habilitado';
                    }

                if($usuario['status_usuario'] == 'Bloqueado')
                    {
                    $acao_retorno_usuario_ = 'Liberar Usuario';
                    $acao_usuario_ = 'Suspenso';
                    }

                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<div class="col-sm-2">';
                $retorno_lista .= '<img src="'.$usuario['img_perfil'].'" class="img_postagemAdm">';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-2">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito centro">'.$usuario['nome'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito centro">'.$usuario['email'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-2">';
                $retorno_lista .= '<span class="negrito centro">'.$usuario['status_usuario'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-2">';
                $retorno_lista .= '<a href="index?Controller=Usuario&Action=AtualizaStatusUsuarioController&id_usuario='.$usuario['id_usuario'].'&status='.$acao_usuario_.'"><input type="button" class="btn btn_arquivar" value="'.$acao_retorno_usuario_.'"></a>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-1">';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-1">';
                $retorno_lista .= '<a href="index?Controller=Usuario&Action=AtualizaStatusUsuarioController&id_usuario='.$usuario['id_usuario'].'&status='.$acao_usuario.'"><input type="button" class="btn btn_arquivar" value="'.$acao_retorno_usuario.'"></a>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div><br>';
                }
            return $retorno_lista;
            }

        public function ExibirSelectUsuariosView($listaUsuarios)
            {
            $retorno_lista = '';
            foreach($listaUsuarios as $usuario)
                {
                $retorno_lista .= '<option value="'.$usuario['id_usuario'].'">'.$usuario['nome'].'</option>';
                }
            return $retorno_lista;
            }

        public function ExibirSelectEmailView($listaEmail)
            {
            $retorno_lista = '';
            foreach($listaEmail as $email)
                {
                $retorno_lista .= '<option value="'.$email['email'].'">'.$email['email'].'</option>';
                }
            return $retorno_lista;
            }
        }

?>