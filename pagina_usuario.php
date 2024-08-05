<?php

    session_start();

    include "Controller/PortalController.php";

    $Usuario = new UsuarioController();
    $_SESSION['usuario'] = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : NULL;
    $_SESSION['img_perfil'] = isset($_SESSION['img_perfil']) ? $_SESSION['img_perfil'] : NULL;
    $RetornoVerLogin = $Usuario->VerificaLoginController();
    $usuario = $RetornoVerLogin[0];
    $img_perfil = $RetornoVerLogin[1];

    $CriadorPost = isset($_SESSION['credencial']) ? '' : 'visibility: hidden';

    $Post = new PostController();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Titulo -->
        <title>Pagina do Usuário</title>
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
                $('#post').click( function()
                    {
                    $.ajax({
                          $('#modal-post').modal();
                          });
                    })

                $('#perfil').click( function()
                    {
                    $.ajax({
                          $('#modal-perfil').modal();
                          });
                    })

                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
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
                <a href="#"><img src="<?= $img_perfil ?>" class="mobile_profile_image" alt=""></a>
                <h4 class="nomeUsuarioColapse"><?= $usuario ?></h4>
                <i class="fa fa-bars nav_btn"></i>
            </div>
            <div class="mobile_nav_items">
                <a href="index"><i class="fas fa-desktop"></i><span>Inicio</span></a>
                <a href="javascript:void(0)" id="perfil" data-toggle="modal" data-target="#modal-perfil"><i class="fas fa-cogs"></i><span>Configure seu perfil</span></a>
                <a href="categorias"><i class="fas fa-table"></i><span>Categorias</span></a>
                <a href="novidades"><i class="fas fa-th"></i><span>Novidades</span></a>
                <a href="#"><i class="fas fa-info-circle"></i><span>Deslogar</span></a>
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
            <a href="novidades"><i class="fas fa-th"></i><span>Novidades</span></a>
            <a href="#"><i class="fas fa-info-circle"></i><span>Deslogar</span></a>
            <a href="PainelDigievolucao"><i class="fas fa-sliders-h"></i><span>Painel Digievolução</span></a>
        </div>
        <!-- Sidebar end -->

        <div class="modal fade" id="modal-post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    <h4 class="modal-title">Post</h4>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="index?Controller=Post&Action=EnviarPostController" id="formPost" enctype="multipart/form-data">
                                <div class="container">
                                    <select class="form-control select_custom" id="tipoInput">
                                        <option value="1">Titulo</option>
                                        <option value="2">Conteúdo</option>
                                        <option value="3">Link de imagem</option>
                                        <option value="4">Imagem de capa</option>
                                    </select>
                                    <br/>
                                    <a class="btn btn_envio select_custom" href="javascript:void(0)" id="addInput">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        Adicionar Campo
                                    </a>
                                    <br/><br>
                                    <div id="dynamicDiv">
                                        <p>
                                            <input type="text" id="post[1]" name="post[1]" size="47" value="" placeholder="Adicione um titulo" maxlength="50" required/><br><br>
                                        </p>
                                        <p>
                                        <textarea id="post[2]" name="post[2]" rows="5" cols="45" placeholder="Adicione um resumo" minlength="50" maxlength="180" required></textarea><br><br>
                                        </p>
                                    </div>
                                    <select class="form-control select_custom" name="categoria" id="categoria" required>
                                        <option value="">Selecione uma categoria</option>
                                        <option value="Jogos">Jogos</option>
                                        <option value="Novidades">Novidades</option>
                                        <option value="Curiosidades">Curiosidades</option>
                                        <option value="Programacao">Programacao</option>
                                        <option value="Discord">Discord</option>
                                        <option value="Digimon">Digimon</option>
                                        <option value="Yugioh">Yugioh</option>
                                        <option value="Ragnarok">Ragnarok</option>
                                        <option value="Desenho">Desenho</option>
                                        <option value="Animes">Animes</option>
                                        <option value="Series">Séries</option>
                                        <option value="Filmes">Filmes</option>
                                    </select><br>
                                    <input type="submit" class="btn btn_envio" value="Enviar">

                                    <script>
                                    $(function () {
                                        var scntDiv = $('#dynamicDiv');
                                        var qnt_input = 2;
                                        var file_unico = 0;
                                        $(document).on('click', '#addInput', function ()
                                            {
                                            if($('#tipoInput :selected').val() == 1)
                                                {
                                                qnt_input++;
                                                $('<p>'+
                                                    `<input type="text" id="post[${qnt_input}]" name="post[${qnt_input}]" size="47" value="" placeholder="Adicione um titulo" maxlength="50" required/><br><br>`+
                                                    '<a class="btn btn-danger select_custom" href="javascript:void(0)" id="remInput">'+
                                                        '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
                                                        'Remover Campo'+
                                                    '</a><br><br>'+
                                                '</p>').appendTo(scntDiv);
                                                return false;
                                                }
                                            if($('#tipoInput :selected').val() == 2)
                                                {
                                                qnt_input++;
                                                $('<p>'+
                                                    `<textarea id="post[${qnt_input}]" name="post[${qnt_input}]" rows="5" cols="45" placeholder="Conteúdo do Post" minlength="50" required></textarea><br><br>`+
                                                    '<a class="btn btn-danger select_custom" href="javascript:void(0)" id="remInput">'+
                                                        '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
                                                        'Remover Campo'+
                                                    '</a><br><br>'+
                                                '</p>').appendTo(scntDiv);
                                                return false;
                                                }
                                            if($('#tipoInput :selected').val() == 3)
                                                {
                                                qnt_input++;
                                                $('<p>'+
                                                    `<input type="url" id="post[${qnt_input}]" name="post[${qnt_input}]" size="47" value="" placeholder="Adicione uma url ex: http://www." required/><br><br>`+
                                                    '<a class="btn btn-danger select_custom" href="javascript:void(0)" id="remInput">'+
                                                        '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
                                                        'Remover Campo'+
                                                    '</a><br><br>'+
                                                '</p>').appendTo(scntDiv);
                                                return false;
                                                }
                                            if($('#tipoInput :selected').val() == 4 && file_unico == 0)//Criar um id post com qnt_input tbm para file para referenciar
                                                {
                                                qnt_input++;
                                                file_unico = 1;
                                                $('<p>'+
                                                    `<input type="hidden" name="MAX_FILE_SIZE" value="99999999"/><input class="form-control select_custom" id="post[${qnt_input}]" name="imagem[]" type="file" required/><br>`+
                                                    '<a class="btn btn-danger select_custom" href="javascript:void(0)" id="remInput1">'+
                                                        '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
                                                        'Remover Campo'+
                                                    '</a><br><br>'+
                                                '</p>').appendTo(scntDiv);
                                                return false;
                                                }else{alert('Apenas um campo de envio de imagens é permitida');}
                                            });

                                        $(document).on('click', '#remInput', function () 
                                            {
                                            $(this).parents('p').remove();
                                            return false;
                                            });
                                        $(document).on('click', '#remInput1', function () 
                                            {
                                            file_unico = 0;
                                            $(this).parents('p').remove();
                                            return false;
                                            });
                                    });
                                    </script>
                                </div>
                            </form>
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
                    <div class="row custom1" <?= $CriadorPost ?>>
                        <div class="col-sm-12">
                            <input type="text" class="form-control form_custom" placeholder="Poste aqui" id="post" data-toggle="modal" data-target="#modal-post">
                            <button class="btn btn-outline-secondary button_custom" data-toggle="tooltip" data-placement="left" title="Enviar Post" type="button">Enviar Post</button>
                        </div>
                    </div>
                    <div id="meus_posts" <?= $CriadorPost ?>>
                        <h2 class="branco">Meus Posts</h2>
                        <?php echo $Post->PegarMeusPostController(); ?>
                        
                        <h2 class="branco">Posts Sugeridos</h2>
                    </div>
                    <div id="posts_geral">
                        <?php echo $Post->PegarMeusPostsSugeridosController(); ?>
                    </div>
                </div>

                <div class="col-sm-0"></div>
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

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->

        <script type="text/javascript">
            $(document).ready(function()
                {
                $('.nav_btn').click(function(){
                    $('.mobile_nav_items').toggleClass('active');
                    });
                function postarpost()
                    {
                    //carrega os posts
                    $.ajax({
                          url: 'postar_post.php',
                          success: function(data)
                              {
                              $('#portal').html(data);
                              }
                          })
                    }
                postarpost();
                });

                $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('[data-toggle="popover"]').popover()
        })
        </script>

    </body>
</html>