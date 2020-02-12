<?php
session_start();
include("conexao.php");

$codifi = $_POST['excluir2'];

if (isset($_POST['excluir2'])) {
		$sql = mysqli_query($mysqli, "DELETE FROM `cadastro`.`usuario` WHERE (`cod` = '$codifi');");
		echo "<script>alert('Deletado com sucesso'); history.back();</script>";
	}

?>