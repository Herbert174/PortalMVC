<?php

    require_once('db.class.php');

    class Post
        {
        private $postando;
        private $img_post = "";
        private $retorno;

        public function montar_post($post_enviado)
            {
            foreach($post_enviado as $item_post)
                {
                if(strlen($item_post)<=0)
                    {
                    die("Não é permitido enviar campos vazios");
                    }
                if(strlen($item_post) < 50)
                    {
                    $postando.="<h2>$item_post</h2>";
                    }
                if(strlen($item_post) > 50)
                    {
                    $postando.="<p>$item_post</p>";
                    }
                }

            if(isset($_FILES['imagem']))
                {
                $imagem = $_FILES['imagem'];
                for($img = 0; $img < count($imagem['name']); $img++)
                    {
                    if($imagem['error'][$img])
                        die("Falha ao enviar arquivo");
                    
                    if($imagem['size'][$img] > 2097152)
                        die("Arquivo excedeu o tamanho limite!! Max: 2MB");
                        
                    $pasta = "imagens/";
                    $nomeImagem = $imagem['name'][$img];//nome original do arquivo
                    $novoNomeImagem = uniqid();//gera um id unico para que os nomes das imagens não se repitam
                    $extensao = strtolower(pathinfo($nomeImagem,PATHINFO_EXTENSION));//retorna somento o nome da extensão da imagem/arquivo, transformando ele em minusculo se for preciso com a função strtolower
                                
                    if($extensao != "jpg" && $extensao != "png")//verifica se a extensão enviada é jpg ou png
                        die("Tipo de arquivo não aceito");
                        
                    $path = $pasta.$novoNomeImagem.".".$extensao;
                        
                    $deu_certo = move_uploaded_file($imagem['tmp_name'][$img], $path);//Move o arquivo selecionado para a pasta de imagens/arquivo do servidor
                    $postando.='<img class="img-responsive img_postagem2" src='.$path.'><br><br>';
                    if($img==0)
                        {
                        $img_post = $path;
                        }
                    }  
                }
            
            $retorno[0] = $postando;
            $retorno[1] = $img_post;

            return $retorno;
            }
        
        public function enviar_post($usuario, $postando, $img_post, $titulo_post, $resumo_post)
            {
            $sql = " INSERT INTO post(id_usuario, post, img_post, titulo_post, resumo_post) values('$usuario', '$postando', '$img_post', '$titulo_post', '$resumo_post') ";

            $objDb = new database();//Instância a classe
            $link = $objDb -> conecta_mysql();//Executa função de conexão com o MySQL
                
            $resultado = mysqli_query($link, $sql);
                
            if($resultado)
                {
                header('Location: pagina_usuario.php');
                }else{
                     echo "Erro ao tentar inserir o post";
                     }
            }

        public function postar_post()
            {
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
            
            $lista = [];
            $sql = " SELECT * FROM post ";
            
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                }

            $retorno_lista = '';
            foreach ($lista as $posts)
                {
                $retorno_lista .= '<div class="row custom">';
                $retorno_lista .= '<div class="col-sm-3">';
                $retorno_lista .= '<img src="'.$posts['img_post'].'" class="img_postagem">';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-9">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito">'.$posts['titulo_post'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<p>'.$posts['resumo_post'].'<a href="consulta_post.php?post='.$posts['id_post'].'">leia mais...</a></p>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= 'Comentarios: Que post excelente';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                }

            return $retorno_lista;
            }

        public function post_categoria($categoria_enviada)
            {
            $categoria = $categoria_enviada;

            $objDb = new database();
            $link = $objDb -> conecta_mysql();
            
            $lista = [];
            $sql = " SELECT * FROM post where categoria = '$categoria' ";
            
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                }
            
            $retorno_lista = '';
            foreach ($lista as $posts)
                {
                $retorno_lista .= '<div class="row custom">';
                $retorno_lista .= '<div class="col-sm-3">';
                $retorno_lista .= '<img src="'.$posts['img_post'].'" class="img_postagem">';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="col-sm-9">';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<span class="negrito">'.$posts['titulo_post'].'</span>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= '<p>'.$posts['resumo_post'].'<a href="consulta_post.php?post='.$posts['id_post'].'">leia mais...</a></p>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '<div class="row">';
                $retorno_lista .= 'Comentarios: Que post excelente';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                $retorno_lista .= '</div>';
                }
                
            return $retorno_lista;
            }
        }

?>