<?php

    class PostView //Classe utilizada para trazer a visualização para a aplicação
        {
        public function ExibirAllPostView($listaPosts)
            {
            $retorno_lista = '';
            foreach($listaPosts as $post)
                {
                if($post['img_post'] == null)
                    $post['img_post'] = 'imagens/postagem14.png';
                
                $retorno_lista .= '<div class="row custom">';
                $retorno_lista .= '<div class="col-sm-3">';
                $retorno_lista .= '<a href="index?Controller=Post&Action=PegarPostController&post='.$post['id_post'].'"><img src="'.$post['img_post'].'" class="img_postagem"></a>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-9">';
                $retorno_lista .= '<div class="col-sm-12">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito">'.$post['titulo_post'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<p>'.$post['resumo_post'].'</p>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                }
            return $retorno_lista;
            }

        public function ExibirAdmAllPostView($listaPosts)
            {
            $retorno_lista = '';
            foreach($listaPosts as $post)
                {
                $acao_retorno_post = 'Apagar Post';
                $acao_post = 'Suspenso';
                if($post['img_perfil'] == null)
                    $post['img_perfil'] = 'imagens/AgeOfGamesLogo.jpg';

                if($post['img_post'] == null)
                    $post['img_post'] = 'imagens/postagem14.png';

                if($post['status_post'] == 'Suspenso')
                    {
                    $acao_retorno_post = 'Liberar Post';
                    $acao_post = 'Habilitado';
                    }

                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<div class="col-sm-1">';
                $retorno_lista .= '<img src="'.$post['img_perfil'].'" class="img_postagemAdm">';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-2">';
                $retorno_lista .= '<span class="negrito centro">'.$post['nome'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-1">';
                $retorno_lista .= '<a href="index?Controller=Post&Action=PegarPostController&post='.$post['id_post'].'"><img src="'.$post['img_post'].'" class="img_postagemAdm"></a>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-4">';
                $retorno_lista .= '<span class="negrito centro">'.$post['titulo_post'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-2">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito centro">'.$post['categoria'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito">'.$post['data_post'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-2">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<a><input type="button" class="btn btn_arquivar" value="'.$acao_retorno_post.'" onclick="confirme('.$post['id_post'].');"></a>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div><br>';
                }
            return $retorno_lista;
            }

        public function ExibirMeusPostView($listaPosts)
            {
            $retorno_lista = '';
            foreach($listaPosts as $post)
                {
                $acao_retorno_post = 'Apagar Post';
                $acao_post = 'Suspenso';
                if($post['img_post'] == null)
                    $post['img_post'] = 'imagens/postagem14.png';

                if($post['status_post'] == 'Suspenso')
                    {
                    $acao_retorno_post = 'Liberar Post';
                    $acao_post = 'Habilitado';
                    }

                $retorno_lista .= '<div class="row custom">';
                $retorno_lista .= '<div class="col-sm-3">';
                $retorno_lista .= '<a href="index?Controller=Post&Action=PegarPostController&post='.$post['id_post'].'"><img src="'.$post['img_post'].'" class="img_postagem"></a>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-9">';
                $retorno_lista .= '<div class="col-sm-12">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito">'.$post['titulo_post'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<p>'.$post['resumo_post'].'</p>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<a class="link_direita"><input type="button" class="btn btn_arquivar btn_apagar" data-id_post="'.$post['id_post'].'" value="'.$acao_retorno_post.'"></a>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                //$retorno_lista .= '<a class="link_direita" href="index?Controller=Post&Action=AtualizaStatusMeusPostController&id_post='.$post['id_post'].'&status='.$acao_post.'"><input type="button" class="btn btn_arquivar" value="'.$acao_retorno_post.'"></a>';
                }
            return $retorno_lista;
            }

        public function ExibirPostView($post)
            {
            $Post = $post;
            $_SESSION['id_autor_post'] = $Post['id_usuario'];
            $_SESSION['qntd_curtidas_post'] = $Post['qntd_curtidas'];
			$_SESSION['titulo_post'] = $Post['titulo_post'];
			$_SESSION['resumo_post'] = $Post['resumo_post'];
            $_SESSION['post'] = $Post['post'];
            return $post;
            }
        }

?>