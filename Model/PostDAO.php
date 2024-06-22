<?php

    class PostDAO //Classe utilizada para fazer a comunicação com o banco de dados
        {
        public function MontarPost(PostVO $Post)
            {
            $POST = $Post->retornaPost();
            foreach($POST as $item_post)
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
                        $ImgPost = $path;
                        }
                    }  
                }

            $Post->DefinePost($postando);
            $Post->DefineImgPost($ImgPost);

            return $Post;
            }

        public function EnviarPost(PostVO $Post)
            {
            $usuario = $Post->retornaUsuarioPost();
            $post = $Post->retornaPost();
            $img_post = $Post->retornaImgPost();
            $titulo_post = $Post->retornaTituloPost();
            $resumo_post = $Post->retornaResumoPost();

            $sql = " INSERT INTO post(id_usuario, post, img_post, titulo_post, resumo_post) ";
            $sql .= " values('$usuario', '$post', '$img_post', '$titulo_post', '$resumo_post') ";

            $objDb = new database();
            $link = $objDb->conecta_mysql();
            $resultado_produto = mysqli_query($link, $sql);

            if($resultado_produto)
                {
                echo "Post enviado com sucesso, já pode direcionar para View";
                }else{
                    echo "Erro ao enviar o post";
                    }
            }

        public function PostarAllPosts()
            {
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
                
            $lista = [];
            $retorno_lista = '';
            $sql = " SELECT * FROM post ";
                
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                }

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

        public function Post_Categoria($Categoria)
            {
            $categoria = $Categoria;

            $objDb = new database();
            $link = $objDb -> conecta_mysql();
                
            $lista = [];
            $retorno_lista = '';
            $sql = " SELECT * FROM post where categoria = '$categoria' ";
                
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                }
                
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