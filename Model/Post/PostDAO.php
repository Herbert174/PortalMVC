<?php

    class PostDAO //Classe utilizada para fazer a comunicação com o banco de dados
        {
        public function MontarPost(PostVO $Post) //Monta post enviado pelo cliente seguindo as regras de cada
            {//campo escolhido para retornar a formatação correta e salva imagem de capa no servidor caso 
            //cliente tenha enviado alguma
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
                    
                    if($imagem['size'][$img] > 4194304)
                        die("Arquivo excedeu o tamanho limite!! Max: 4MB");
                        
                    $pasta = "imagens/";
                    $nomeImagem = $imagem['name'][$img];//nome original do arquivo
                    $novoNomeImagem = uniqid();//gera um id unico para que os nomes das imagens não se repitam
                    $extensao = strtolower(pathinfo($nomeImagem,PATHINFO_EXTENSION));//retorna somento o nome da extensão da imagem/arquivo, transformando ele em minusculo se for preciso com a função strtolower
                    $idUsuario = $Post->retornaUsuarioPost();   
                    
                    if($extensao != "jpg" && $extensao != "png")//verifica se a extensão enviada é jpg ou png
                        die("Tipo de arquivo não aceito");
                        
                    $path = $pasta.$idUsuario."_".$novoNomeImagem.".".$extensao;
                        
                    $deu_certo = move_uploaded_file($imagem['tmp_name'][$img], $path);//Move o arquivo selecionado para a pasta de imagens/arquivo do servidor
                    //$postando.='<img class="img-responsive img_postagem2" src="'.$path.'"><br><br>';
                    if($img==0)
                        {
                        $Post->DefineImgPost($path);
                        }
                    }
                }

            $Post->DefinePost($postando);

            //sort($numeros, SORT_NATURAL); SORT_NATURAL responsável por ordenar um array de maneira crescente
            //talvez seja util para conseguir organizar a sequencia do post com as imagens
            

            return $Post;
            }

        public function EnviarPost(PostVO $Post) //Envia post enviado pelo cliente para o banco de dados
            {
            $usuario = $Post->retornaUsuarioPost();
            $post = $Post->retornaPost();
            $img_post = $Post->retornaImgPost();
            $titulo_post = $Post->retornaTituloPost();
            $resumo_post = $Post->retornaResumoPost();
            $categoria = $Post->retornaCategoriaPost();
            
            $timezone = new DateTimeZone('America/Sao_Paulo');
            $data_post = new DateTime('now', $timezone);
            $data = $data_post->format('Y/m/d');

            $sql = " INSERT INTO post(id_usuario, post, img_post, titulo_post, resumo_post, categoria, data_post) ";
            $sql .= " values('$usuario', '$post', '$img_post', '$titulo_post', '$resumo_post', '$categoria', '$data') ";

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            if($resultado_post = mysqli_query($link, $sql))
                {
                return true;
                }else
                    return false;
            }

        public function PegarAllPosts() //Recupera do banco de dados todos os posts habilitados em ordem de postagem
            {
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
                
            $lista = [];
            $retorno_lista = '';
            $sql = " SELECT * FROM post WHERE status_post = 'Habilitado' ORDER BY id_post DESC ";
                
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }else 
                    return false;
            }

        public function PegarAllMelhoresPosts() //Recupera do banco de dados todos os posts habilitados em ordem de curtidas
            {
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
                
            $lista = [];
            $retorno_lista = '';
            $sql = " SELECT * FROM post WHERE status_post = 'Habilitado' ORDER BY qntd_curtidas DESC ";
                
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }else 
                    return false;
            }

        public function PegarMeusPostsSugeridos($IDUsuario) //Recupera do banco de dados todos os posts sugeridos
            {
            $IdUsuario = $IDUsuario;

            $objDb = new database();
            $link = $objDb -> conecta_mysql();
                
            $lista = [];
            $retorno_lista = '';
            $sql = " SELECT f.id_usuario, f.id_criador, p.id_post, p.img_post, p.titulo_post, p.resumo_post ";
            $sql .= " FROM lista_follow AS f LEFT JOIN post AS p ON (f.id_criador = p.id_usuario) ";
            $sql .= " WHERE f.id_usuario = '$IdUsuario' AND p.status_post = 'Habilitado' ORDER BY p.qntd_curtidas DESC ";
                
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }else 
                    return false;
            }

        public function PegarAllPostsUsuarios() //Recupera do banco de dados todos os posts junto a info. de usuarios
            {
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
                
            $lista = [];
            $retorno_lista = '';
            $sql = " SELECT p.id_post, p.img_post, p.titulo_post, p.data_post, ";
            $sql .= " p.categoria, p.id_usuario, p.status_post, u.id_usuario, u.nome, u.img_perfil "; 
            $sql .= " FROM post AS p LEFT JOIN usuarios AS u ON (p.id_usuario = u.id_usuario) ORDER BY id_post DESC ";
                
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }else 
                    return false;
            }

        public function PegarPostCategoria($Categoria) //Pega todos os posts do banco de dados da categoria enviada
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

        public function PegarPostFiltro(PostVO $Post) //Recupera do banco de dados todos os posts junto a info.
            {//de usuarios que atendam ao filtro enviado pelo cliente
            $usuario = $Post->retornaUsuarioPost();
            $categoria = $Post->retornaCategoriaPost();
            $status = $Post->retornaStatusPost();
            $data_post = $Post->retornaDataPost();

            $objDb = new database();
            $link = $objDb -> conecta_mysql();
                
            $lista = [];
            $retorno_lista = '';

            //----------------------------  Logica do filtro enviado  ---------------------------

            if($usuario == '' && $categoria == '' && $status == '' && $data_post == '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) ORDER BY id_post DESC ";
                }

            if($usuario == '' && $categoria == '' && $status == '' && $data_post != '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where data_post = '$data_post' ORDER BY id_post DESC ";
                }

            if($usuario == '' && $categoria == '' && $status != '' && $data_post == '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where status_post = '$status' ORDER BY id_post DESC ";
                }

            if($usuario == '' && $categoria == '' && $status != '' && $data_post != '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where status_post = '$status' and data_post = '$data_post' ORDER BY id_post DESC ";
                }

            if($usuario == '' && $categoria != '' && $status == '' && $data_post == '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where categoria = '$categoria' ORDER BY id_post DESC ";
                }

            if($usuario == '' && $categoria != '' && $status == '' && $data_post != '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where categoria = '$categoria' and data_post = '$data_post' ORDER BY id_post DESC ";
                }

            if($usuario == '' && $categoria != '' && $status != '' && $data_post == '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where categoria = '$categoria' and status_post = '$status' ORDER BY id_post DESC ";
                }

            if($usuario == '' && $categoria != '' && $status != '' && $data_post != '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where categoria = '$categoria' and status_post = '$status' and data_post = '$data_post' ORDER BY id_post DESC ";
                }

            if($usuario != '' && $categoria == '' && $status == '' && $data_post == '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where p.id_usuario = '$usuario' ORDER BY id_post DESC ";
                }

            if($usuario != '' && $categoria == '' && $status == '' && $data_post != '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where p.id_usuario = '$usuario' and data_post = '$data_post' ORDER BY id_post DESC ";
                }

            if($usuario != '' && $categoria == '' && $status != '' && $data_post == '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where p.id_usuario = '$usuario' and status_post = '$status' ORDER BY id_post DESC ";
                }

            if($usuario != '' && $categoria == '' && $status != '' && $data_post != '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where p.id_usuario = '$usuario' and status_post = '$status' and data_post = '$data_post' ORDER BY id_post DESC ";
                }

            if($usuario != '' && $categoria != '' && $status == '' && $data_post == '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where p.id_usuario = '$usuario' and categoria = '$categoria' ORDER BY id_post DESC ";
                }

            if($usuario != '' && $categoria != '' && $status == '' && $data_post != '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where p.id_usuario = '$usuario' and categoria = '$categoria' and data_post = '$data_post' ORDER BY id_post DESC ";
                }

            if($usuario != '' && $categoria != '' && $status != '' && $data_post == '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where p.id_usuario = '$usuario' and categoria = '$categoria' and status_post = '$status' ORDER BY id_post DESC ";
                }

            if($usuario != '' && $categoria != '' && $status != '' && $data_post != '')
                {
                $sql = " SELECT * FROM post as p LEFT JOIN usuarios as u ON (p.id_usuario = u.id_usuario) where p.id_usuario = '$usuario' and categoria = '$categoria' and status_post = '$status' and data_post = '$data_post' ORDER BY id_post DESC ";
                }

            //-----------------------------------------------------------------------------------------------
                
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }else
                    return false;
            }

        public function ConsultaPost($IDPost) //Recupera do banco de dados post escolhido pelo cliente
            {
            $IdPost = $IDPost;

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            $sql = " SELECT * FROM post where id_post = '$IdPost' ";

            if($Resultado_Post = mysqli_query($link, $sql))
                {
                $Post = mysqli_fetch_array($Resultado_Post);
                $_SESSION['id_post'] = $Post['id_post'];
                $IdAutor = $Post['id_usuario'];
                $sql = " SELECT * FROM usuarios where id_usuario = '$IdAutor' ";
                if($Resultado_Autor = mysqli_query($link, $sql))
                    {
                    $Autor = mysqli_fetch_array($Resultado_Autor);
                    $_SESSION['qntd_curtidas_autor'] = $Autor['qntd_follows'];
                    return $Post;
                    }
                }else
                    return false;
            }

        public function ConsultaMeusPost($IDUsuario)
            {
            $IdUsuario = $IDUsuario;

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            $sql = " SELECT * FROM post where id_usuario = '$IdUsuario' ORDER BY id_post DESC ";

            if($Resultado_Post = mysqli_query($link, $sql))
                {
                $Post = mysqli_fetch_all($Resultado_Post, MYSQLI_ASSOC);
                return $Post;
                }else
                    return false;
            }

        public function AtualizarPost(PostVO $Post) //Atualiza info. de posts do post selecionado no banco de dados
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

        public function ApagarPost(PostVO $Post) //Apaga post selecionado pelo cliente no banco de dados
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

        public function AtualizarStatusPost(PostVO $Post) //Atualiza status do post no banco de dados
            {
            $id_post = $Post->retornaIdPost();
            $status_post = $Post->retornaStatusPost();

            $sql = " UPDATE post SET status_post = '$status_post' WHERE id_post = '$id_post' ";

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