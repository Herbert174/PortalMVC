<?php

    class ComentarioView //Classe utilizada para trazer a visualização para a aplicação
        {
        public function ExibirComentariosView($Comentarios)
            {
            $id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;
            $retorno_lista = '';
            $Controller = new ComentarioController();
            $curtiuComentario = '';
            $acaoCurtidaComentario = '';
            foreach($Comentarios as $comentario)
                {
                $IdComentario = $comentario['id_comentario'];
                $qntdCurtidadesComentario = $comentario['qntd_curtidas'];
                
                if($CurtidaComentario = $Controller->VerificaCurtidasComentarioController($IdComentario))
                    {
                    $curtiuComentario = "imagens/curtido.png";
                    $acaoCurtidaComentario = "post?Controller=Comentario&Action=AtualizaCurtidaComentarioController&acao=Descurtir&id_comentario=$IdComentario&qntdCurtidas=$qntdCurtidadesComentario";
                    }else 
                        {
                        $curtiuComentario = "imagens/curtir.png";
                        $acaoCurtidaComentario = "post?Controller=Comentario&Action=AtualizaCurtidaComentarioController&acao=Curtir&id_comentario=$IdComentario&qntdCurtidas=$qntdCurtidadesComentario";
                        }
            
                $acaocomentario = '';
                if($comentario['img_perfil'] == null)
                    $comentario['img_perfil'] = 'imagens/AgeOfGamesLogo.jpg';

                if($comentario['id_usuario'] == $id_usuario)
                    {
                    $acaocomentario = '<div class="row"> <a href="post?Controller=Comentario&Action=ApagarComentarioController&id_comentario='.$comentario['id_comentario'].'"><input type="button" class="btn btn_arquivar" value="Apagar comentario"></a> </div>';
                    }
                
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<div class="col-sm-2">';
                $retorno_lista .= '<img src="'.$comentario['img_perfil'].'" class="img_comentario">';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-10">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito">'.$comentario['nome'].'</span>&nbsp;&nbsp;';
                $retorno_lista .= '<span class="">'.date('d/m/Y', strtotime($comentario['data_comentario'])).'</span>&nbsp;&nbsp;';
                $retorno_lista .= '<span class="">'.$comentario['hora_comentario'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<p>'.$comentario['comentario'].'<a href="'.$acaoCurtidaComentario.'"><img class="img_curtida_comentario" src="'.$curtiuComentario.'"></a></p>';
                $retorno_lista .= '</div>';
                $retorno_lista .= $acaocomentario;
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div><br>';
                }
            return $retorno_lista;
            }

        public function ExibirAdmComentariosView($Comentarios)
            {
            $id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;
            $retorno_lista = '';
            foreach($Comentarios as $comentario)
                {
                $acao_retorno_comentario = 'Suspender';
                $acaocomentario = 'Suspenso';

                if($comentario['img_perfil'] == null)
                    $comentario['img_perfil'] = 'imagens/AgeOfGamesLogo.jpg';

                if($comentario['status_comentario'] == 'Suspenso')
                    {
                    $acao_retorno_comentario = 'Liberar';
                    $acaocomentario = 'Habilitado';
                    }
                
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<div class="col-sm-2">';
                $retorno_lista .= '<img src="'.$comentario['img_perfil'].'" class="img_comentario">';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-6">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito">'.$comentario['nome'].'</span>&nbsp;&nbsp;';
                $retorno_lista .= '<span class="">'.date('d/m/Y', strtotime($comentario['data_comentario'])).'</span>&nbsp;&nbsp;';
                $retorno_lista .= '<span class="">'.$comentario['hora_comentario'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= 'Post - <span class="negrito">'.$comentario['titulo_post'].'</span>&nbsp;&nbsp;';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<p>'.$comentario['comentario'].'</p>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-4">';
                $retorno_lista .= '<div class="col-sm-6">';
                $retorno_lista .= '<a href="post?Controller=Comentario&Action=AtualizaAdmStatusComentarioController&id_comentario='.$comentario['id_comentario'].'&status='.$acaocomentario.'"><input type="button" class="btn btn_arquivar" value="'.$acao_retorno_comentario.'"></a>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-6">';
                $retorno_lista .= '<a href="post?Controller=Comentario&Action=ApagarComentarioController&id_comentario='.$comentario['id_comentario'].'"><input type="button" class="btn btn_arquivar" value="Apagar"></a>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div><br>';
                }
            return $retorno_lista;
            }
        }

?>