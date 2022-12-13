<?php

    session_start();

    require_once('db.class.php');

	$id_post = $_GET['post'];

	$sql = " SELECT * FROM post WHERE id_post = '$id_post' ";

	$objDb = new database();
	$link = $objDb -> conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

    if($resultado_id)
		{
		$dados_post = mysqli_fetch_array($resultado_id);
		if(isset($dados_post['titulo_post']))
			{
			$_SESSION['id_post']     = $dados_post['id_post'];
			$_SESSION['id_usuario']  = $dados_post['id_usuario'];
			$_SESSION['post']        = $dados_post['post'];
			$_SESSION['img_post']    = $dados_post['img_post'];
			$_SESSION['titulo_post'] = $dados_post['titulo_post'];
			$_SESSION['resumo_post'] = $dados_post['resumo_post'];

			header('Location: noticias1.php');

			}else{
				 echo "Post não encontrado";
			     }
		}else{
			 echo "Erro na consulta do banco de dados";
		     }

?>