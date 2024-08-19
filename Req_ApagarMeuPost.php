<?php 

    session_start();
    include "Framework/Controller/PortalController.php";

    $Post = new PostController();
    echo $Post->ApagarPostController();

?>