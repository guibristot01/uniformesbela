<?php
session_start();

if(!isset($_SESSION['log'])){
	header('location: index.php');
  session_destroy();
}

if(isset($_GET['deslogar'])){
  session_destroy();
  header('location: login.php');
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
 <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
 <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
 <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
 <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
 <link rel="stylesheet" type="text/css" href="styles/responsive.css">

 </head>

 <body>

 <div class="super_container">

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

 	<div class="fs_menu_overlay"></div>
 	<div class="hamburger_menu">
 		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
 		<div class="hamburger_menu_content text-right">
 			<ul class="menu_top_nav">
 				<li class="menu_item has-children">
 					<a href="#">
 						My Account
 						<i class="fa fa-angle-down"></i>
 					</a>
 					<ul class="menu_selection">
 						<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
 						<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
 					</ul>
 				</li>
 				<li class="menu_item"><a href="#">início</a></li>
 				<li class="menu_item"><a href="#">loja</a></li>
 				<li class="menu_item"><a href="#">contato</a></li>
 			</ul>
 		</div>
 	</div>

 	<!-- Slider -->

 	<div class="main_slider" style="background-image:url(images/slider_1.png)">
 		<div class="container fill_height">
 			<div class="row align-items-center fill_height">
 				<div class="col">
 					<div class="main_slider_content">
 						<h6> aproveite</h6>
 						<h1>IFC UNIFORMES</h1>
 						<div class="red_button shop_now_button"><a href="#">compre agora</a></div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 	<!-- Banner -->

 	<div class="banner">
 		<div class="container">
 			<div class="row">
 				<div class="col-md-4">
 					<div class="banner_item align-items-center" style="background-image:url(images/banner_1.jpg)">
 						<div class="banner_category">
 							<a href="categories.html">E. Médio</a>
 						</div>
 					</div>
 				</div>
 				<div class="col-md-4">
 					<div class="banner_item align-items-center" style="background-image:url(images/banner_2.jpg)">
 						<div class="banner_category">
 							<a href="categories.html">Superior</a>
 						</div>
 					</div>
 				</div>
 				<div class="col-md-4">
 					<div class="banner_item align-items-center" style="background-image:url(images/banner_3.jpg)">
 						<div class="banner_category">
 							<a href="categories.html">Professores</a>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 	<!-- Best Sellers -->

 	<div class="best_sellers">
 		<div class="container">
 			<div class="row">
 				<div class="col text-center">
 					<div class="section_title new_arrivals_title">
 						<h2>Sobre a Bela</h2>

 						<p class="texto1">
A Bela, ou melhor, Maria Isabel Pereira Farias é dona da empresa que fornece uniformes de diversos tamanhos e cores, para todos os cursos do Instituto Federal Catarinense - Campus Avançado Sombrio. Faz esta função desde 2016 no campus, ja tendo recebido diversos alunos de todas as turmas ao longo desses anos.

 						</p>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>


 	<div class="best_sellers">
 		<div class="container">
 			<div class="row">
 				<div class="col text-center">
 					<div class="section_title new_arrivals_title">
 						<h2>Album de imagens</h2>

 						<p class="texto1">
Aqui será colocado uma grade de fotos dos uniformes e um album com todas as fotos do sistema.

 						</p>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>



 	<!-- Benefit -->

 	<div class="benefit">
 		<div class="container">
 			<div class="row benefit_row">
 				<div class="col-lg-3 benefit_col">
 					<div class="benefit_item d-flex flex-row align-items-center">
 						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
 						<div class="benefit_content">
 							<h6>Facil retirada</h6>
 							<p>Retire o uniforme facilmente</p>
 						</div>
 					</div>
 				</div>
 				<div class="col-lg-3 benefit_col">
 					<div class="benefit_item d-flex flex-row align-items-center">
 						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
 						<div class="benefit_content">
 							<h6>Acessivel para todos</h6>
 							<p>Acessibilidade para todos os clientes</p>
 						</div>
 					</div>
 				</div>
 				<div class="col-lg-3 benefit_col">
 					<div class="benefit_item d-flex flex-row align-items-center">
 						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
 						<div class="benefit_content">
 							<h6>Rapidez</h6>
 							<p>Não demora muito para ficar pronto</p>
 						</div>
 					</div>
 				</div>
 				<div class="col-lg-3 benefit_col">
 					<div class="benefit_item d-flex flex-row align-items-center">
 						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
 						<div class="benefit_content">
 							<h6>Presente a semana toda</h6>
 							<p>08:00 - 17:30</p>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
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

 </body>

 </html>
