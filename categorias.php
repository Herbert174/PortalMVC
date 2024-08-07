<?php

    session_start();

    include "Controller/PortalController.php";

    $Usuario = new UsuarioController();
    $_SESSION['usuario'] = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : NULL;
    $_SESSION['img_perfil'] = isset($_SESSION['img_perfil']) ? $_SESSION['img_perfil'] : NULL;
    $RetornoVerLogin = $Usuario->VerificaLoginController();
    $usuario = $RetornoVerLogin[0];
    $img_perfil = $RetornoVerLogin[1];
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
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
                <a href="#"><i class="fas fa-table"></i><span>Categorias</span></a>
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
            <a href="#"><i class="fas fa-table"></i><span>Categorias</span></a>
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
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Curiosidades"><img src="imagens/imagem_noticia.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Curiosidades</span>
                                </div>
                                <div class="row">
                                    <p>Principais curiosidades que aconteceram pelo mundo? um novo costume bizarro?
                                        uma informação possivelmente inutil mas que vale a pena conhecer? o que encontraremos
                                        aqui, boa sorte pra descobrir
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Novidades"><img src="imagens/imagem_assuntos_gerais.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Novidades</span>
                                </div>
                                <div class="row">
                                    <p>Aquela novidade que estavamos esperando independente da área, esportes, jogos, cassino? (Alô policia federal),
                                        se tem uma novidade este é o local ideal.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Jogos"><img src="imagens/imagem_jogo.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Jogos</span>
                                </div>
                                <div class="row">
                                    <p>Área favorita de muitos, bora conhecer mais sobre nossos jogos favoritos, de uma maneira
                                        mais pratica, pra poder ir direto no ponto. Vamos jogar.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Programacao"><img src="imagens/imagem_programacao.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Programação</span>
                                </div>
                                <div class="row">
                                    <p>Sempre quis conhecer mais sobre programação? Como são feito sites, sistemas e os Jogos
                                        que nos cercam no dia a dia, talvez você acabe aprendendo algo por aqui.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Animes"><img src="imagens/imagem_anime.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Animes</span>
                                </div>
                                <div class="row">
                                    <p>Quais os animes da temporada? não sei também, talvez a gente descubra aqui, talvez não.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Desenho"><img src="imagens/imagem_desenho.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Desenhos</span>
                                </div>
                                <div class="row">
                                    <p>Você sabe desenhar e quer mostrar seus desenhos e técnicas,
                                        ou só aprender com outros artistas? talvez essa área ajude.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Series"><img src="imagens/imagem_serie.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Séries</span>
                                </div>
                                <div class="row">
                                    <p>Bora falar sobre as nossas séries favoritas e sobre como todos amamos o Michael?</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Filmes"><img src="imagens/imagem_filme.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Filmes</span>
                                </div>
                                <div class="row">
                                    <p>Aqueles filmes que marcaram época ou os novos que estão chamando atenção merecem um lugar
                                        só pra eles, bora conhecer mais sobre nossos filmes incriveis e quem sabe conhecer novos
                                        filmes pra salvar nosso fim de semana do tédio.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Digimon"><img src="imagens/imagem_digimon.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Digimon</span>
                                </div>
                                <div class="row">
                                    <p>Aviso de área nostalgica, você já jogou algum jogo de Digimon na infância? se sim
                                        talvez você acabe curtindo, conhecer mais sobre as franquias que marcaram nossa infância
                                        pode enriquecer ainda mais a expêriencia que tinhamos quando mais novos.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Yugioh"><img src="imagens/imagem_yugioh.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Yugioh</span>
                                </div>
                                <div class="row">
                                    <p>Quem nunca ficou com raiva da tv aberta, que era fã de Yugioh, tinha varias cartinhas mas do
                                        mais absoluto nada começaram a falar que era tudo diabolico, sem nem conhecerem nada sobre o 
                                        anime. É, tempos sombrios kkkk
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Ragnarok"><img src="imagens/imagem_ragnarok.png" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Ragnarok</span>
                                </div>
                                <div class="row">
                                    <p>O primeiro MMORPG de muitos, já foi considerado o melhor jogo do mundo no seu auge, mas
                                        que mesmo com o passar dos anos ainda mantém uma base de players jogando, esse jogo 
                                        com certeza marcou muita gente e merece seu lugar por aqui.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom">
                        <div class="col-sm-3">
                            <a href="categoria?categoria=Discord"><img src="imagens/imagem_discord.jpg" class="img_postagem"></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row">
                                    <span class="negrito">Discord</span>
                                </div>
                                <div class="row">
                                    <p>Bora falar sobre o discord? melhores bots possiveis? como configurar eles e criar o seu
                                        servidor dos sonhos? essa área é pra isso bora.
                                    </p>
                                </div>
                            </div>
                        </div>
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