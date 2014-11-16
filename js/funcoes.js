function loginE(){
    document.getElementById('msglogin').innerHTML = "<h3 class='msgloginE'>Login Efetuado</h3>";
    setTimeout("window.location.href ='index.php'",3000);
}
function loginF(){
    document.getElementById('msglogin').innerHTML = "<h3 class='msgloginF'>Senha Inválida</h3>";
}
function loginF2(){
    document.getElementById('msglogin').innerHTML = "<h3 class='msgloginF'>Usuário Inválido</h3>";
}
function loginF3(){
    document.getElementById('msglogin').innerHTML = "<h3 class='msgloginF'>Usuário Desativado</h3>";
}
function loginF4(){
    document.getElementById('msglogin').innerHTML = "<h3 class='msgloginF'>Usuário Não Encontrado</h3>";
}
function cadastroF(){
    document.getElementById('msgCad').innerHTML = "<h3 class='msgloginF'>Captcha Incorreto</h3>";
}
function cadastroF2(){
    document.getElementById('msgCad').innerHTML = "<h3 class='msgloginF'>E-mail ou Senha nao conferem</h3>";
}
function cadastroF3(){
    document.getElementById('msgCad').innerHTML = "<h3 class='msgloginF'>Campo de E-mail não Definidos</h3>";
}
function cadastroF4(){
    document.getElementById('msgCad').innerHTML = "<h3 class='msgloginF'>E-mail Inválido</h3>";
}
function cadastroF5(){
    document.getElementById('msgCad').innerHTML = "<h3 class='msgloginF'>E-mail já Cadastrado</h3>";
}
function cadastroE(){
    document.getElementById('msgCadastro2').innerHTML = '<div id="msgCadastro">'+
                    '<p> Cadastro realizado com sucesso. </p>'+
                '</div>';
}

 function mostraOculta2(opc, id){  
     var textbox = document.getElementById(id); 
     if(id=='categorias'){
                        document.getElementById("imgPrincipal").style.backgroundColor = "#00989E";
                        document.getElementById("tituloMateria").style.backgroundColor = "#00989E";               
                        document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#26C8D1";
     }

                if(document.getElementById(opc).checked){

                        if(textbox.style.display == 'none'){  
                           textbox.style.display = 'inline';  
                           document.getElementById("imgPrincipal").style.marginTop = "460px";
                                            }  
                    }else {  
                        textbox.style.display = 'none'; 

                    }                  
                }                 
                function ocultar(id,tipo){
                    document.getElementById(id).style.display = 'none';
                    document.getElementById("imgPrincipal").style.marginTop = "390px";
                    if(tipo=='nintendo'){
                        document.getElementById("imgPrincipal").style.backgroundColor = "#009FE3";
                        document.getElementById("tituloMateria").style.backgroundColor = "#009FE3";               
                        document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#CEECF5";
                    }
                    if(tipo=='ps'){
                        document.getElementById("imgPrincipal").style.backgroundColor = "#9C1006";
                        document.getElementById("tituloMateria").style.backgroundColor = "#9C1006";               
                        document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#FCC6C0";
                    }
                    if(tipo=='pc'){
                        document.getElementById("imgPrincipal").style.backgroundColor = "#F39200";
                        document.getElementById("tituloMateria").style.backgroundColor = "#F39200";               
                        document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#F7D47F";
                    }
                    if(tipo=='xbox'){
                        document.getElementById("imgPrincipal").style.backgroundColor = "#8EA50D";
                        document.getElementById("tituloMateria").style.backgroundColor = "#8EA50D";               
                        document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#A9F5D0";
                    }

                }