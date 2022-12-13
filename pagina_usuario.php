<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Titulo -->
        <title>Pagina do Usuário</title>
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
                $('#post').click( function()
                    {
                    $.ajax({
                          $('#modal-post').modal();
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
                <a href="#"><img src="imagens/perfil.jpg" class="mobile_profile_image" alt=""></a>
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
                <a class="link_foto" href="#"><img src="imagens/perfil.jpg" class="profile_image" alt=""></a>
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
                            <form method="post" action="enviar_post.php" id="formPost" enctype="multipart/form-data">
                                <div class="container">
                                    <select class="form-control select_custom" id="tipoInput">
                                        <option value="1">Titulo</option>
                                        <option value="2">Conteúdo</option>
                                        <option value="3">Imagem</option>
                                    </select>
                                    <br/>
                                    <a class="btn btn-primary select_custom" href="javascript:void(0)" id="addInput">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        Adicionar Campo
                                    </a>
                                    <br/><br>
                                    <div id="dynamicDiv">
                                        <p>
                                            <input type="text" id="post[1]" name="post[1]" size="20" value="" placeholder="Adicione um titulo" maxlength="50" required/><br><br>
                                        </p>
                                        <p>
                                        <textarea id="post[2]" name="post[2]" rows="3" cols="18" placeholder="Adicione um resumo" minlength="50" required></textarea><br><br>
                                        </p>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Enviar">

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
                                                    `<input type="text" id="post[${qnt_input}]" name="post[${qnt_input}]" size="20" value="" placeholder="Adicione um titulo" maxlength="50" required/><br><br>`+
                                                    '<a class="btn btn-danger" href="javascript:void(0)" id="remInput">'+
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
                                                    `<textarea id="post[${qnt_input}]" name="post[${qnt_input}]" rows="3" cols="18" placeholder="Conteúdo do Post" minlength="50" required></textarea><br><br>`+
                                                    '<a class="btn btn-danger" href="javascript:void(0)" id="remInput">'+
                                                        '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
                                                        'Remover Campo'+
                                                    '</a><br><br>'+
                                                '</p>').appendTo(scntDiv);
                                                return false;
                                                }
                                            if($('#tipoInput :selected').val() == 3 && file_unico == 0)
                                                {
                                                file_unico = 1;
                                                $('<p>'+
                                                    `<input type="hidden" name="MAX_FILE_SIZE" value="99999999"/><input id="imagem" name="imagem[]" type="file" multiple="multiple" required/><br>`+
                                                    '<a class="btn btn-danger" href="javascript:void(0)" id="remInput1">'+
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

        <section class="content">
            <div class="Container">
                <div class="col-sm-9">
                    <div class="row custom1">
                        <div class="col-sm-12">
                            <input type="text" class="form-control form_custom" placeholder="Poste aqui" id="post" data-toggle="modal" data-target="#modal-post">
                            <button class="btn btn-outline-secondary button_custom" type="button">Enviar Post</button>
                        </div>
                    </div>
                    <div id="portal">
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

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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
        </script>

    </body>
</html>