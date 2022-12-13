<?php
    require_once('db.class.php');

    $objDb = new database();
    $link = $objDb -> conecta_mysql();

    $lista = [];
    $sql = " SELECT * FROM post ";

    if($resultado_lista = mysqli_query($link, $sql))
        {
        $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
        }

    foreach ($lista as $posts)
        {
        echo '<div class="row custom">';
        echo '<div class="col-sm-3">';
        echo '<img src="'.$posts['img_post'].'" class="img_postagem">';
        echo '</div>';
        echo '<div class="col-sm-9">';
        echo '<div class="row">';
        echo '<span class="negrito">'.$posts['titulo_post'].'</span>';
        echo '</div>';
        echo '<div class="row">';
        echo '<p>'.$posts['resumo_post'].'<a href="consulta_post.php?post='.$posts['id_post'].'">leia mais...</a></p>';
        echo '</div>';
        echo '<div class="row">';
        echo 'Comentarios: Que post excelente';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        }
?>