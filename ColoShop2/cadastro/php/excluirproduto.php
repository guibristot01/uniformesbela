<?php
session_start();
include("conexao.php");


$codif = $_POST['excluir'];

if (isset($_POST['excluir'])) {
		$sql = mysqli_query($mysqli, "DELETE FROM `cadastro`.`produtos` WHERE (`cod` = '$codif');");
		echo "<script>alert('Deletado com sucesso'); history.back();</script>";
	}


?>