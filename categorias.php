<?php

    session_start();

    function __autoload($class_name)
        {
        include $class_name."_classe.php";
        }

    $user = new usuario();
    $name_usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : NULL;
    $img_usuario  = isset($_SESSION['img_perfil']) ? $_SESSION['img_perfil'] : NULL;
    $user -> verifica_login($name_usuario, $img_usuario);
    $usuario = $user -> recebe_nome_usuario();
    $img_perfil = $user -> recebe_foto_usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Titulo -->
        <title>Inicio</title>
        <link rel="icon" href="imagens/logo.png">

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
                <a href="javascript:void(0)" id="perfil" data-toggle="modal" data-target="#modal-perfil"><i class="fas fa-cogs"></i><span>Components</span></a>
                <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
                <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>
                <a href="#"><i class="fas fa-info-circle"></i><span>Deslogar</span></a>
                <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
            </div>
        </div>
        <!-- Mobile navigation bar end -->

        <!-- Sidebar start -->
        <div class="sidebar">
            <div class="profile_info">
                <a class="link_foto" href="pagina_usuario.php"><img src="<?= $img_perfil ?>" class="profile_image" alt=""></a>
                <h4><?= $usuario ?></h4>
            </div>
            <a href="index.php"><i class="fas fa-desktop"></i><span>Home</span></a>
            <a href="javascript:void(0)" id="perfil" data-toggle="modal" data-target="#modal-perfil"><i class="fas fa-cogs"></i><span>Components</span></a>
            <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
            <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>
            <a href="#"><i class="fas fa-info-circle"></i><span>Deslogar</span></a>
            <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
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
                                <form method="post" action="atualizar_perfil.php" id="formPost" enctype="multipart/form-data">
                                    <input type="text" class="input_custom" value="" id="nome" name="nome" placeholder="Insira um nome de usúario" maxlength="50"/><br><br>
                                    <p>Escolha uma imagem para substituir a do seu perfil</p>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/><input class="form-control input_custom" id="imagem" name="imagem" type="file"/><br>
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
                    <div class="row custom">
                        <div class="col-sm-3">
                            <img src="imagens/imagem_jogo.jpg" class="img_postagem">
                        </div>
                        <div class="col-sm-9">
                            <div class="row">
                                <span class="negrito">Jogos</span>
                            </div>
                            <div class="row">
                                <p>Resumo dos posts é aqui mesmo<a href="categoria.php?categoria=3">leia mais...</a></p>
                            </div>
                            <div class="row">
                                <p>Comentarios: Que post excelente</p>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <img src="imagens/imagem_noticia.jpg" class="img_postagem">
                        </div>
                        <div class="col-sm-9">
                            <div class="row">
                                <span class="negrito">Noticias</span>
                            </div>
                            <div class="row">
                                <p>Resumo dos posts é aqui mesmo<a href="categoria.php?categoria=2">leia mais...</a></p>
                            </div>
                            <div class="row">
                                <p>Comentarios: Que post excelente</p>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <img src="imagens/imagem_assuntos_gerais.jpg" class="img_postagem">
                        </div>
                        <div class="col-sm-9">
                            <div class="row">
                                <span class="negrito">Assuntos gerais</span>
                            </div>
                            <div class="row">
                                <p>Resumo dos posts é aqui mesmo<a href="categoria.php?categoria=1">leia mais...</a></p>
                            </div>
                            <div class="row">
                                <p>Comentarios: Que post excelente</p>
                            </div>
                        </div>
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