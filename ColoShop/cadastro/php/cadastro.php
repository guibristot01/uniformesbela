<?php
session_start();
include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha2 = $_POST['senha2'];




if ($senha == $senha2){
		$query1 = $mysqli->query("SELECT * FROM usuario where email = '{$email}'") ;
		$linhas = mysqli_num_rows($query1);
		if ( strlen( $senha ) < 6 ) {
		echo "<script>alert('tem menos de 6 digitos'); history.back();</script>";
		} else{
					if($linhas == 1){
							echo "<script>alert('Usuário já existe.'); history.back();</script>";
						}else{
							$_SESSION['cad'] = true;
							$_SESSION['nome'] = $nome;
							$_SESSION['email'] = $email;
							$_SESSION['senha'] = $senha;
							header('location: http://localhost/Colo%20Shop/+cadastro.php');
						}
					}
					} else{
							echo "<script>alert('as senhas não coinscidem'); history.back();</script>";
					}
?>
