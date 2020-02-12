<?php
session_start();


if(!isset($_SESSION['log'])){
	header('location: index.php');
  session_destroy();
}

if(isset($_GET['deslogar'])){
  session_destroy();
  header('location: index.php');
}


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 <title>Colo Shop</title>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="description" content="Colo Shop Template">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="styles/mui/css/mui.min.css">
 <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
 <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
 <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
 <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
 <link rel="stylesheet" type="text/css" href="styles/perfilcss.css">
 <link rel="stylesheet" type="text/css" href="styles/responsive.css">


 </head>

 <body>

 <div class="super_container">
<?php include('cadastro/php/conexao.php'); ?>
  <!-- Header -->

  <header class="header trans_300">

 	 <!-- Top Navigation -->



 	 <!-- Main Navigation -->

 	 <div class="main_nav_container">
 		 <div class="container">
 			 <div class="row">
 				 <div class="col-lg-12 text-right">
 					 <div class="logo_container">
 						 <a href="#">BELA<span>Uniformes</span></a>
 					 </div>
 					 <nav class="navbar">
 						 <ul class="navbar_menu">
 							 <li><a href="site.php">início</a></li>
 							 <li><a href="produtosgrid.php">loja</a></li>
 							 <li><a href="contatos.php">contato</a></li>
 						 </ul>
 						 <ul class="dropdown navbar_user">
 							 <li><a data-toggle="dropdown" href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
 							 <div class="dropdown-menu dropdown-menu-right">
 								 <a class="dropdown-item" href="perfil.php">Perfil</a>
 								 <a class="dropdown-item" href="?deslogar">Sair</a>
 							 </div>
 						 </li>

						 <div id="myNav" class="overlay">
						 	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
						 		<h5 id="carrinho"> CARRINHO </h5>
						 	<div class="overlay-content">
						 		<ul class="header-cart-wrapitem w-full">
						 		<?php
						 		include('cadastro/php/conexao.php');
						 		$query1 = $mysqli->query("SELECT * FROM usuario") or die (mysqli_error());

						 		while ($linhas = mysqli_fetch_array($query1)) {
						 			if($_SESSION['email'] == $linhas['email']){
						 			$codcliente = $linhas['cod'];
						 		}
						 		}

						 		$query1 = $mysqli->query("SELECT * FROM pedido where usuario = '{$codcliente}'");
						 		while ($linhas = mysqli_fetch_array($query1)){
						 			$codp = $linhas['produtopedido'];
						 $query3 = $mysqli->query("SELECT * FROM produtopedido where cod = '{$codp}'");
						 while ($linhas3 = mysqli_fetch_array($query3)){ ?>

						 <div class="header-cart-item-img">
						 <img src="cadastro/php/upload/<?php echo $linhas3['imagem']?>" alt="IMG">
						 </div>
						 <div class="text">
						 <p> Nome: <?php echo $linhas3['nome']?>   </br>Cor: <?php echo $linhas3['cor']?> </br> Tamanho: <?php echo $linhas3['tamanho']?> </br> Curso: <?php echo $linhas3['cursos']?> </br> Quantidade: <?php echo $linhas['quantidade']?> </br>Status: Em produção</p>
						 <?php $total = $linhas['quantidade'] * $linhas3['preco']?>
						 <p> Preço Total: R$<?php echo $total?></p>
						 </div>
						 </br></br></br>

						 <?php
						 		}
						 	}
						 ?>
						 </ul>
						 	</div>
						 </div>
 							 <li class="checkout">
 									 <span style="cursor:pointer" onclick="openNav()"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
 								
 							 </li>

 						 </ul>

 						 <div class="hamburger_container">
 							 <i class="fa fa-bars" aria-hidden="true"></i>
 						 </div>
 					 </nav>
 				 </div>
 			 </div>
 		 </div>
 	 </div>

  </header>


 	<!-- em duvida !-->



  <div id="perfil">
		<?php
		$query1 = $mysqli->query("SELECT * FROM usuario") or die (mysqli_error());

		while ($linhas = mysqli_fetch_array($query1)) {
			if($_SESSION['email'] == $linhas['email']){
			$_SESSION['nome'] = $linhas['nome'];
			$_SESSION['data'] = $linhas['datanac'];
			$_SESSION['fone'] = $linhas['fone'];
			$_SESSION['cpf'] = $linhas['cpf'];
			$_SESSION['curso'] = $linhas['curso'];
			$_SESSION['cidade'] = $linhas['cidade'];
			$_SESSION['rua'] = $linhas['rua'];
			$_SESSION['numerores'] = $linhas['numerores'];
			$_SESSION['local'] = $linhas['local'];
			}
		}
		 ?>

  	<!-- Capa do Perfil -->
  	<div class="header2">
  		<!-- Botão "Alterar Fundo" -->

  	</div>

  	<!-- Avatar do Utilizador -->
  	<div class="avatar">
		<img src="cadastro/php/upload/<?php echo $_SESSION['local'];?>">

  	</div>

  	<!-- Opções de Conta -->
  	<div class="opperfil">
  		<center>
  			<!-- Botão "Editar Perfil" -->

  		</center>
  	</div>

  	<!-- Título do Perfil -->
  	<div class="tituloperfil">
  		<!-- Nome do Utilizador -->
  		<h1><?php echo $_SESSION['nome'];?></h1>

  	</div><br/>


<nav id="register">
  			<h1 class="title-2">Altere Suas Informações</h1>

        <section class="register">
            <form class="form" action="cadastro/php/editar.php" method="POST" enctype="multipart/form-data">
                <div class="field">
                    <h2>Nome Completo</h2>
                    <input value="<?php echo $_SESSION['nome'];?>" class="input" id="nome" type="text" required name="nome">
                </div>
                <div class="field">
                    <h2>Data de Nascimento *</h2>
                    <input value="<?php echo $_SESSION['data'];?>" class="input" id="data" type="date" required name="data">
                </div>
                <div class="field">
                    <h2>Telefone *</h2>
                    <input value="<?php echo $_SESSION['fone'];?>" class="input" id="fone" type="text" required name="fone">
                </div>
                <div class="field">
                    <h2>CPF *</h2>
                    <input value="<?php echo $_SESSION['cpf'];?>" readonly class="input" id="cpf" type="text" required name="cpf">
                </div>
                <div class="field">
                    <h2>Curso</h2>
                    <input value="<?php echo $_SESSION['curso'];?>" class="input" id="curso" type="text" name="curso">
                </div>
                <div class="field">
                    <h2>Cidade *</h2>
                    <input value="<?php echo $_SESSION['cidade'];?>" class="input" id="cidade" type="text" required name="cidade">
                </div>
                <div class="field">
                    <h2>Rua *</h2>
                    <input value="<?php echo $_SESSION['rua'];?>" class="input" id="rua" type="text" required name="rua">
                </div>
                <div class="field">
                    <h2>Número residencial *</h2>
                    <input value="<?php echo $_SESSION['numerores'];?>" class="input" id="numero" type="text" required name="numero">
                </div>
                <div class="field">
                    <h2>E-mail</h2>
                    <input value="<?php echo $_SESSION['email'];?>" readonly value="" readonly class="input" id="email" type="email" name="email">
                </div>
								<div class="field">
								<h2>Imagem *</h2>
								<input value="cadastro/php/upload/<?php echo $_SESSION['local'];?>"type="file" id="imagem" name="imagem" required >
								</div>
          <div class="row form_footer">
              <input id="submit" type="submit" name="enviar" value="Enviar">
          </div>
					<div class="row form_footer">
							<input id="submit" type="submit" name="excluir" value="Excluir">
					</div>
  		</form>
  	</section>
  </nav>

  	<br/><br/>

  </div>

   	<!-- Footer -->

   	<footer class="footer">
   		<div class="container">
   			<div class="row">
   				<div class="col-lg-6">
   					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
   						<ul class="footer_nav">
								<li><a href="#">FAQs</a></li>
								<li><a href="contact.html">Contact us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
							<ul>

								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="footer_nav_container">
							<div class="cr">©2019 All Rights Reserverd.</div>
   					</div>
   				</div>
   			</div>
   		</div>
   	</footer>

   </div>

   <script src="js/jquery-3.2.1.min.js"></script>
   <script src="styles/bootstrap4/popper.js"></script>
   <script src="styles/bootstrap4/bootstrap.min.js"></script>
   <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
   <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
   <script src="plugins/easing/easing.js"></script>
   <script src="js/custom.js"></script>
  <script>

  		$('.js-addcart-detail').each(function(){
  			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
  			$(this).on('click', function(){
  				swal(nameProduct, "is added to cart !", "success");
  			});
  		});

  	</script>

  	<script>
  	function openNav() {
  	  document.getElementById("myNav").style.width = "450px";
  	}

  	function closeNav() {
  	  document.getElementById("myNav").style.width = "0%";
  	}
  	</script>

    <script src='https://cdn.muicss.com/mui-0.9.17/js/mui.min.js'></script>

   </body>

   </html>
