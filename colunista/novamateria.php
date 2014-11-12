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
                imgMiniLogo.innerHTML = "<img src='../imagens/logosReduzidos001.png' alt='' id='miniLogo'>";
                imgLogo.innerHTML = "<img src='../imagens/logo001.png' alt='' id='logo'>";  
                document.getElementById("nav").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";
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
                include_once '../includes/menuR.php';
                validaAutenticacao('../index.php','3');
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
                    <form action="inserirMateriaNova.php" method="post" enctype="multipart/form-data">
                        <figure id="imgCapaMateria">
                            <p> Selecione uma imagem de capa com dimensões 400x250 para esta área.</p>
                            <input type="file" name="imagemCapa" class="imgCapaMateria">
                        </figure>
                        <figure id="imgPrincipal">
                            <p> Selecione uma imagem com dimensões 400x250 para esta área.</p>
                            <input type="file" name="imagemCapa" class="imgPrincipal">
                        </figure>
                        <div id="tituloMateria">
                            <input type="text" name="titulo" class="textos_materia" id="titulo_materia" placeholder="Digite aqui o título da Matéria">
                        </div>                       
                              
                        <div id="conteudoMateria">
                            
                        </div>
                        <div id="galeriaImagens">
                            <figure class="imagensGaleria" >
                               
                            </figure>
                            <figure class="imagensGaleria">
                                
                            </figure>
                            <figure class="imagensGaleria" >
                                
                            </figure>
                        </div>
                        <div id="conteudoMateria2">                    
                            
                        </div>
                        <div id="galeriaVideo">                    
                            <p class="ediConteudoMateria">
                            <?php
                                infoArtigos('conteudoMateria','pc/thesims4.php');
                            ?>
                            </p>
                        </div>
                        <div id="colunista">     
                            <figure id="autor_materia">
                            <?php
                                buscarImagemAutor('1');
                            ?>
                            </figure>
                            <div id="descricaoColunista"> 
                                <p>                     
                                    <?php
                                            buscarDescAutor('1');
                                    ?> 
                                </p>
                            </div>                           
                    </form> 
                        <table id="tabelaPerfil" class="tableInserirMateria">  
                            <tr>
                                <td class="icone"><img src="../imagens/genero.png" alt="imgSerie" > </td>
                                <td class="texto"> Série </td>
                                <td class="campos"> <input type="text" name="serie" class="textos_materia" id="serie_materia"></td>
                            </tr>
                            
                            <tr>
                                <td class="icone"><img src="../imagens/pencil.png" alt="imgDescrição" class="editImgPencil"> </td>
                                <td class="texto"> Descrição </td>
                                <td class="campos"> <textarea name="descricao" class="descricao_materia"></textarea></td>
                            </tr> 
                            <tr>
                                <td class="icone"><img src="../imagens/data.png" alt="imgDescrição" class="editImgPencil"> </td>
                                <td class="texto"> Data de Lançamento </td>
                                <td class="campos"> <input type="text" name="data_lancamento" class="textos_materia" ></td>
                            </tr>
                            <tr>
                                <td class="icone"><img src="../imagens/pencil.png" alt="imgSerie" class="editImgPencil"> </td>
                                <td class="texto"> Título Conteúdo </td>
                                <td class="campos"> <input type="text" name="titulo_conteudo" class="textos_materia" id="titulo_conteudo_materia" maxlength="100"></td>
                            </tr>
                            <tr>
                                <td class="icone"><img src="../imagens/pencil.png" alt="imgDescrição" class="editImgPencil"> </td>
                                <td class="texto"> Conteúdo </td>
                                <td class="campos"> <textarea name="conteudo" class="conteudo_materia" maxlength="150"></textarea></td>
                            </tr>
                            <tr>
                                <td class="icone"><img src="../imagens/pencil.png" alt="imgDescrição" class="editImgPencil"> </td>
                                <td class="texto"> Conteúdo 2 </td>
                                <td class="campos"> <textarea name="conteudo2" class="conteudo_materia" maxlength="150"></textarea></td>
                            </tr>
                            <tr>
                                <td class="icone"><img src="../imagens/pencil.png" alt="imgDescrição" class="editImgPencil"> </td>
                                <td class="texto"> URL Matéria </td>
                                <td class="campos"> <input type="text" name="url_materia" class="textos_materia" ></td>
                            </tr>
                            <tr>
                                <td class="icone"><img src="../imagens/picture.png" alt="imgImagem" > </td>
                                <td class="texto"> Imagem Galeria </td>
                                <td class="campos"> <input type="file" name="imagemGaleria"></td>
                            </tr>
                            <tr>
                                <td class="icone"><img src="../imagens/picture.png" alt="imgImagem" > </td>
                                <td class="texto"> Imagem2 Galeria </td>
                                <td class="campos"> <input type="file" name="imagemGaleria2"></td>
                            </tr>
                            <tr>
                                <td class="icone"><img src="../imagens/picture.png" alt="imgImagem" > </td>
                                <td class="texto"> Imagem3 Galeria </td>
                                <td class="campos"> <input type="file" name="imagemGaleria3"></td>
                            </tr>
                            <tr>
                                <td class="icone"colspan="2"><img src="../imagens/save.png" alt="imgImagem" > </td>
                                <td class="texto" ><input type="submit" value="Postar Matéria" name="postarMateria" class="designButton"> </td>
                            </tr>
                        </table>   
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