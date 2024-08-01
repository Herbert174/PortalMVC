<?php

    class ComentarioVO //Classe utilizada para definir as propriedades do objeto e criar os gets e sets
        {
        private $IdComentario;
        private $Comentario;
        private $DataComentario;
        private $HoraComentario;
        private $IdUsuario;
        private $StatusComentario;
        private $IdPost;
        private $TituloPost;

        public function retornaIdComentario()
            {
            return $this->IdComentario;
            }

        public function defineIdComentario($IdEnviado)
            {
            $this->IdComentario = $IdEnviado;
            }

        public function retornaComentario()
            {
            return $this->Comentario;
            }

        public function defineComentario($ComentarioEnviado)
            {
            $this->Comentario = $ComentarioEnviado;
            }

        public function retornaDataComentario()
            {
            return $this->DataComentario;
            }

        public function defineDataComentario($DataEnviado)
            {
            $this->DataComentario = $DataEnviado;
            }

        public function retornaHoraComentario()
            {
            return $this->HoraComentario;
            }

        public function defineHoraComentario($HoraEnviado)
            {
            $this->HoraComentario = $HoraEnviado;
            }

        public function retornaIdUsuario()
            {
            return $this->IdUsuario;
            }

        public function defineIdUsuario($IdEnviado)
            {
            $this->IdUsuario = $IdEnviado;
            }

        public function retornaStatusComentario()
            {
            return $this->StatusComentario;
            }

        public function defineStatusComentario($StatusEnviado)
            {
            $this->StatusComentario = $StatusEnviado;
            }

        public function retornaIdPost()
            {
            return $this->IdPost;
            }

        public function defineIdPost($IdEnviado)
            {
            $this->IdPost = $IdEnviado;
            }

        public function retornaTituloPost()
            {
            return $this->TituloPost;
            }

        public function defineTituloPost($TituloEnviado)
            {
            $this->TituloPost = $TituloEnviado;
            }
        }

?>