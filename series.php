<!DOCTYPE html>
<html>
    <head> 
        <title> Multiplayer </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <link rel="shortcut icon" href="imagens/icone001.png" >
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/cycle.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <script type="text/javascript">             
            onload = function(){
                document.getElementById("nav").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";                  
                document.getElementById("tituloPagina").style.backgroundColor = "#00989E";
                var imgMiniLogo = document.getElementById("imgMiniLogo");
                var imgLogo = document.getElementById("img-logo");                
                imgMiniLogo.innerHTML = '<img src="imagens/logosReduzidos001.png" alt="" id="miniLogo">';
                imgLogo.innerHTML = '<img src="imagens/logo001.png" alt="" id="logo">';
            };             
        </script>        
    </head> 
    <body> 
        <container id="container">
            <header id="header" ondragstart='return false'>
                <?php
                    include_once 'includes/menu.php';
                ?>
                <div id="logar">
                    <form action="#" method="post" id="login" onsubmit="return validaLogin(this);"> 
                        <img src="imagens/user.png" alt="" id="imgUsuario">
                        <label class="txtLogin"> Usuário: </label><input type="text" name="emailLogin"><br/><br/>
                        <label class="txtLogin"> Senha: </label><input type="password" name="senhaLogin"><br/><br/>
                        <input type="submit" value="Entrar" id="botaoLogin"/>
                        <a href="cadastro.php"> Cadastre-se </a>
                    </form>
                </div>                
                <div id="propaganda1">
                    <iframe src="http://www.brasilgameshow.com.br/publico/contador-horizontal.php" style="width: 544px; height: 100px; display: block; margin: 0 auto; border: none; overflow: hidden;"></iframe> 
                </div>
            </header>
            <article id="article"> 
                <div id="materias">                        
                        <h1 id="tituloPagina"> Séries </h1>
                        <div id="materiasPequenas">
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Mario </h3>
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Batman </h3> 
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Mortal Kombat </h3> 
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> God of War </h3> 
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> BioShock </h3>
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> The Sims </h3>
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a> 
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> The Legend of Zelda </h3>
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Pokémon </h3>
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Resident Evil </h3>  
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                        </div> 
                    </div>    
                    <aside id="aside">
                        <div id="materiasAside">
                            <div class="materiaAside">
                                <div id="descricaoMateriaAside"> 
                                    <p> Conheça o novo jogo Hyrule Legends, desenvolvido para a plataforma Wii U. </p>
                                </div>
                                <img src="imagens/galeria003.jpg" alt="" class="imagemMateriaAside">                            
                            </div>
                            <div class="materiaAside">
                                <div id="descricaoMateriaAside"> 
                                    <p> Conheça o novo jogo Hyrule Legends, desenvolvido para a plataforma Wii U. </p>
                                </div>
                                <img src="imagens/galeria003.jpg" alt="" class="imagemMateriaAside">                            
                            </div>
                            <div class="materiaAside">
                                <div id="descricaoMateriaAside"> 
                                    <p> Conheça o novo jogo Hyrule Legends, desenvolvido para a plataforma Wii U. </p>
                                </div>
                                <img src="imagens/galeria003.jpg" alt="" class="imagemMateriaAside">                            
                            </div>
                            <div class="materiaAside">
                                <div id="descricaoMateriaAside"> 
                                    <p> Conheça o novo jogo Hyrule Legends, desenvolvido para a plataforma Wii U. </p>
                                </div>
                                <img src="imagens/galeria003.jpg" alt="" class="imagemMateriaAside">                            
                            </div>
                            <div class="materiaAside">
                                <div id="descricaoMateriaAside"> 
                                    <p> Conheça o novo jogo Hyrule Legends, desenvolvido para a plataforma Wii U. </p>
                                </div>
                                <img src="imagens/galeria003.jpg" alt="" class="imagemMateriaAside">                            
                            </div>
                            <div class="materiaAside">
                                <div id="descricaoMateriaAside"> 
                                    <p> Conheça o novo jogo Hyrule Legends, desenvolvido para a plataforma Wii U. </p>
                                </div>
                                <img src="imagens/galeria003.jpg" alt="" class="imagemMateriaAside">                            
                            </div>
                            <div class="materiaAside" id="ultimaMateriaAside">
                                <div id="descricaoMateriaAside"> 
                                    <p> Conheça o novo jogo Hyrule Legends, desenvolvido para a plataforma Wii U. </p>
                                </div>
                                <img src="imagens/galeria003.jpg" alt="" class="imagemMateriaAside">                            
                            </div>
                        </div>    
                    </aside> 
                <div id="voltarTopo">
                    <a href="" class="subir">
                        <img src="imagens/topo.png" alt="">
                        <p> Voltar ao topo </p>
                    </a>                    
                </div>
            </article>
            <div id="imgFooter" ondragstart='return false'> 
                <img src="imagens/ideiaRodape.png" alt=""> 
            </div>
            <footer id="footer" ondragstart='return false'>
                <?php
                    include_once 'includes/rodape.php';
                ?>
            </footer>
        </container>
    </body>
</html>
