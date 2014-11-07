<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/funcoes.js"> </script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/cycle.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
               $('#slide').before('<img id="controleGaleria">').cycle({
                   fx: 'scrollHorz',
                   pause: true,
                   timeout: 6000,
                   next: '#next',
                   prev: '#prev'
               }); 
            });           
            
            onload = function(){
                document.getElementById("nav").style.backgroundColor = "#F39200";
                document.getElementById("search").style.backgroundColor = "#F39200";
                document.getElementById("logar").style.borderBottom = "solid 5px #F39200";
                var imgLogo = document.getElementById("img-logo");
                imgLogo.innerHTML = '<img src="imagens/logo006.png" alt="LogoImagem" id="logo">';
            };
        </script>       
        <title></title>
    </head>
    <body>
        <section id="container">
            <?php
                include_once 'conexao/conecta.inc';
                include_once 'includes/funcoesUteis.inc';
                session_start();
            ?>
            <header id="cabecalho"  ondragstart="return false">
                <?php
                include_once 'includes/menu.php';
                ?>
                <div id="logar">
                    <?php
                        VerificaSessao('');
                    ?>                    
                </div>
            </header>
            <article id="conteudo">
                <div id="galeria">  
                    <div id="botoesGaleria">
                        <a href="#" id="prev"> <img src="imagens/previous.png" alt=""> </a>
                        <a href="#" id="next"> <img src="imagens/next.png" alt=""> </a>
                    </div>
                    <div id="slide">
                        <?php
                             buscarMateriasSlidePC();
                        ?>    
                    </div>                
                </div>
                <div id="voltarTopo">
                    <a href="" class="subir">
                        <img src="imagens/topo.png" alt="">
                        <p> Voltar ao topo </p>
                    </a>                    
                </div>
            </article>
            <footer id="footer">
                <?php
                    include_once 'includes/rodape.php';
                ?>
            </footer>            
        </section>
    </body>
</html>