<?php
session_start();

if(!isset($_SESSION['cad'])){
	header('location: cadastrar.php');
	die();
}
 ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="cadastro/css/styles.css"/>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="side">

        </div>
        <div class="container2">
            <header>
                Informe mais sobre você
            </header>
            <section class="register">
                <form class="form" action="cadastro/php/+cadastrar.php" method="POST" enctype="multipart/form-data">
                    <div class="field">
                        <h2>Nome Completo</h2>
                        <input value="<?php echo $_SESSION['nome'];  ?>" readonly class="input" id="nome" type="text" required name="nome">
                    </div>
                    <div class="field">
                        <h2>Data de Nascimento *</h2>
                        <input class="input" id="data" type="date" required name="data">
                    </div>
                    <div class="field">
                        <h2>Telefone *</h2>
                        <input class="input" id="fone" type="text" required name="fone">
                    </div>
                    <div class="field">
                        <h2>CPF *</h2>
                        <input class="input" id="cpf" type="text" required name="cpf">
                    </div>
                    <div class="field">
                        <h2>Curso</h2>
                        <input class="input" id="curso" type="text" name="curso">
                    </div>
                    <div class="field">
                        <h2>Cidade *</h2>
                        <input class="input" id="cidade" type="text" required name="cidade">
                    </div>
                    <div class="field">
                        <h2>Rua *</h2>
                        <input class="input" id="rua" type="text" required name="rua">
                    </div>
                    <div class="field">
                        <h2>Número residencial *</h2>
                        <input class="input" id="numero" type="text" required name="numero">
                    </div>
                    <div class="field">
                        <h2>E-mail</h2>
                        <input value="<?php echo $_SESSION['email'];  ?>" readonly class="input" id="email" type="email" name="email">
                    </div>
										<div class="field">
										<h2>Imagem *</h2>
										<input type="file" id="imagem" name="imagem" required >
										</div>

                    <div class="form_footer">

                        <input id="submit" type="submit" value="Enviar">
                    </div>
                </form>
            </section>
        </div>
    </div>
</body>
</html>
