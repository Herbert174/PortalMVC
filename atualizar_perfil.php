<?php

    session_start();
    
    require_once('usuario_classe.php');

    $nome_vazio   = false;
    $imagem_vazio = false;
    $id_usuario   = $_SESSION['id_usuario'];
    $nome         = $_POST['nome'];
    $img          = null;

    $user = new usuario();

    $nome_vazio = $user -> verifica_nome_usuario($nome);
    $img = $user -> verifica_foto_usuario();
    if($img == false)
        {
        $imagem_vazio = true;
        }else $imagem_vazio = false;

    if($nome_vazio && $imagem_vazio)
        {
        header('Location: index.php');
        }
    
    if(!$nome_vazio && !$imagem_vazio)
        {
        $nome_valido = $user -> verifica_novo_nome($nome);
        if($nome_valido)
            {
            $user -> atualiza_nome_foto_usuario($nome, $id_usuario, $img);
            }else die("Este nome de usuario já esta em uso");
        }
    
    if(!$nome_vazio && $imagem_vazio)
        {
        $nome_valido = $user -> verifica_novo_nome($nome);
        if($nome_valido)
            {
            $user -> atualiza_nome_usuario($nome, $id_usuario);
            }else die("Este nome de usuario já esta em uso");
        }

    if($nome_vazio && !$imagem_vazio)
        {
        $user -> atualiza_foto_usuario($id_usuario, $img);
        }

?>