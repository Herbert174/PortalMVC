<?php

    session_start();

    include_once "Framework/Controller/PortalController.php";

    $Usuario = new UsuarioController();
    $_SESSION['usuario'] = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : NULL;
    $_SESSION['img_perfil'] = isset($_SESSION['img_perfil']) ? $_SESSION['img_perfil'] : NULL;
    $RetornoVerLogin = $Usuario->VerificaLoginController();
    $usuario = $RetornoVerLogin[0];
    $img_perfil = $RetornoVerLogin[1];

    $Post = new PostController();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q12MDF7WW0"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-Q12MDF7WW0');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Titulo -->
        <title>Inicio</title>
        <link rel="icon" href="imagens/AgeOfGamesLogo.jpg">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="estilo.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" charset="utf-8"></script>
        
        <!-- Jquery -->
        <script src="jquery-3.6.0.js"></script>

        <!-- Javascript -->
        <script type="text/javascript">
            $(document).ready(function()
                {
                $('#perfil').click( function()
                    {
                    $.ajax({
                          $('#modal-perfil').modal();
                          });
                    })
                });
        </script>
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
                <i class="fa fa-bars nav_btn"></i>
                <h4 class="nomeUsuarioColapse"><?= $usuario ?></h4>
            </div>
            <div class="mobile_nav_items">
                <a href="index"><i class="fas fa-desktop"></i><span>Inicio</span></a>
                <a href="javascript:void(0)" id="perfil" data-toggle="modal" data-target="#modal-perfil"><i class="fas fa-cogs"></i><span>Configure seu perfil</span></a>
                <a href="categorias"><i class="fas fa-table"></i><span>Categorias</span></a>
                <a href="#"><i class="fas fa-th"></i><span>Novidades</span></a>
                <a href="index?Controller=Usuario&Action=DeslogaUsuarioController&Painel=Geral"><i class="fas fa-info-circle"></i><span>Deslogar</span></a>
                <a href="PainelDigievolucao"><i class="fas fa-sliders-h"></i><span>Painel Digievolução</span></a>
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
            <a href="javascript:void(0)" id="perfil" data-toggle="modal" data-target="#modal-perfil"><i class="fas fa-cogs"></i><span>Configure seu perfil</span></a>
            <a href="categorias"><i class="fas fa-table"></i><span>Categorias</span></a>
            <a href="#"><i class="fas fa-th"></i><span>Novidades</span></a>
            <a href="index?Controller=Usuario&Action=DeslogaUsuarioController&Painel=Geral"><i class="fas fa-info-circle"></i><span>Deslogar</span></a>
            <a href="PainelDigievolucao"><i class="fas fa-sliders-h"></i><span>Painel Digievolução</span></a>
        </div>
        <!-- Sidebar end -->

        <div class="modal fade" id="modal-perfil">
        <div class="modal-dialog">
            <div class="modal-content modal_custom">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    <h4 class="modal-title">Perfil</h4>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                            <div class="profile_info">
                                <img src="<?= $img_perfil ?>" class="link_foto margin_custom" alt="">
                                <h2><?= $usuario ?></h2>
                                <form method="post" action="index?Controller=Usuario&Action=AtualizaUsuarioController" id="formPost" enctype="multipart/form-data">
                                    <input type="text" class="input_custom" value="" id="nome" name="nome" placeholder="Insira um novo nome de usúario" maxlength="50"/><br><br>
                                    <p>Escolha uma imagem para substituir a do seu perfil</p>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/><input class="form-control input_custom" id="imgPerfil" name="imgPerfil" type="file"/><br>
                                    <input type="submit" class="btn btn_envio input_custom" value="Enviar">
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>                                             
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
        </div>

        <section class="content">
            <div class="Container">
                <div class="col-sm-9">
                    <div id="portal">
                        <?php echo $Post->PegarAllPostController(); ?>
                    </div>
                </div>
                <div class="col-sm-0"></div>
                <div class="col-sm-3 areaDivulgacao">
                    <div class="row ">
                        <a href="https://discord.gg/nDKZ4fkET9" target="_blank"><img class="img_noticia custom" src="imagens/AgeOfGamesLogo.jpg"></a>
                    </div>
                    <div class="row custom"><br>
                        <ul>
                            <li>Já conhece nosso canal do discord?</li>
                            <li>Deseja fazer parte de uma comunidade apaixonada por jogos e inovações?</li>
                            <li>Gosta dos principais classicos da nossa infância?</li>
                            <li>Se as respostas forem sim você veio ao lugar certo!</li>
                            <li><a href="https://discord.gg/nDKZ4fkET9" target="_blank">https://discord.gg/nDKZ4fkET9</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.nav_btn').click(function(){
                    $('.mobile_nav_items').toggleClass('active');
                    });
                });
        </script>

    </body>
</html>