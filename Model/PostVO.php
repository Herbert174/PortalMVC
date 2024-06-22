<?php

    class PostVO //Classe utilizada para definir as propriedades do objeto e criar os gets e sets
        {
        private $IdPost;
        private $Post;
        private $ImgPost;
        private $TituloPost;
        private $ResumoPost;
        private $UsuarioPost;
        private $CategoriaPost;
        private $RetornoPost;

        public function retornaIdPost()
            {
            return $this->IdPost;
            }

        public function retornaPost()
            {
            return $this->Post;
            }

        public function definePost($PostEnviado)
            {
            $this->Post = $PostEnviado;
            }

        public function retornaImgPost()
            {
            return $this->ImgPost;
            }

        public function defineImgPost($ImgPostEnviado)
            {
            $this->ImgPost = $ImgPostEnviado;
            }

        public function retornaTituloPost()
            {
            return $this->TituloPost;
            }

        public function defineTituloPost($TituloPostEnviado)
            {
            $this->TituloPost = $TituloPostEnviado;
            }

        public function retornaResumoPost()
            {
            return $this->ResumoPost;
            }

        public function defineResumoPost($ResumoPostEnviado)
            {
            $this->ResumoPost = $ResumoPostEnviado;
            }

        public function retornaUsuarioPost()
            {
            return $this->UsuarioPost;
            }

        public function defineUsuarioPost($UsuarioPostEnviado)
            {
            $this->UsuarioPost = $UsuarioPostEnviado;
            }

        public function retornaCategoriaPost()
            {
            return $this->CategoriaPost;
            }

        public function defineCategoriaPost($CategoriaPostEnviado)
            {
            $this->CategoriaPost = $CategoriaPostEnviado;
            }

        public function retornaRetornoPost()
            {
            return $this->RetornoPost;
            }

        public function defineRetornoPost($RetornoPostEnviado)
            {
            $this->RetornoPost = $RetornoPostEnviado;
            }
        }

?>