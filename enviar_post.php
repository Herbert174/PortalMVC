<?php
    require_once('db.class.php');

    $post = $_POST['post'];
    $postando = "";
    $img_post = "";
    $titulo_post = $post[1];
    $resumo_post = $post[2];
    $usuario = 1;

    foreach($post as $item_post)
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
            $postando.='<img class="img-responsive" height = 200px; width = 250px; src='.$path.'><br><br>';
            if($img==0)
                {
                $img_post = $path;
                }

            /*usar as tags <pre> servem para que a exibição do var_dump acontece com as quebras de linha
            echo '<pre>';
            var_dump($imagem);
            echo '<pre>';*/
            }  
        }

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
             
?>