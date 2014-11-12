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