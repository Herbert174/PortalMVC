<?php

    session_start();

    include "Controller/PortalController.php";
	$id_usuario  = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : NULL;

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
        <title>Painel Digievolução</title>
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

        <script type="text/javascript" src="Javascript/ClassDigievolucao.js"></script>
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
                <a href="pagina_usuario"><img src="imagens/perfil.jpg" class="mobile_profile_image" alt=""></a>
                <h4 class="nomeUsuarioColapse"><?= $usuario ?></h4>
                <i class="fa fa-bars nav_btn"></i>
            </div>
            <div class="mobile_nav_items">
                <a href="index"><i class="fas fa-desktop"></i><span>Inicio</span></a>
                <a href="javascript:void(0)" id="perfil" data-toggle="modal" data-target="#modal-perfil"><i class="fas fa-cogs"></i><span>Configure seu perfil</span></a>
                <a href="categorias"><i class="fas fa-table"></i><span>Categorias</span></a>
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
            <a href="javascript:void(0)" id="perfil" data-toggle="modal" data-target="#modal-perfil"><i class="fas fa-cogs"></i><span>Configure seu perfil</span></a>
            <a href="categorias"><i class="fas fa-table"></i><span>Categorias</span></a>
            <a href="#"><i class="fas fa-th"></i><span>Novidades</span></a>
            <a href="#"><i class="fas fa-info-circle"></i><span>Deslogar</span></a>
            <a href="#"><i class="fas fa-sliders-h"></i><span>Painel Digievolução</span></a>
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
                <div class="col-sm-12">
                    <div class="row custom">
                        <div class="page-header texto-capa">
                            <h1>Tabela de digievolução Digimon World 1</h1>
                        </div>
                  
                        <section class="conteudo">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <h3 class="centro">Seleção de digimon</h3><br>
                                            <form action="#" id="FormEvolucao">
                                                <p class="centro">Digimon atual</p> 
                                                <select class="form-control select_PainelDig" data-toggle='tooltip' data-placement='bottom' title="Escolha seu digimon atual" id="SelectDigAtual" onchange="Digimon.SelecionandoDigimonAtual();"> 
                                                    <option value="0">Selecione um digimon</option>
                                                    <option value="1">Agumon</option>
                                                    <option value="2">Airdramon</option>
                                                    <option value="3">Andromon</option>
                                                    <option value="4">Angemon</option>
                                                    <option value="5">Bakemon</option>
                                                    <option value="6">Betamon</option>
                                                    <option value="7">Birdramon</option>
                                                    <option value="8">Biyomon</option>
                                                    <option value="9">Botamon</option>
                                                    <option value="10">Centarumon</option>
                                                    <option value="11">Coelamon</option>
                                                    <option value="12">Devimon</option>
                                                    <option value="13">Digitamamon</option>
                                                    <option value="14">Drimogemon</option>
                                                    <option value="15">Elecmon</option>
                                                    <option value="16">Etemon</option>
                                                    <option value="17">Frigimon</option>
                                                    <option value="18">Gabumon</option>
                                                    <option value="19">Garurumon</option>
                                                    <option value="20">Giromon</option>
                                                    <option value="21">Greymon</option>
                                                    <option value="22">H-Kabuterimon</option>
                                                    <option value="23">Kabuterimon</option>
                                                    <option value="24">Kokatorimon</option>
                                                    <option value="25">Koromon</option>
                                                    <option value="26">Kunemon</option>
                                                    <option value="27">Kuwagamon</option>
                                                    <option value="28">Leomon</option>
                                                    <option value="29">Mamemon</option>
                                                    <option value="30">Megadramon</option>
                                                    <option value="31">MegaSeadramon</option>
                                                    <option value="32">Meramon</option>
                                                    <option value="33">MetalGreymon</option>
                                                    <option value="34">MetalMamemon</option>
                                                    <option value="35">Mojyamon</option>
                                                    <option value="36">Monochromon</option>
                                                    <option value="37">Monzaemon</option>
                                                    <option value="38">Nanimon</option>
                                                    <option value="39">Ninjamon</option>
                                                    <option value="40">Numemon</option>
                                                    <option value="41">Ogremon</option>
                                                    <option value="42">Palmon</option>
                                                    <option value="43">Patamon</option>
                                                    <option value="44">Penguinmon</option>
                                                    <option value="45">Phoenixmon</option>
                                                    <option value="46">Piximon</option>
                                                    <option value="47">Poyomon</option>
                                                    <option value="48">Punimon</option>
                                                    <option value="49">Seadramon</option>
                                                    <option value="50">Shellmon</option>
                                                    <option value="51">SkullGreymon</option>
                                                    <option value="52">Sukamon</option>
                                                    <option value="53">Tanemon</option>
                                                    <option value="54">Tokomon</option>
                                                    <option value="55">Tsunomon</option>
                                                    <option value="56">Tyrannomon</option>
                                                    <option value="57">Unimon</option>
                                                    <option value="58">Vademon</option>
                                                    <option value="59">Vegiemon</option>
                                                    <option value="60">Whamon</option>
                                                    <option value="61">Yuramon</option>
                                                </select><br>
                                                <p class="centro">Digimon alvo</p> 
                                                <select class="form-control" id="SelectDigAtual"> 
                                                    <option value="1">Agumon</option>
                                                </select><br>
                                                <p class="centro">Status Digimon</p>
                                                <label>HP</label> <input type="number" class="input_direita"><br><br>

                                                <label>MP</label> <input type="number" class="input_direita"><br><br>

                                                <label>Ataque</label> <input type="number" class="input_direita"><br><br>

                                                <label>Defesa</label> <input type="number" class="input_direita"><br><br>

                                                <label>Velocidade</label> <input type="number" class="input_direita"><br><br>

                                                <label>Inteligencia</label> <input type="number" class="input_direita"><br><br>

                                                <label>Descuidos</label> <input type="number" class="input_direita"><br><br>

                                                <label>Peso</label> <input type="number" class="input_direita"><br><br>

                                                <p class="centro">Critérios bonus</p>
                                                <label>Felicidade</label> <input type="number" class="input_direita"><br><br>

                                                <label>Disciplina</label> <input type="number" class="input_direita"><br><br>

                                                <label>Batalhas</label> <input type="number" class="input_direita"><br><br>

                                                <label>N° de tecnicas</label> <input type="number" class="input_direita"><br><br>
                                            </form><br><br>
                                        </div>
                                        <div class="col-md-8">
                                            <h3 class="centro">Requisitos</h3>
                                            <div>
                                                <table class="table table-hover">
                                                    <thead class="tabela_custom">
                                                        <tr>
                                                            <th scope="col" colspan="2" class="centro">Digimon</th>
                                                            <th scope="col" colspan="1" class="centro">Requisitos</th>
                                                            <th scope="col" colspan="2" class="centro">Criterios especiais</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="RequisitosDig">
                                                    </tboby>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.nav_btn').click(function(){
                    $('.mobile_nav_items').toggleClass('active');
                    })

                    $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                    $('[data-toggle="popover"]').popover()
                    });
                });

            
        </script>

    </body>
</html>