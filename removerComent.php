<?php
include 'includes/funcoesUteis.inc';
include 'conexao/conecta.inc';
session_start();
$codigo = $_POST['codigoComent'];
$sql = "DELETE FROM COMENT WHERE COD_COMENT = $codigo";
mysql_query($sql);
