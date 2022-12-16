<?php

    session_start();

    require_once('db.class.php');

    $nome_vazio   = false;
    $imagem_vazio = false;
    $id_usuario   = $_SESSION['id_usuario'];
    $nome         = $_POST['nome'];
    $imagem       = null;
    $img          = null;

    if($nome == null)
        {
        $nome_vazio = true;
        }
    
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
		}else{
             $imagem_vazio = true;
             }

    if($nome_vazio && $imagem_vazio)
        {
        header('Location: index.php');
        }

    $objDb = new database();//Instância a classe
    $link = $objDb -> conecta_mysql();//Executa função de conexão com o MySQL

    if(!$nome_vazio && !$imagem_vazio)
        {
        $sql = " SELECT * FROM usuarios WHERE nome = '$nome' ";
        $resultado = mysqli_query($link, $sql);
        $resultado_nome = mysqli_fetch_array($resultado);
        if($resultado_nome['nome'] == $nome)
            {
            die("Este nome de usuario já esta em uso");
            }else{
                 $sql = " UPDATE usuarios SET nome = '$nome', img_perfil = '$img' WHERE id_usuario = '$id_usuario' ";
                 }
        }

    if(!$nome_vazio && $imagem_vazio)
        {
        $sql = " SELECT * FROM usuarios WHERE nome = '$nome' ";
        $resultado = mysqli_query($link, $sql);
        $resultado_nome = mysqli_fetch_array($resultado);
        if($resultado_nome['nome'] == $nome)
            {
            die("Este nome de usuario já esta em uso");
            }else{
                 $sql = " UPDATE usuarios SET nome = '$nome' WHERE id_usuario = '$id_usuario' ";
                 }
        }
    
    if($nome_vazio && !$imagem_vazio)
        {
        $sql = " UPDATE usuarios SET img_perfil = '$img' WHERE id_usuario = '$id_usuario' ";
        }
        
    $resultado = mysqli_query($link, $sql);
        
    if($resultado)
        {
        header('Location: atualizar_acesso.php');
        }else{
             echo "Erro ao tentar atualizar o perfil";
             }
    

?>