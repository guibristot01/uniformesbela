<?php
session_start();

include("C:/wamp64/www/Colo Shop/cadastro/php/conexao.php");

if(isset($_POST['login'])){

$email = $_POST['email'];
$senha = $_POST['senha'];

$query1 = $mysqli->query("SELECT * FROM usuario where email = '{$email}' and senha = '{$senha}'") ;
$linhas = mysqli_num_rows($query1);

$cod= $linhas['cod'];

if($email == "admin@adi.min" and $senha == "admin"){
	$_SESSION['logad'] = true;
	header('Location: http://localhost/Colo%20Shop/admin.php');

} else{
					if($linhas > 0){
						$_SESSION['codusuario'] = $cod;
						$_SESSION['log'] = true;
						$_SESSION['email'] = $email;
						$_SESSION['senha'] = $senha;
							header('location: http://localhost/Colo%20Shop/site.php');


						}else{
								echo "<script>alert('Este usuário não existe!'); history.back();</script>";
						}
					}
				}

?>
