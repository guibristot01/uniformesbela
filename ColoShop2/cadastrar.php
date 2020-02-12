<?php
session_start();

if(isset($_SESSION['cad'])){
	header('location: +cadastro.php');
	die();
}

 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="cadastro/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="cadastro/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="cadastro/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="cadastro/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="cadastro/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="cadastro/css/util.css">
	<link rel="stylesheet" type="text/css" href="cadastro/css/main.css">
</head>
<body>

<form action="cadastro/php/cadastro.php" method="POST">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Cadastro Usuário

					</span>
					<div class="wrap-input100">
						<input required name="nome" class="input100" type="text" maxlenght="6" id="nome" placeholder="Nome">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

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

					<div class="wrap-input100">
						<input class="input100" type="password" required name="senha2" id="senha2" placeholder="Confirme a senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="login.php">
							Já está cadastrado?
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>




	<script src="cadastro/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="cadastro/vendor/bootstrap/js/popper.js"></script>
	<script src="cadastro/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="cadastro/vendor/select2/select2.min.js"></script>
	<script src="cadastro/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="cadastro/js/main.js"></script>

</body>
</html>
