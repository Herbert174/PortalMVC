<?php 

    session_start();
    include "Framework/Controller/PortalController.php";

    $Comentario = new ComentarioController();
    echo $Comentario->EnviarComentarioController();

?>