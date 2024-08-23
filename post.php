<?php

    session_start();

    include "Framework/Controller/PortalController.php";

    $id_post     = isset($_SESSION['id_post']) ? $_SESSION['id_post'] : NULL;
	$id_usuario  = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : NULL;
	$post        = isset($_SESSION['post']) ? $_SESSION['post'] : NULL;
	$img_post    = isset($_SESSION['img_post']) ? $_SESSION['img_post'] : NULL;
	$titulo_post = isset($_SESSION['titulo_post']) ? $_SESSION['titulo_post'] : NULL;
	$resumo_post = isset($_SESSION['resumo_post']) ? $_SESSION['resumo_post'] : NULL;
    $qntd_curtidas = isset($_SESSION['qntd_curtidas_post']) ? $_SESSION['qntd_curtidas_post'] : NULL;
    $qntd_follow = isset($_SESSION['qntd_curtidas_autor']) ? $_SESSION['qntd_curtidas_autor'] : NULL;
    $img_autor = isset($_SESSION['img_autor']) ? $_SESSION['img_autor'] : 'imagens/AgeOfGamesLogo.jpg';
    $nome_autor = isset($_SESSION['nome_autor']) ? $_SESSION['nome_autor'] : null;

    $Usuario = new UsuarioController();
    $_SESSION['usuario'] = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : NULL;
    $_SESSION['img_perfil'] = isset($_SESSION['img_perfil']) ? $_SESSION['img_perfil'] : NULL;
    $RetornoVerLogin = $Usuario->VerificaLoginController();
    $usuario = $RetornoVerLogin[0];
    $img_perfil = $RetornoVerLogin[1];

    if($curtidaPost = $Usuario->VerificaCurtidasPostController())
        {
        $curtiuPost = "imagens/curtido.png";
        $acaoCurtidaPost = "index?Controller=Usuario&Action=AtualizaCurtidaPostController&acao=Descurtir";
        }else 
            {
            $curtiuPost = "imagens/curtir.png";
            $acaoCurtidaPost = "index?Controller=Usuario&Action=AtualizaCurtidaPostController&acao=Curtir";
            }

    if($curtidaAutor = $Usuario->VerificaCurtidasAutorPostController())
        {
        $curtidaAutor = "imagens/curtido.png";
        $acaoCurtidaAutor = "index?Controller=Usuario&Action=AtualizaCurtidaAutorController&acao=Descurtir";
        }else 
            {
            $curtidaAutor = "imagens/curtir.png";
            $acaoCurtidaAutor = "index?Controller=Usuario&Action=AtualizaCurtidaAutorController&acao=Curtir";
            }

    $Comentario = new ComentarioController();
    $comentarios = $Comentario->ExibirComentariosController();

    if(isset($_GET['Controller']))
        {
        $objeto = $_GET['Controller'];
        if($objeto == "Comentario")
            {
            if(isset($_GET['Action']))
                {
                $metodo = $_GET['Action'];
                //Neste exemplo assim como acima utilizamos o GET para dessa vez passar um método dinamicamente
                eval("\$Comentario->\$metodo();");
                }
            }

        if($objeto == "Usuario")
            {
            if(isset($_GET['Action']))
                {
                $metodo = $_GET['Action'];
                //Neste exemplo assim como acima utilizamos o GET para dessa vez passar um método dinamicamente
                eval("\$Usuario->\$metodo();");
                }
            }
        }

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
        <title>Pagina de Noticia</title>
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
                <h4 class="nomeUsuarioColapse"><?= $usuario ?></h4>
                <i class="fa fa-bars nav_btn"></i>
            </div>
            <div class="mobile_nav_items">
                <a href="index"><i class="fas fa-desktop"></i><span>Inicio</span></a>
                <a href="javascript:void(0)" id="perfil" data-toggle="modal" data-target="#modal-perfil"><i class="fas fa-cogs"></i><span>Configure seu perfil</span></a>
                <a href="categorias"><i class="fas fa-table"></i><span>Categorias</span></a>
                <a href="novidades"><i class="fas fa-th"></i><span>Novidades</span></a>
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
            <a href="novidades"><i class="fas fa-th"></i><span>Novidades</span></a>
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
                        <div class="page-header texto-capa">
                            <h1><?= $titulo_post ?></h1>
                        </div>
                  
                        <section class="conteudo">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <?= $post ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <a href="<?= $acaoCurtidaPost ?>"><img class="img_curtida" src="<?= $curtiuPost ?>"></a>
                                            <span class="negrito"><?= $qntd_curtidas ?> Curtidas</span>
                                            <p>Gostou desse post? deixe sua curtida!</p>
                                            <img class="img_postagemAdm" src="<?=$img_autor?>"><span class="negrito"> <?=$nome_autor?></span><br><br>
                                            <a href="<?= $acaoCurtidaAutor ?>"><img class="img_curtida" src="<?= $curtidaAutor ?>"></a>
                                            <span class="negrito"><?= $qntd_follow ?> Follows</span>
                                            <p>Já segue o autor desse post?</p>
                                            <h4>Comentarios:</h4>
                                            <div id="comentarios" class="list-group"></div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-10">
                                            <h4>Enviar comentario</h4>
                                            <form method="post" action="post?Controller=Comentario&Action=EnviarComentarioController">
                                                <input type="text" name="comentario" id="input_comentario" class="form-control" placeholder="Deixe aqui seu comentario" maxlength="140" required>
                                                <br>
                                                <input type="button" class="btn btn_envio" id="btn_comentario" value="Enviar comentario">
                                            </form>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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

                function PegarComentarios()
                    {
                    //carrega os posts
                    $.ajax({
                          url: 'Req_PegarComentarios.php',
                          success: function(data)
                              {
                              $('#comentarios').html(data);
                              
                              $('.btn_apagar').click( function()
						      	{
						      	var id = $(this).data('id_comentario');

                                if(confirm('Esta ação apagará o comentario em definitivo!'))
                                    {
                                    $.ajax({
                                        url: 'Req_ApagarMeuComentario.php',
                                        method: 'get',
                                        data: {id_comentario: id},
                                        success: function(data)
                                            {
                                            PegarComentarios();
                                            }
                                        })
                                    }
                                });
                              }
                          });
                    }
                PegarComentarios();

                $('#btn_comentario').click( function()
					{
                    if($('#input_comentario').val().length > 0)
						{
						$.ajax({
							  url: 'Req_EnviarComentario.php',
							  method: 'post',
							  data: {comentario: $('#input_comentario').val() },
							  success: function(data)
							   	{
							   	$('#input_comentario').val('');
                                PegarComentarios();
							  	}
							  });
						}
                    });
                });
        </script>

    </body>
</html>