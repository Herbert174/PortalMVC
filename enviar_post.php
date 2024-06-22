<?php

    require_once('db.class.php');
    require_once('post_classe.php');

    $post = $_POST['post'];
    $postando = "";
    $img_post = "";
    $titulo_post = $post[1];
    $resumo_post = $post[2];
    $usuario = 1;

    $Post = new Post();
    $retorno = $Post->montar_post($post);
    $postando = $retorno[0];
    $img_post = $retorno[1];
    $Post->enviar_post($usuario, $postando, $img_post, $titulo_post, $resumo_post);
             
?>