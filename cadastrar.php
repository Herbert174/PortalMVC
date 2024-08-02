<?php

    session_start();

    include "Controller/PortalController.php";

    $Usuario = new UsuarioController();
    $_SESSION['usuario'] = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : NULL;
    $_SESSION['img_perfil'] = isset($_SESSION['img_perfil']) ? $_SESSION['img_perfil'] : NULL;
    $RetornoVerLogin = $Usuario->VerificaLoginController();
    $usuario = $RetornoVerLogin[0];
    $img_perfil = $RetornoVerLogin[1];

    $erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
    $erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pagina de Cadastro</title>
        <link rel="icon" href="imagens/AgeOfGamesLogo.jpg">

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="estilo.css" rel="stylesheet">

        <!-- Javascript -->
        <script type="text/javascript">

        </script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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
                <h3>Age Of <span>Games</span></h3>
            </div>
            <div class="right_area">
                <a href="login" class="logout_btn">Login</a>
            </div>
            <div class="right_area">
                <a href="cadastrar" class="logout_btn">Cadastro</a>
            </div>
        </header>
        <!-- Header area end -->

        <!-- Mobile navigation bar start -->
        <div class="mobile_nav">
            <div class="nav_bar">
                <a href="pagina_usuario"><img src="<?= $img_perfil ?>" class="mobile_profile_image" alt=""></a>
                <h4 class="nomeUsuarioColapse"><?= $usuario ?></h4>
                <i class="fa fa-bars nav_btn"></i>
            </div>
            <div class="mobile_nav_items">
                <a href="index"><i class="fas fa-desktop"></i><span>Inicio</span></a>
                <a href="#"><i class="fas fa-cogs"></i><span>Configure seu perfil</span></a>
                <a href="#"><i class="fas fa-table"></i><span>Categorias</span></a>
                <a href="#"><i class="fas fa-th"></i><span>Novidades</span></a>
                <a href="#"><i class="fas fa-info-circle"></i><span>Deslogar</span></a>
                <a href="#"><i class="fas fa-sliders-h"></i><span>Painel Digievolução</span></a>
            </div>
        </div>
        <!-- Mobile navigation bar end -->

        <!-- Sidebar start -->
        <div class="sidebar">
            <div class="profile_info">
                <a class="link_foto" href="pagina_usuario"><img src="<?= $img_perfil ?>" class="profile_image" alt=""></a>
                <h4><?= $usuario ?></h4>
            </div>
            <a href="index"><i class="fas fa-desktop"></i><span>Inicio</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>Configure seu perfil</span></a>
            <a href="#"><i class="fas fa-table"></i><span>Categorias</span></a>
            <a href="#"><i class="fas fa-th"></i><span>Novidades</span></a>
            <a href="#"><i class="fas fa-info-circle"></i><span>Deslogar</span></a>
            <a href="#"><i class="fas fa-sliders-h"></i><span>Painel Digievolução</span></a>
        </div>
        <!-- Sidebar end -->

        <section class="content">
            <div class="Container">
                <div class="col-sm-6 custom">
                <h2 class="centro">Cadastrar-se</h2>
                    <form method="post" action="index?Controller=Usuario&Action=RegistraUsuarioController" id="formCadastrarse">
                        <div class="form-group">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required="required">
                            <?php
                                if($erro_usuario)
                                    {
                                    echo '<font style="color:#FF0000">Usuario já existe</font>';
                                    }
                            ?>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
                            <?php
                                if($erro_email)
                                    {
                                    echo '<font style="color:#FF0000">Email já existe</font>';
                                    }
                            ?>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="required">
                        </div>

                        <button type="submit" class="btn form-control btn-custom1 btn_cadastro" id="btn_increva-se">Inscreva-se</button>
                        <br><br>
                    </form>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3 areaDivulgacao">
                    <div class="row ">
                        <a href="https://discord.gg/Yn3tHJAq" target="_blank"><img class="img_noticia custom" src="imagens/AgeOfGamesLogo.jpg"></a>
                    </div>
                    <div class="row custom"><br>
                        <ul>
                            <li>Já conhece nosso canal do discord?</li>
                            <li>Deseja fazer parte de uma comunidade apaixonada por jogos e inovações?</li>
                            <li>Gosta dos principais classicos da nossa infância?</li>
                            <li>Se as respostas forem sim você veio ao lugar certo!</li>
                        </ul>
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