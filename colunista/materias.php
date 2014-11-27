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
        <script type="text/javascript"> 
            onload = function(){     
                var imgMiniLogo = document.getElementById("imgMiniLogo");
                var imgLogo = document.getElementById("img-logo");                
                imgMiniLogo.innerHTML = '<img src="../imagens/logosReduzidos001.png" alt="" id="miniLogo">';
                imgLogo.innerHTML = '<img src="../imagens/logo001.png" alt="" id="logo">';   
                document.getElementById("nav").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";                 
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E";               
                document.getElementById("tituloPagina").style.backgroundColor = "#00989E"; 
            };
            
                function mostrarMateria(info,id,value){
                    document.getElementById(info).style.display = 'inline';
                    document.getElementById(id).src = "listaMateria.php?&tipoMateria="+value;
                }
        </script>
        <title> Multiplayer </title>
    </head>
    <body >
        <section id="container" >
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
            ?>
            <header id="cabecalho">
                <?php
                validaAutenticacao('../index.php','3');
                include_once '../includes/menuR.php';
                ?>
            </header>
            <figure id="imgCapa">
                <?php
                buscarDados('imgcapa');
                ?>
                
            </figure>
            <article id="conteudo">
                <div id="info_user">    
                    <figure id="imgUser" onmouseover="mostrarCam();" onmouseout="retirarCam();" >
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
                    </figure>
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
                        include '../includes/menuC.php';
                    ?>
                </nav>
                <article id="conteudo_infos">
                             <form action="inserirMateriaNova.php" method="post" enctype="multipart/form-data" class="novaMateria" onsubmit="return validaInserir(this);">
                        <div id="categoria">
                            <h1> Selecione um tipo de Matéria: </h1> <br/>
                            <ul class="inputRadios">
                            <li class="inputRadio radioNintendo">
                              <input name="categoria[]"  value="2" type="radio" id="radioNintendo" onclick="mostrarMateria('mostrarMaterias','mostrar_materias','2');">
                              <label for="radioNintendo">Nintendo</label><br/><br/><br/>
                              <p> Nintendo </p>
                            </li>

                            <li class="inputRadio radioPc">
                              <input name="categoria[]"  value="4" type="radio" id="radioPc" onclick="mostrarMateria('mostrarMaterias','mostrar_materias','4');">
                              <label for="radioPc">PC</label><br/><br/><br/>
                              <p> PC </p>
                            </li>

                            <li class="inputRadio radioPlaystation">
                              <input name="categoria[]"  value="1" type="radio" id="radioPlaystation" onclick="mostrarMateria('mostrarMaterias','mostrar_materias','1');">
                              <label for="radioPlaystation">Playstation</label><br/><br/><br/>
                              <p> Playstation </p>
                            </li>

                            <li class="inputRadio radioXbox">
                              <input name="categoria[]"  value="3" type="radio" id="radioXbox" onclick="mostrarMateria('mostrarMaterias','mostrar_materias','3');">    
                              <label for="radioXbox">Xbox</label><br/><br/><br/>
                              <p> Xbox </p>
                            </li>
                            <li class="inputRadio radioNostalgia">
                              <input name="categoria[]"  value="0" type="radio" id="radioNostalgia" onclick="mostrarMateria('mostrarMaterias','mostrar_materias','5');">    
                              <label for="radioNostalgia">Xbox</label><br/><br/><br/>
                              <p> Nostalgia </p>
                            </li>
                            <li class="inputRadio radioMulti">
                              <input name="categoria[]"  value="0" type="radio" id="radioMulti" onclick="mostrarMateria('mostrarMaterias','mostrar_materias','0');">    
                              <label for="radioMulti">Xbox</label><br/><br/><br/>
                              <p> Multiplataforma </p>
                            </li>
                          </ul> 
                        </div>
                        <div id="mostrarMaterias" style="display:none;">
                             <iframe  id="mostrar_materias"  src="" frameborder="0" allowfullscreen></iframe>     
                        </div>
                       </form>
                </article>                
            </article>
            <div id="imgFooter" ondragstart="return false">
                <img src="../imagens/imagemRodape.png">
            </div>
            <footer id="footer">
                <?php
                    include_once '../includes/rodapeAdmin.php';
                ?>
            </footer>            
        </section>
    </body>
</html>