<?php
$host = "127.0.0.1";
$usuario = "root";
$senha = "01guilherme2003brst";
$bd = "cadastro";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno)
  echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

?>
