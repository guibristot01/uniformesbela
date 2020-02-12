<?php
session_start();

if(isset($_SESSION['log'])){
	header('location: site.php');
	die();
}
if(isset($_SESSION['logad'])){
	header('location: admin.php');
	die();
}
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
</head>
<body>
<form action="login/php/logar.php" method="POST">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Login Usuário
					</span>

					<div class="wrap-input100">
						<input class="input100" type="email" required name="email" id="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" required name="senha" id="senha" placeholder="Senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div>
						<button class="mostrarsenha" type="button" onclick="mostrasenha()"><i class="fa fa-eye"></i></button>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							<input type="submit" value="login" id="login" name="login">
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Esqueceu
						</span>
						<a class="txt3" href="#">
							E-mail / Senha?
						</a>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="cadastrar.php">
							Crie sua conta!
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>




	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="login/vendor/select2/select2.min.js"></script>
	<script src="login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})

		function mostrasenha(){
			var tipo = document.getElementById("senha");
			if(tipo.type == "password"){
				tipo.type = "text";

			} else{
				tipo.type = "password";
			}
		}
	</script>
	<script src="login/js/main.js"></script>

</body>
</html>
