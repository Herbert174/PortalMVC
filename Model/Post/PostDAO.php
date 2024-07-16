<?php

    class PostDAO //Classe utilizada para fazer a comunicação com o banco de dados
        {
        public function MontarPost(PostVO $Post)
            {
            $POST = $Post->retornaPost();
            
            //die(var_dump($Post));
            $postando = '';
            foreach($POST as $item_post)
                {
                if(strlen($item_post)<=0)
                    {
                    die("Não é permitido enviar campos vazios");
                    }
                if(strlen($item_post) < 50)
                    {
                    if(filter_var($item_post, FILTER_VALIDATE_URL) !== false)
                        {
                        $postando.='<img class="img-responsive img_postagem2" src='.$item_post.'><br><br>';
                        }else{
                            $postando.="<h2>$item_post</h2>";
                            }
                    }
                if(strlen($item_post) > 50)
                    {
                    if(filter_var($item_post, FILTER_VALIDATE_URL) !== false)
                        {
                        $postando.='<img class="img-responsive img_postagem2" src='.$item_post.'><br><br>';
                        }else{
                            $postando.="<p>$item_post</p>";
                            }
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
                        $Post->DefineImgPost($path);
                        die(var_dump($imagem));
                        }
                    }  
                }

            $Post->DefinePost($postando);

            //sort($numeros, SORT_NATURAL); SORT_NATURAL responsável por ordenar um array de maneira crescente
            //talvez seja util para conseguir organizar a sequencia do post com as imagens
            

            return $Post;
            }

        public function EnviarPost(PostVO $Post)
            {
            $usuario = $Post->retornaUsuarioPost();
            $post = $Post->retornaPost();
            $img_post = $Post->retornaImgPost();
            $titulo_post = $Post->retornaTituloPost();
            $resumo_post = $Post->retornaResumoPost();
            $categoria = $Post->retornaCategoriaPost();

            $sql = " INSERT INTO post(id_usuario, post, img_post, titulo_post, resumo_post, categoria) ";
            $sql .= " values('$usuario', '$post', '$img_post', '$titulo_post', '$resumo_post', '$categoria') ";

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            if($resultado_post = mysqli_query($link, $sql))
                {
                return true;
                }else
                    return false;
            }

        public function PegarAllPosts()
            {
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
                
            $lista = [];
            $retorno_lista = '';
            $sql = " SELECT * FROM post ";
                
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }else 
                    return false;
            }

        public function PegarPostCategoria($Categoria)
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
                return $lista;
                }else
                    return false;
            }

        public function ConsultaPost($IDPost)
            {
            $IdPost = $IDPost;

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            $sql = " SELECT * FROM post where id_post = '$IdPost' ";

            if($Resultado_Post = mysqli_query($link, $sql))
                {
                $Post = mysqli_fetch_array($Resultado_Post);
                return $Post;
                }else
                    return false;
            }

        public function AtualizarPost(PostVO $Post)
            {
            $usuario = $Post->retornaUsuarioPost();
            $post = $Post->retornaPost();
            $img_post = $Post->retornaImgPost();
            $titulo_post = $Post->retornaTituloPost();
            $resumo_post = $Post->retornaResumoPost();
            $id_post = $Post->retornaIdPost();

            $sql = " UPDATE post SET id_usuario = '$usuario', post = '$post', img_post = '$img_post', ";
            $sql .= " titulo_post = '$titulo_post', resumo_post = '$resumo_post' WHERE id_post = '$id_post' ";

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            if($resultado_post = mysqli_query($link, $sql))
                {
                return true;
                } else 
                    return false;
            }

        public function ApagarPost(PostVO $Post)
            {
            $id_post = $Post->retornaIdPost();

            $sql = " DELETE FROM post WHERE id_post = '$id_post' ";

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            if($resultado_post = mysqli_query($link, $sql))
                {
                return true;
                } else 
                    return false;
            }
        }

?>