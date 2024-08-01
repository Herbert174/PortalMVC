<?php

    class ComentarioModel //Essa classe é responsável por aplicar as regras de negocio da aplicação
        {
        public function EnviarComentarioModel(ComentarioVO $Comentario)
            {
            $comentario = new ComentarioDAO();
            $id_usuario = $Comentario->retornaIdUsuario();
            if($id_usuario == null)
                {
                return false;
                } else 
                    return $comentario->EnviarComentario($Comentario);
            }

        public function ApagarComentarioModel(ComentarioVO $Comentario)
            {
            $comentario = new ComentarioDAO();
            return $comentario->ApagarComentario($Comentario);
            }

        public function PegarComentariosUsuariosModel(ComentarioVO $Comentario)
            {
            $comentario = new ComentarioDAO();
            return $comentario->PegarComentariosUsuarios($Comentario);
            }

        public function PegarAllComentariosUsuariosModel()
            {
            $comentario = new ComentarioDAO();
            return $comentario->PegarAllComentariosUsuarios();
            }

        public function PegarComentariosUsuariosFiltroModel(ComentarioVO $Comentario)
            {
            $comentario = new ComentarioDAO();
            return $comentario->PegarComentariosUsuariosFiltro($Comentario);
            }

        public function RecuperarQntdComentariosModel()
            {
            $comentario = new ComentarioDAO();
            return $comentario->RecuperarQntdComentarios();
            }

        public function AtualizaStatusComentarioModel(ComentarioVO $Comentario)
            { //Atualiza status do comentario escolhido pelo cliente
            $comentario = new ComentarioDAO();
            return $comentario->AtualizarStatusComentario($Comentario);
            }

        public function VerificaCurtidasComentarioModel(ComentarioVO $Comentario)
            {
            $comentario = new ComentarioDAO();
            return $comentario->VerificaCurtidasComentario($Comentario);
            }

        public function AtualizaCurtidaComentarioModel($Acao)
            {
            $comentario = new ComentarioDAO();
            if($Acao == 'Curtir')
                {
                return $comentario->AdicionarCurtidaComentario();
                }
            if($Acao == 'Descurtir')
                {
                return $comentario->RemoverCurtidaComentario();
                }
            }
        }

?>