<?php

    class PostModel //Essa classe é responsável por aplicar as regras de negocio da aplicação
        {
        public function EnviarPostModel(PostVO $Post)
            { //Monta e envia o Post para o banco de dados
            $post = new PostDAO();
            $postMontado = $post->MontarPost($Post);
            return $post->EnviarPost($postMontado);
            }

        public function PegarAllPostModel()
            { //Pega todos os posts armazenados no banco de dados
            $post = new PostDAO();
            return $post->PegarAllPosts();
            }

        public function PegarPostCategoriaModel($Categoria)
            { //Pega todos os posts de determinada categoria armazenado no banco de dados
            $post = new PostDAO();
            return $post->PegarPostCategoria($Categoria);
            }

        public function ConsultaPostModel($IDPost)
            { //Consulta post em questão e o retorna do banco de dados
            $post = new PostDAO();
            return $post->ConsultaPost($IDPost);
            }

        public function AtualizarPostModel(PostVO $Post)
            { //Atualiza post enviado e salva no banco de dados
            $post = new PostDAO();
            return $post->AtualizarPost($Post);
            }

        public function ApagarPostModel(PostVO $Post)
            { //Apaga o post apontado
            $post = new PostDAO();
            return $post->ApagarPost($Post);
            }
        }

?>