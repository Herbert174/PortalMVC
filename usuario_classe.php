<?php

    require_once('db.class.php');

    class usuario
        {
        private $nome_usuario;
        private $img_usuario;
        private $img;

        function verifica_login($nome, $imagem)
            {
            if($nome != NULL)
                {
                $this -> nome_usuario = $nome;
                if($imagem != NULL)
                    {
                    $this -> img_usuario = $imagem;
                    }else{
                         $this -> img_usuario = 'imagens/logo.png';
                         }
                }else{
                     $this -> nome_usuario = 'Faça o seu login e aproveite';
                     $this -> img_usuario = 'imagens/logo.png';
                     }
            }
        function recebe_nome_usuario()
            {
            return $this -> nome_usuario;
            }
        function recebe_foto_usuario()
            {
            return $this -> img_usuario;
            }
        function verifica_nome_usuario($novo_nome)
            {
            if($novo_nome == NULL)
                {
                return true;
                }else{
                     return false;
                     }
            }
        function verifica_foto_usuario()
            {
            if(!empty($_FILES['imagem']['name']))//Verifica se algo foi enviado para imagem através de FILES
                {
                $imagem = $_FILES['imagem'];//Guarda o arquivo em $imagem
        
                if($imagem['error'])//Caso o arquivo esteja corrompido, para o codigo e retorna a mensagem de erro
                    die("Falha ao enviar imagem");
        
                if($imagem['size'] > 4194304)//Verifica se o tamanho da imagem excede o tamanho maximo, 4MB
                    die("Arquivo excedeu o tamanho limite!! Max: 4MB");
        
                $pasta = "imagens/";//Define em $pasta o local onde a imagem será armazenada
                $nomeImagem = $imagem['name'];//Armazena o nome original do arquivo
                $novoNomeImagem = uniqid();//Gera um id unico para que os nomes das imagens não se repitam
                $extensao = strtolower(pathinfo($nomeImagem,PATHINFO_EXTENSION));//Retorna somente o nome da extensão da imagem/arquivo, transformando ele em minusculo se for preciso com a função strtolower
                
                if($extensao != "jpg" && $extensao != "png")//Verifica se a extensão enviada é jpg ou png
                    die("Formato de arquivo não aceito");
        
                $path = $pasta.$novoNomeImagem.".".$extensao;//Define o local onde a imagem será armazenada e o nome que será salvo
        
                move_uploaded_file($imagem['tmp_name'], $path);//Move o arquivo selecionado para a pasta de imagens/arquivo do servidor
        
                $img = $path;

                return $img;
                }else{
                     return false;
                     }
            }
        function verifica_novo_nome($novo_nome)
            {
            $objDb = new database();//Instância a classe
            $link = $objDb -> conecta_mysql();//Executa função de conexão com o MySQL
            $sql = " SELECT * FROM usuarios WHERE nome = '$novo_nome' ";
            $resultado = mysqli_query($link, $sql);
            $resultado_nome = mysqli_fetch_array($resultado);
            if($resultado_nome['nome'] == $novo_nome)
                {
                return false;
                }else{
                     return true;
                     }
            }
        function atualiza_nome_foto_usuario($novo_nome, $id_usuario, $img)
            {
            $objDb = new database();//Instância a classe
            $link = $objDb -> conecta_mysql();//Executa função de conexão com o MySQL
            $sql = " UPDATE usuarios SET nome = '$novo_nome', img_perfil = '$img' WHERE id_usuario = '$id_usuario' ";
            $resultado = mysqli_query($link, $sql);
            if($resultado)
                {
                header('Location: atualizar_acesso.php');
                }else{
                    echo "Erro ao tentar atualizar o perfil";
                    }
            }
        function atualiza_nome_usuario($novo_nome, $id_usuario)
            {
            $objDb = new database();//Instância a classe
            $link = $objDb -> conecta_mysql();//Executa função de conexão com o MySQL
            $sql = " UPDATE usuarios SET nome = '$novo_nome' WHERE id_usuario = '$id_usuario' ";
            $resultado = mysqli_query($link, $sql);
            if($resultado)
                {
                header('Location: atualizar_acesso.php');
                }else{
                    echo "Erro ao tentar atualizar o perfil";
                    }
            }
        function atualiza_foto_usuario($id_usuario, $img)
            {
            $objDb = new database();//Instância a classe
            $link = $objDb -> conecta_mysql();//Executa função de conexão com o MySQL
            $sql = " UPDATE usuarios SET img_perfil = '$img' WHERE id_usuario = '$id_usuario' ";
            $resultado = mysqli_query($link, $sql);
            if($resultado)
                {
                header('Location: atualizar_acesso.php');
                }else{
                    echo "Erro ao tentar atualizar o perfil";
                    }
            }

        }
?>