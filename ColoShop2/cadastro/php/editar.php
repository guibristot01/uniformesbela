<?php
session_start();
include("conexao.php");

if (!isset($_FILES['imagem']['tmp_name'])) {
			echo "";
			}else{
			$file=$_FILES['imagem']['tmp_name'];
			//$_FILES é uma variavel global
			$image = $_FILES["imagem"] ["name"];
			$image_name= addslashes($_FILES['imagem']['name']);
			//addslashes adiciona barra invertira no texto
			$size = $_FILES["imagem"] ["size"];
			$error = $_FILES["imagem"] ["error"];

			if ($error > 0){
						die("Error uploading file! Code $error.");
					}else{
						if($size > 10000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}

					else{

					move_uploaded_file($_FILES["imagem"]["tmp_name"],"upload/" . $_FILES["imagem"]["name"]);

$query1 = $mysqli->query("SELECT * FROM usuario") or die (mysqli_error());
$query2 = $mysqli->query("SELECT * FROM pedido") or die (mysqli_error());

while ($linhas = mysqli_fetch_array($query1)) {
	if($_SESSION['email'] == $linhas['email']){
	$cod = $linhas['cod'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_SESSION['senha'];
	$data = $_POST['data'];
	$fone = $_POST['fone'];
	$cpf = $_POST['cpf'];
	$curso = $_POST['curso'];
	$cidade = $_POST['cidade'];
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	$local = $_FILES["imagem"]["name"];
	}
}

if (isset($_POST['enviar'])) {

	$sql = mysqli_query($mysqli, "UPDATE usuario SET nome = '$nome', email = '$email', senha = '$senha', datanac = '$data', fone = '$fone', cpf = '$cpf', curso = '$curso', cidade = '$cidade', rua = '$rua', numerores = '$numero', local = '$local' WHERE usuario.cod = '$cod'");

echo "<script>alert('enviar!');</script>";
	}
	}
	}

	 }
	 if (isset($_POST['excluir'])) {
$sql = mysqli_query($mysqli, "DELETE FROM pedido WHERE pedido.usuario = '$cod'");	
		 $sql = mysqli_query($mysqli, "DELETE FROM usuario WHERE usuario.cod = '$cod'");
		 session_destroy();
			 echo "<script>alert('excluir!');</script>";
	 }


?>
