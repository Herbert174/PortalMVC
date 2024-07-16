<?php

    class PostView //Classe utilizada para trazer a visualização para a aplicação
        {
        public function ExibirAllPostView($listaPosts)
            {
            $retorno_lista = '';
            foreach($listaPosts as $post)
                {
                $retorno_lista .= '<div class="row custom">';
                $retorno_lista .= '<div class="col-sm-3">';
                $retorno_lista .= '<img src="'.$post['img_post'].'" class="img_postagem">';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-9">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito">'.$post['titulo_post'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<p>'.$post['resumo_post'].'<a href="index.php?Controller=Post&Action=PegarPostController&post='.$post['id_post'].'">leia mais...</a></p>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= 'Comentarios: Que post excelente';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                }
            return $retorno_lista;
            }

        public function ExibirPostCategoriaView($listaPosts)
            {
            $retorno_lista = '';
            foreach($listaPosts as $post)
                {
                $retorno_lista .= '<div class="row custom">';
                $retorno_lista .= '<div class="col-sm-3">';
                $retorno_lista .= '<img src="'.$post['img_post'].'" class="img_postagem">';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-9">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito">'.$post['titulo_post'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<p>'.$post['resumo_post'].'<a href="index.php?Controller=Post&Action=PegarPostController&post='.$post['id_post'].'">leia mais...</a></p>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= 'Comentarios: Que post excelente';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                }
            return $retorno_lista;
            }

        public function ExibirPostView($post)
            {
            $Post = $post;
			$_SESSION['titulo_post'] = $Post['titulo_post'];
			$_SESSION['resumo_post'] = $Post['resumo_post'];
            $_SESSION['post'] = $Post['post'];
            return $post;
            }
        }

?>