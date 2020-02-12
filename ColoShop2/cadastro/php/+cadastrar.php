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
						echo "<script>alert('A imagem é muito grande'); history.back();</script>";
					}else{
						if($size > 10000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}

					else{

					move_uploaded_file($_FILES["imagem"]["tmp_name"],"upload/" . $_FILES["imagem"]["name"]);

$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$data = $_POST['data'];
$fone = $_POST['fone'];
$cpf = $_POST['cpf'];
$curso = $_POST['curso'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$local = $_FILES["imagem"]["name"];

		$query1 = $mysqli->query("SELECT * FROM usuario where cpf = '{$cpf}'") ;
		$linhas = mysqli_num_rows($query1);

					if($linhas == 1){
							echo "<script>alert('Este cpf já pertence a alguém!'); history.back();</script>";
						}else{
							$sql = mysqli_query($mysqli, "INSERT INTO usuario(nome, email, senha, datanac, fone, cpf, curso, cidade, rua, numerores, local) VALUES ('$nome','$email','$senha','$data','$fone','$cpf','$curso','$cidade','$rua','$numero','$local')");
							echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
							echo "<meta http-equiv='refresh' content='0, url=http://localhost/Colo%20Shop/login.php'>";

						}
						if(isset($_SESSION['cad'])){
							session_destroy();
						}
					}
				}
			}


?>
