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
        <title></title>
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
        </script>  
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
                            <a onmousedown="mostrarLinks();"  id="camera"></a>
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
                   
                    <form action="InserirNovoPersonagem.php" method="post" enctype="multipart/form-data" class="novaMateria">
                      
                        <figure id="imgPreview">                            
                            <p> Selecione uma imagem com dimensões 400x250 para esta área.</p>
                            <img id="preview_file" alt="" src="">
                            <input type="file" name="imagemPrincipal2" class="imgPreview" id="preview_files" onchange="preview(this,'principal');" multiple>
                        </figure>  
                        <figure id="imgCapaMateria">
                            <p> Selecione uma imagem de capa com dimensões 400x250 para esta área.</p>
                            <img id="preview_imageCapa" alt="" src="">
                            <input type="file" name="imagemCapa" class="imgCapaMateria" onchange="preview(this,'capa');" multiple>
                        </figure>
                        
                        <figure id="imgPrincipal2">                            
                            <p> Selecione uma imagem com dimensões 400x250 para esta área.</p>
                            <img id="preview_image" alt="" src="">
                            <input type="file" name="imagemPrincipal2" class="imgPrincipal" id="files" onchange="preview(this,'principal');" multiple>
                        </figure>
                        <div id="tituloMateria">
                            <input type="text" name="titulo_conteudo" class="textos_materia" id="titulo_materia" placeholder="Digite aqui o nome do personagem">
                        </div>                       
                       
                        <div id="conteudoMateria">                            
                            <div id="subtituloMateria">
                                <input type="text" name="subtitulo" class="subtituloMateria" placeholder="Subtítulo">
                            </div>
                            <p> Limite de Caracteres: 1500. </p>
                            <textarea id="campoConteudo1" placeholder="Digite o texto da matéria aqui" name="conteudo" maxlength="1500"></textarea>
                        </div>
                        <div id="galeriaImagens">
                            <figure class="imagensGaleria" >
                                <p> imagem 255x150</p>
                                <img id="preview_imageGaleria1" alt="" src="">
                                <input type="file" name="imagemGaleria" class="imgGaleria1" onchange="preview(this,'galeria1');" multiple>
                            </figure>
                            <figure class="imagensGaleria">
                                <p> imagem 255x150</p>
                                <img id="preview_imageGaleria2" alt="" src="">
                                <input type="file" name="imagemGaleria2" class="imgGaleria1" onchange="preview(this,'galeria2');" multiple>
                            </figure>
                            <figure class="imagensGaleria" >
                                <p> imagem 255x150</p>
                                <img id="preview_imageGaleria3" alt="" src="">
                                <input type="file" name="imagemGaleria3" class="imgGaleria1" onchange="preview(this,'galeria3');" multiple>
                            </figure>                                
                        </div>
                        <div id="galeriaVideo">
                            <div id="opcoesVideo1">
                            <input type="text" name="urlVideo1" class='txtUrlVideos' id="urlVideo1" placeholder="DIGITE A URL DO VIDEO">
                            <input type='button' class='previewVideos' id="preverVideo1" onclick="previewVideo('urlVideo1','iframeVideo1','galeriaVideo1');" value="Prever Vídeo"> </button>
                            <input type='button' class='retirarVideos' id="retirarVideo1" onclick="retirarVideo('video1','galeriaVideo1');" value="Retirar Vídeo"> </button>
                            </div>
                            <div id="opcoesVideo2">
                            <input type="text" name="urlVideo2" id="urlVideo2" class='txtUrlVideos' placeholder="DIGITE A URL DO VIDEO">
                            <input type='button' class='previewVideos' id="preverVideo2" onclick="previewVideo('urlVideo2','iframeVideo2','galeriaVideo2');" value="Prever Video"> </button>
                            <input type='button' class='retirarVideos' id="retirarVideo2" onclick="retirarVideo('video2','galeriaVideo2');" value="Retirar Vídeo"> </button>
                            </div>
                            <div id="video1" style="display:none">
                                <iframe width="425" id="iframeVideo1" height="300" src="" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div id="video2" style="display:none">
                                <iframe width="425" id="iframeVideo2" height="300" src="" frameborder="0" allowfullscreen></iframe>     
                            </div>
                        </div>
                        <div id="urlMateria">
                           <input type="text" name="url_materia" class='txtUrlMateria' id="urlMaterias" placeholder="DIGITE A URL DA MATÉRIA">
                        </div>
                        <div id="postarMateria">
                            <input type="submit" value="Postar Matéria" name="postarMateria" class="inserirMateria">
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
