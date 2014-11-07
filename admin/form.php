<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
         <link rel="stylesheet" type="text/css" href="css/style2.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
<?php
include '../includes/funcoesUteis.inc';

switch (get_post_action('Reativar')) {
case 'Reativar';
        //Inicio
        validaAutenticacao('../index.php', '1');
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $data = $_POST['dataNasc'];
                    $code = $_POST['cod_user'];
                    $motivo = $_POST['motivo'];
                    function salvaLog($mensagem,$name,$data,$code,$motivo,$email) {
                    $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
                    $hora = date('Y-m-d H:i:s'); // Salva a hora atual (formato MySQL)
                    $acao = "reativarUsuario";
                    $dia = date('Y-m-d');
                    $sql = "INSERT INTO LOG(COD_LOG, IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG)
                        VALUES(".$_SESSION['code'].",'$ip','$dia', '$hora', '$mensagem', '$acao','$email')";
                    mysql_query($sql);
                    $sql2 = "UPDATE USUARIO SET TIPO_USUARIO = 2, USUARIO_DESATIVADO = null WHERE COD_USUARIO = $code";
                    mysql_query($sql2);
                    $query = "DELETE FROM DESATIVADOS WHERE COD_DESATIVADO = $code";
                    mysql_query($query);

                    echo "$mensagem às <b>$hora</b> do dia <b>$dia</b>";
                    }
                    echo "<meta charset=utf-8>";
                    $mensagem = "Usuário $name Reativado";
                    salvaLog($mensagem,$name,$data,$code,$motivo,$email);
        //Fim
            //Fim
            break;
    default:
       echo "Nenhuma Função Definida";
}
?>
    </body>
</html>