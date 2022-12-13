<?php

    session_start();

    $id_post     = $_SESSION['id_post'];
	$id_usuario  = $_SESSION['id_usuario'];
	$post        = $_SESSION['post'];
	$img_post    = $_SESSION['img_post'];
	$titulo_post = $_SESSION['titulo_post'];
	$resumo_post = $_SESSION['resumo_post'];

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Titulo -->
        <title>Pagina de Noticia</title>
        <link rel="icon" href="imagens/logo.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- CSS -->
        <link rel="stylesheet" href="estilo.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" charset="utf-8"></script>
    </head>

    
    <body>
        <input type="checkbox" id="check">
        <!-- Header area start -->
        <header>
            <label for="check">
                <i class="fas fa-bars" id="sidebar_btn"></i>
            </label>
            <div class="left_area">
                <h3>Coding <span>Snow</span></h3>
            </div>
            <div class="right_area">
                <a href="login.php" class="logout_btn">Login</a>
            </div>
            <div class="right_area">
                <a href="cadastrar.php" class="logout_btn">Cadastro</a>
            </div>
        </header>
        <!-- Header area end -->

        <!-- Mobile navigation bar start -->
        <div class="mobile_nav">
            <div class="nav_bar">
                <a href="pagina_usuario.html"><img src="imagens/perfil.jpg" class="mobile_profile_image" alt=""></a>
                <i class="fa fa-bars nav_btn"></i>
            </div>
            <div class="mobile_nav_items">
                <a href="index.php"><i class="fas fa-desktop"></i><span>Home</span></a>
                <a href="#"><i class="fas fa-cogs"></i><span>Components</span></a>
                <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
                <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>
                <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
                <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
            </div>
        </div>
        <!-- Mobile navigation bar end -->

        <!-- Sidebar start -->
        <div class="sidebar">
            <div class="profile_info">
                <a class="link_foto" href="pagina_usuario.php"><img src="imagens/perfil.jpg" class="profile_image" alt=""></a>
                <h4>Herbert</h4>
            </div>
            <a href="index.php"><i class="fas fa-desktop"></i><span>Home</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>Components</span></a>
            <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
            <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>
            <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
            <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
        </div>
        <!-- Sidebar end -->

        <section class="content">
            <div class="Container">
                <div class="col-sm-9">
                    <div class="row custom">
                        <div class="page-header texto-capa">
                            <h1><?= $titulo_post ?></h1>
                        </div>
                  
                        <section class="conteudo">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12"> 
                                            <h2 class="texto-capa"><?= $resumo_post ?></h2>                
                                            <?= $post ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                    <div class="row custom">
                        <img class="img_noticia" src="imagens/logo.png">
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.nav_btn').click(function(){
                    $('.mobile_nav_items').toggleClass('active');
                    })
                });
        </script>

    </body>
</html>