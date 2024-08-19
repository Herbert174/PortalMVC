<?php

    class ComentarioDAO //Classe utilizada para fazer a comunicação com o banco de dados
        {
        public function EnviarComentario(ComentarioVO $Comentario)
            { //Envia comentario enviado pelo cliente para o banco de dados
            $comentario = $Comentario->retornaComentario();
            $usuario = $Comentario->retornaIdUsuario();
            $post = $Comentario->retornaIdPost();

            $timezone = new DateTimeZone('America/Sao_Paulo');
            $data_comentario = new DateTime('now', $timezone);
            $data = $data_comentario->format('Y/m/d');
            $hora = $data_comentario->format('H:i:s');

            $sql = " INSERT INTO comentarios(id_usuario, comentario, id_post, data_comentario, hora_comentario) ";
            $sql .= " values('$usuario', '$comentario', '$post', '$data', '$hora') ";

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            if($resultado_post = mysqli_query($link, $sql))
                {
                return true;
                }else
                    return false;
            }

        public function ApagarComentario(ComentarioVO $Comentario)
            { //Apaga comentario selecionado pelo cliente do banco de dados
            $id_comentario = $Comentario->retornaIdComentario();

            $sql = " DELETE FROM comentarios WHERE id_comentario = '$id_comentario' ";

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            if($resultado_post = mysqli_query($link, $sql))
                {
                return true;
                } else 
                    return false;
            }

        public function PegarComentariosUsuarios(ComentarioVO $Comentario)
            { //Recupera do banco de dados todos os comentarios do seguinte post passado, junto a info. usuario
            $IdPost = $Comentario->retornaIdPost();

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            $sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
            $sql .= " WHERE id_post = '$IdPost' AND status_comentario = 'Habilitado' ";

            if($Resultado_Comentarios = mysqli_query($link, $sql))
                {
                $comentarios = mysqli_fetch_all($Resultado_Comentarios, MYSQLI_ASSOC);
                return $comentarios;
                }else
                    return false;
            }

        public function PegarAllComentariosUsuarios()
            { //Recupera do banco de dados todos os comentarios, junto a info. usuario
            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            $sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
            $sql .= " LEFT JOIN post AS p ON (c.id_post = p.id_post) ";

            if($Resultado_Comentarios = mysqli_query($link, $sql))
                {
                $comentarios = mysqli_fetch_all($Resultado_Comentarios, MYSQLI_ASSOC);
                return $comentarios;
                }else
                    return false;
            }

        public function PegarComentariosUsuariosFiltro(ComentarioVO $Comentario)
            {
            $TituloPost = $Comentario->retornaTituloPost();
            $Usuario = $Comentario->retornaIdUsuario();
            $DataComentario = $Comentario->retornaDataComentario();

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            //----------------------------  Logica do filtro enviado  ---------------------------

            if($TituloPost == '' && $Usuario == '' && $DataComentario == '')
                {
                $sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
                $sql .= " LEFT JOIN post AS p ON (c.id_post = p.id_post) ";
                }

            if($TituloPost == '' && $Usuario == '' && $DataComentario != '')
                {
                $sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
                $sql .= " LEFT JOIN post AS p ON (c.id_post = p.id_post) WHERE c.data_comentario = '$DataComentario' ";
                }

            if($TituloPost == '' && $Usuario != '' && $DataComentario == '')
                {
                $sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
                $sql .= " LEFT JOIN post AS p ON (c.id_post = p.id_post) WHERE c.id_usuario = '$Usuario' ";
                }

            if($TituloPost == '' && $Usuario != '' && $DataComentario != '')
                {
                $sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
                $sql .= " LEFT JOIN post AS p ON (c.id_post = p.id_post) WHERE c.data_comentario = '$DataComentario' ";
                $sql .= " AND c.id_usuario = '$Usuario' ";
                }

            if($TituloPost != '' && $Usuario == '' && $DataComentario == '')
                {
                $sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
                $sql .= " LEFT JOIN post AS p ON (c.id_post = p.id_post) WHERE p.titulo_post = '$TituloPost' ";
                }

            if($TituloPost != '' && $Usuario == '' && $DataComentario != '')
                {
                $sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
                $sql .= " LEFT JOIN post AS p ON (c.id_post = p.id_post) WHERE c.data_comentario = '$DataComentario' ";
                $sql .= " AND p.titulo_post = '$TituloPost' ";
                }

            if($TituloPost != '' && $Usuario != '' && $DataComentario == '')
                {
                $sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
                $sql .= " LEFT JOIN post AS p ON (c.id_post = p.id_post) WHERE c.id_usuario = '$Usuario' ";
                $sql .= " AND p.titulo_post = '$TituloPost' ";
                }

            if($TituloPost != '' && $Usuario != '' && $DataComentario != '')
                {
                $sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
                $sql .= " LEFT JOIN post AS p ON (c.id_post = p.id_post) WHERE c.data_comentario = '$DataComentario' ";
                $sql .= " AND p.titulo_post = '$TituloPost' AND c.id_usuario = '$Usuario' ";
                }

            //----------------------------  Logica do filtro enviado  ---------------------------

            /*$sql = " SELECT * FROM comentarios AS c LEFT JOIN usuarios AS u ON (c.id_usuario = u.id_usuario) ";
            $sql .= " LEFT JOIN post AS p ON (c.id_post = p.id_post) ";*/

            if($Resultado_Comentarios = mysqli_query($link, $sql))
                {
                $comentarios = mysqli_fetch_all($Resultado_Comentarios, MYSQLI_ASSOC);
                return $comentarios;
                }else
                    return false;
            }

        public function RecuperarQntdComentarios()
            { //Recupera quantidade total de comentarios registrado no banco de dados
            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            $sql = " SELECT id_comentario FROM comentarios ";

            if($Resultado_Comentarios = mysqli_query($link, $sql))
                {
                $comentarios = mysqli_fetch_all($Resultado_Comentarios, MYSQLI_ASSOC);
                return $comentarios;
                }else
                    return false;
            }

        public function AtualizarStatusComentario(ComentarioVO $Comentario) //Atualiza status do comentario no banco de dados
            {
            $id_comentario = $Comentario->retornaIdComentario();
            $status_comentario = $Comentario->retornaStatusComentario();
            $data = null;

            if($status_comentario == 'Suspenso')
                {
                $timezone = new DateTimeZone('America/Sao_Paulo');
                $data_arquivado = new DateTime('now', $timezone);
                $data = $data_arquivado->format('Y/m/d');
                }else $data = null;

            $sql = " UPDATE comentarios SET status_comentario = '$status_comentario', data_arquivado = '$data' WHERE id_comentario = '$id_comentario' ";

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            if($resultado_comentario = mysqli_query($link, $sql))
                {
                return true;
                } else 
                    return false;
            }

        public function VerificaCurtidasComentario(ComentarioVO $Comentario)
            {
            $IdUsuario = $Comentario->retornaIdUsuario();
            $IdComentario = $Comentario->retornaIdComentario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();
            
            $sql = " SELECT * FROM lista_curtidas_comentarios WHERE id_usuario = '$IdUsuario' AND id_comentario = '$IdComentario' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                if($Curtida = mysqli_fetch_array($Resultado))
                    {
                    return true;
                    }else return false;
                }else die ('Falha ao se comunicar com o banco de dados');
            }

        public function AdicionarCurtidaComentario()
            {
            $IdUsuario = $_SESSION['id_usuario'];
            $IdComentario = $_GET['id_comentario'];
            $QntdAntigaCurtidas = $_GET['qntdCurtidas'];
            $qntdCurtidas = $QntdAntigaCurtidas + 1;

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " INSERT INTO lista_curtidas_comentarios(id_usuario, id_comentario) ";
            $sql .= " values('$IdUsuario', '$IdComentario') ";

            if($AddCurtida = mysqli_query($link, $sql))
                {
                $sql = " UPDATE comentarios SET qntd_curtidas = '$qntdCurtidas' WHERE id_comentario = '$IdComentario' ";
                if($AttQntdCurtidas = mysqli_query($link, $sql))
                    {
                    return true;
                    }else
                        die('Falha ao atualizar qntd curtidas no banco de dados'); 
                }else
                    die('Falha ao adicionar sua curtida no banco de dados');      
            }

        public function RemoverCurtidaComentario()
            {
            $IdUsuario = $_SESSION['id_usuario'];
            $IdComentario = $_GET['id_comentario'];
            $QntdAntigaCurtidas = $_GET['qntdCurtidas'];
            $qntdCurtidas = $QntdAntigaCurtidas - 1;

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " DELETE FROM lista_curtidas_comentarios WHERE id_usuario = '$IdUsuario' AND id_comentario = '$IdComentario' ";

            if($RemCurtida = mysqli_query($link, $sql))
                {
                $sql = " UPDATE comentarios SET qntd_curtidas = '$qntdCurtidas' WHERE id_comentario = '$IdComentario' ";
                if($AttQntdCurtidas = mysqli_query($link, $sql))
                    {
                    return true;
                    }else
                        die('Falha ao atualizar qntd curtidas no banco de dados');
                }else
                    return false;
            }
        }

?>