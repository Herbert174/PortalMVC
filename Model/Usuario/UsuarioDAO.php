<?php

    class UsuarioDAO //Classe utilizada para fazer a comunicação com o banco de dados
        {
        public function VerificaUsuario(UsuarioVO $Usuario) //Usuario pode ser criado no banco de dados?
            {
            $NOME = $Usuario->retornaNomeUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " SELECT * FROM usuarios where nome = '$NOME' ";

            if($ConsultaUsuario = mysqli_query($link, $sql))
                {
                $DadosUsuario = mysqli_fetch_array($ConsultaUsuario);
                if(isset($DadosUsuario['nome']))
                    {
                    header("Location: cadastrar.php?erro_usuario=1");
                    die ();
                    }else
                        return true;
                }
            }

        public function VerificaEmail(UsuarioVO $Usuario) //Email pode ser criado no banco de dados?
            {
            $EMAIL = $Usuario->retornaEmailUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " SELECT * FROM usuarios where email = '$EMAIL' ";

            if($ConsultaEmail = mysqli_query($link, $sql))
                {
                $DadosEmail = mysqli_fetch_array($ConsultaEmail);
                if(isset($DadosEmail['email']))
                    {
                    header("Location: cadastrar.php?erro_email=1");
                    die ();
                    }else
                        return true;
                }
            }

        public function VerificaImgUsuario(UsuarioVO $Usuario) //Usuario enviou img para perfil?
            {
            if(!empty($_FILES['imgPerfil']['name']))//Verifica se algo foi enviado para imagem através de FILES
                {
                $imagem = $_FILES['imgPerfil'];//Guarda o arquivo em $imagem
        
                if($imagem['error'])//Caso o arquivo esteja corrompido, para o codigo e retorna a mensagem de erro
                    die("Falha ao enviar imagem");
        
                if($imagem['size'] > 4194304)//Verifica se o tamanho da imagem excede o tamanho maximo, 4MB
                    die("Arquivo excedeu o tamanho limite!! Max: 4MB");
        
                $pasta = "imagens/";//Define em $pasta o local onde a imagem será armazenada
                $nomeImagem = $imagem['name'];//Armazena o nome original do arquivo
                $novoNomeImagem = uniqid();//Gera um id unico para que os nomes das imagens não se repitam
                $extensao = strtolower(pathinfo($nomeImagem,PATHINFO_EXTENSION));//Retorna somente o nome da extensão 
                // da imagem/arquivo, transformando ele em minusculo se for preciso com a função strtolower
                
                if($extensao != "jpg" && $extensao != "png")//Verifica se a extensão enviada é jpg ou png
                    die("Formato de arquivo não aceito");
        
                $path = $pasta.$novoNomeImagem.".".$extensao;//Define o local onde a imagem será armazenada e o nome que será salvo
        
                move_uploaded_file($imagem['tmp_name'], $path);//Move o arquivo selecionado para a pasta de imagens/arquivo do servidor
        
                $img = $path;

                $Usuario->defineImgUsuario($img);
                $IMG = $Usuario->retornaImgUsuario();

                return $IMG;
                }else{
                     return false;
                     }
            }

        public function AtualizaImgUsuario(UsuarioVO $Usuario) //Atualiza imagem do perfil do usuario
            {
            $id_usuario = $Usuario->retornaIdUsuario();
            $img = $Usuario->retornaImgUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " UPDATE usuarios SET img_perfil = '$img' WHERE id_usuario = '$id_usuario' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                return true;
                }else
                    die('Falha ao atualizar sua imagem no banco de dados');
            }

        public function AtualizaNomeUsuario(UsuarioVO $Usuario) //Atualiza nome do perfil do usuario
            {
            $id_usuario = $Usuario->retornaIdUsuario();
            $nome = $Usuario->retornaNomeUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " UPDATE usuarios SET nome = '$nome' WHERE id_usuario = '$id_usuario' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                return true;
                }else
                    die('Falha ao atualizar seu nome no banco de dados');
            }

        public function RegistrarUsuario(UsuarioVO $Usuario) //Registra usuario no banco de dados
            {
            $Nome = $Usuario->retornaNomeUsuario();
            $Email = $Usuario->retornaEmailUsuario();
            $Senha = $Usuario->retornaSenhaUsuario();
            //Img = $Usuario->retornaImgUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " INSERT INTO usuarios(nome, email, senha) ";
            $sql .= " values('$Nome', '$Email', '$Senha') ";

            if($ResultadoRegistro = mysqli_query($link, $sql))
                {
                return true;
                }else
                    die('Aconteceu algum erro ao registrar sua conta no sistema');
            }

        public function ApagarUsuario($IdUsuario) //Apaga usuario do banco de dados
            {
            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " DELETE FROM usuarios WHERE id_usuario = '$IdUsuario' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                return true;
                }else
                    return false;
            }

        public function LoginUsuario(UsuarioVO $Usuario) //Realiza o acesso do usuario no sistema
            {
            $nome = $Usuario->retornaNomeUsuario();
            $senha = $Usuario->retornaSenhaUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();
            
            $sql = " SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha' AND status_usuario != 'Bloqueado' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                $DadosLogin = mysqli_fetch_array($Resultado);
                if($DadosLogin['status_usuario'] == 'Habilitado')
                    {
                    $_SESSION['credencial'] = $DadosLogin['status_usuario'];
                    }else unset($_SESSION['credencial']);

                if($DadosLogin['acesso_usuario'] != 'Negado')
                    {
                    $_SESSION['credencial_adm'] = $DadosLogin['acesso_usuario'];
                    }else unset($_SESSION['credencial_adm']);
                    
                $_SESSION['img_perfil'] = $DadosLogin['img_perfil'];
                $_SESSION['id_usuario'] = $DadosLogin['id_usuario'];
                $_SESSION['usuario']    = $DadosLogin['nome'];
                $_SESSION['email']      = $DadosLogin['email'];
                if(isset($DadosLogin['nome']))
                    {
                    return true;
                    }else
                        {
                        header("Location: login.php?erro=1");
                        //die();
                        }
                }        
            }

        public function DeslogaUsuario() //Desconecta o acesso do usuario no sistema
            {
            // Apaga todas as variáveis da sessão
            $_SESSION = array();

            // Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
            // Nota: Isto destruirá a sessão, e não apenas os dados!
            if (ini_get("session.use_cookies")) 
                {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
                }

            // Por último, destrói a sessão
            session_destroy();

            if($_SESSION['id_usuario'] != null)
                {
                return true;
                } else
                    return false;
            }

        public function VerificaAcesso(UsuarioVO $Usuario)
            {
            $idUsuario = $Usuario->retornaIdUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();
            
            $sql = " SELECT * FROM usuarios WHERE id_usuario = '$idUsuario' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                $DadosLogin = mysqli_fetch_array($Resultado);
                if($DadosLogin['acesso_usuario'] != 'Negado')
                    {
                    return true;
                    }else return false;
                }else die ('Falha ao se comunicar com o banco de dados');
            }

        public function VerificaCurtidasPost(UsuarioVO $Usuario)
            {
            $IdUsuario = $Usuario->retornaIdUsuario();
            $IdPost = $_SESSION['id_post'];

            $objDb = new database();
            $link = $objDb->conecta_mysql();
            
            $sql = " SELECT * FROM lista_curtidas WHERE id_usuario = '$IdUsuario' AND id_post = '$IdPost' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                if($Curtida = mysqli_fetch_array($Resultado))
                    {
                    return true;
                    }else return false;
                }else die ('Falha ao se comunicar com o banco de dados');
            }

        public function VerificaCurtidasAutorPost(UsuarioVO $Usuario)
            {
            $IdUsuario = $Usuario->retornaIdUsuario();
            $IdPost = $_SESSION['id_post'];
            $IdAutor = $_SESSION['id_autor_post'];

            $objDb = new database();
            $link = $objDb->conecta_mysql();
            
            $sql = " SELECT * FROM lista_follow WHERE id_usuario = '$IdUsuario' AND id_criador = '$IdAutor' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                if($Follow = mysqli_fetch_array($Resultado))
                    {
                    return true;
                    }else return false;
                }else die ('Falha ao se comunicar com o banco de dados'); 
            }

        public function AdicionarCurtidaPost()
            {
            $IdUsuario = $_SESSION['id_usuario'];
            $IdPost = $_SESSION['id_post'];
            $QntdAntigaCurtidas = $_SESSION['qntd_curtidas_post'];
            $qntdCurtidas = $QntdAntigaCurtidas + 1;

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " INSERT INTO lista_curtidas(id_usuario, id_post) ";
            $sql .= " values('$IdUsuario', '$IdPost') ";

            if($AddCurtida = mysqli_query($link, $sql))
                {
                $sql = " UPDATE post SET qntd_curtidas = '$qntdCurtidas' WHERE id_post = '$IdPost' ";
                if($AttQntdCurtidas = mysqli_query($link, $sql))
                    {
                    return true;
                    }else
                        die('Falha ao atualizar qntd curtidas no banco de dados'); 
                }else
                    die('Falha ao adicionar sua curtida no banco de dados');      
            }

        public function RemoverCurtidaPost()
            {
            $IdUsuario = $_SESSION['id_usuario'];
            $IdPost = $_SESSION['id_post'];
            $QntdAntigaCurtidas = $_SESSION['qntd_curtidas_post'];
            $qntdCurtidas = $QntdAntigaCurtidas - 1;

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " DELETE FROM lista_curtidas WHERE id_usuario = '$IdUsuario' AND id_post = '$IdPost' ";

            if($RemCurtida = mysqli_query($link, $sql))
                {
                $sql = " UPDATE post SET qntd_curtidas = '$qntdCurtidas' WHERE id_post = '$IdPost' ";
                if($AttQntdCurtidas = mysqli_query($link, $sql))
                    {
                    return true;
                    }else
                        die('Falha ao atualizar qntd curtidas no banco de dados');
                }else
                    return false;
            }

        public function AdicionarCurtidaAutor()
            {
            $IdUsuario = $_SESSION['id_usuario'];
            $IdAutor = $_SESSION['id_autor_post'];
            $QntdAntigaCurtidas = $_SESSION['qntd_curtidas_autor'];
            $qntdCurtidas = $QntdAntigaCurtidas + 1;

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " INSERT INTO lista_follow(id_usuario, id_criador) ";
            $sql .= " values('$IdUsuario', '$IdAutor') ";

            if($ResultadoRegistro = mysqli_query($link, $sql))
                {
                $sql = " UPDATE usuarios SET qntd_follows = '$qntdCurtidas' WHERE id_usuario = '$IdAutor' ";
                if($AttQntdCurtidas = mysqli_query($link, $sql))
                    {
                    return true;
                    }else
                        die('Falha ao atualizar qntd curtidas no banco de dados');
                }else
                    die('Falha ao adicionar sua curtida no banco de dados');      
            }

        public function RemoverCurtidaAutor()
            {
            $IdUsuario = $_SESSION['id_usuario'];
            $IdAutor = $_SESSION['id_autor_post'];
            $QntdAntigaCurtidas = $_SESSION['qntd_curtidas_autor'];
            $qntdCurtidas = $QntdAntigaCurtidas - 1;

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " DELETE FROM lista_follow WHERE id_usuario = '$IdUsuario' AND id_criador = '$IdAutor' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                $sql = " UPDATE usuarios SET qntd_follows = '$qntdCurtidas' WHERE id_usuario = '$IdAutor' ";
                if($AttQntdCurtidas = mysqli_query($link, $sql))
                    {
                    return true;
                    }else
                        die('Falha ao atualizar qntd curtidas no banco de dados');
                }else
                    return false;
            }

        public function GetAllUsuarios() //Realiza o acesso do usuario no sistema
            {
            $objDb = new database();
            $link = $objDb->conecta_mysql();
            
            $sql = " SELECT * FROM usuarios ";

            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }else 
                    return false;
            }

        public function PegarUsuariosFiltro(UsuarioVO $Usuarios) //Realiza consulta com filtro de usuarios
            {
            $nomeUsuario = $Usuarios->retornaNomeUsuario();
            $emailUsuario = $Usuarios->retornaEmailUsuario();
            $statusUsuario = $Usuarios->retornaStatusUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $lista = [];

            //----------------------------  Logica do filtro enviado  ---------------------------

            if($nomeUsuario == '' && $emailUsuario == '' && $statusUsuario == '')
                {
                $sql = " SELECT * FROM usuarios ";
                }

            if($nomeUsuario == '' && $emailUsuario == '' && $statusUsuario != '')
                {
                $sql = " SELECT * FROM usuarios WHERE status_usuario = '$statusUsuario' ";
                }

            if($nomeUsuario == '' && $emailUsuario != '' && $statusUsuario == '')
                {
                $sql = " SELECT * FROM usuarios WHERE email = '$emailUsuario' ";
                }

            if($nomeUsuario == '' && $emailUsuario != '' && $statusUsuario != '')
                {
                $sql = " SELECT * FROM usuarios WHERE email = '$emailUsuario' and status_usuario = '$statusUsuario' ";
                }

            if($nomeUsuario != '' && $emailUsuario == '' && $statusUsuario == '')
                {
                $sql = " SELECT * FROM usuarios WHERE id_usuario = '$nomeUsuario' ";
                }

            if($nomeUsuario != '' && $emailUsuario == '' && $statusUsuario != '')
                {
                $sql = " SELECT * FROM usuarios WHERE id_usuario = '$nomeUsuario' and status_usuario = '$statusUsuario' ";
                }

            if($nomeUsuario != '' && $emailUsuario != '' && $statusUsuario == '')
                {
                $sql = " SELECT * FROM usuarios WHERE id_usuario = '$nomeUsuario' and email = '$emailUsuario' ";
                }

            if($nomeUsuario != '' && $emailUsuario != '' && $statusUsuario != '')
                {
                $sql = " SELECT * FROM usuarios WHERE id_usuario = '$nomeUsuario' and email = '$emailUsuario' and status_usuario = '$statusUsuario' ";
                }

            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }else
                    return false;

            }

        public function AtualizarStatusUsuario(UsuarioVO $Usuario) //Atualiza status de usuario
            {
            $id_usuario = $Usuario->retornaIdUsuario();
            $status_usuario = $Usuario->retornaStatusUsuario();

            $sql = " UPDATE usuarios SET status_usuario = '$status_usuario' WHERE id_usuario = '$id_usuario' ";

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            if($resultado_post = mysqli_query($link, $sql))
                {
                return true;
                } else 
                    return false;
            }
        
        }

?>