<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="../js/funcoes.js"> </script>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/cycle.js"></script>
        <script type="text/javascript" src="../js/javascript.js"></script>
        <script type="text/javascript" src="../js/menu2.js"></script>
        <script type="text/javascript" src="../js/restrito.js"></script>
        <script type="text/javascript"> 
            onload = function(){     
                document.getElementById("imgMiniLogo").innerHTML = '<img src="../imagens/logosReduzidos001.png" alt="" id="miniLogo">';
                var imgLogo = document.getElementById("img-logo");
                imgLogo.innerHTML = '<img src="../imagens/logo001.png" alt="" id="logo">';
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";  
                document.getElementById("nav").style.backgroundColor = "#00989E";              
                document.getElementById("imgPrincipal").style.backgroundColor = "#009FE3"; 
                document.getElementById("tituloMateria").style.backgroundColor = "#009FE3";
                document.getElementById("logar").style.borderBottom = "solid 5px #009FE3"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#009FE3";
                document.getElementById("tituloPagina").style.backgroundColor = "#009FE3";            

            };
        </script>
        <title></title>
    </head>
    <body >
        <section>
        <?php             
             include '../includes/funcoesUteis.inc';
             include '../conexao/conecta.inc';
             validaAutenticacao('index.php','1');
             ?>
            <header id="cabecalho">
                <?php
                include_once '../includes/menuR.php';
                validaAutenticacao('../index.php','1');
                ?>
            </header>
            <figure id="imgCapa">
                <?php
                buscarDados('imgcapa');
                ?>
                
            </figure>
            <article id="conteudo">
                <div id="info_user">  
                    <div id="linksAtualizarImg"> 
                        <a href="alterarImg.php"> Alterar</a><br/>
                        <a href="removerImg.php"> Remover</a>
                    </div>                     
                        <?php
                            $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                            $result = mysql_query($query);                
                            $imagens = mysql_num_rows($result);
                            if($imagens === 0){
                            $nome = "default.jpg";            
                            mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO)
                            VALUES('$nome'".$_SESSION['code'].")");
                            }
                            else{
                            $imagens2 = mysql_fetch_array($result); 
                            $urlImagem = $imagens2['URL_IMAGEM'];
                            echo "<img src='../uploads/$urlImagem' id='imagemUser' alt='imagem'>";
                        ?>
                        <figure id="imgCam" >                       
                            <a onclick="mostrarLinks();"  href="#" id="camera"></a>
                        </figure>
                        <nav id="menuImagem" >

                        </nav>    
                    <div id="nomeUser">
                        <?php
                        $sql = mysql_query("SELECT NOME_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
                        $result = mysql_fetch_array($sql); 
                        echo '<h1 class="username">'.$result['NOME_USUARIO'].'<br/>( '.$result['APELIDO_USUARIO'].' )</h1>';
                        }
                        ?>
                    </div>
                </div>
                                                <nav id="menu2">
                    <?php 
                        include '../includes/menuA.php';
                    ?>
                </nav>
                <nav id="menuOpcoes">
            <ul class="home">
                <li id="buscaLog">
                    <form action='logUsuario.php' method='get'>
                    <label id='name_busca'>Busca de Usuário:</label>
                    <input type='text' onKeyPress='return letras();' name='nome_user_log' id="buscarLog">
                    </form>
                    <br/><br/><br/><br/><br/><br/>
                </li>
                <li><a target='tela' href='listarLog.php?tipoLog=1'> Efetuaram Login </a></li>
                 <li><a target='tela' href='listarLog.php?tipoLog=2'> Alteraram Foto </a></li>
                 <li><a target='tela' href='listarLog.php?tipoLog=3'> Desativados </a></li>
                 <li><a target='tela' href='listarLog.php?tipoLog=4'> Deletados </a></li>
                 <li><a target='tela' href='listarLog.php?tipoLog=5'> Reativados </a></li>
                 <li><a target='tela' href='listarLog.php?tipoLog=6'> Alteraram Senha </a></li>
                 <li><a target='tela' href='listarLog.php?tipoLog=7'> Alteraram E-mail </a></li>
                 <li><a target='tela' href='listarLog.php?tipoLog=8'> Alteraram Nome </a></li>
                 <li><a target='tela' href='listarLog.php?tipoLog=9'> Comentaram Artigo </a></li>
                 <li><a target='tela' href='listarLog.php?tipoLog=10'> Fez Cadastro </a></li>
                 <li><a target='tela' href='listarLog.php?tipoLog=11'> efetuou Logout </a></li>
            </ul>
        </nav>

                <article id="conteudo_infos"> <br/>
                    
                   
                    
                    <a href="javascript:history.go(-1);" id="linkVoltarUsuarios"> Voltar </a>
                    <br/><br/>
                </article>                
            </article>
            <footer id="footer">
                <?php
                    include_once '../includes/rodape.php';
                ?>
            </footer>            
        </section>
    </body>
</html>