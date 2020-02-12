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
 <link rel="stylesheet" type="text/css" href="styles/compracss.css">
 <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
 <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
 <link rel="stylesheet" type="text/css" href="styles/responsive.css">

 </head>

 	<!-- Header -->
		<body>

		<div class="super_container">
		<form action="cadastro/php/produtopedido.php" method="POST" enctype="multipart/form-data">
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

<?php
include('cadastro/php/conexao.php');
if(isset($_POST['calca'])){
  $query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Calça'");
  $linhas = mysqli_num_rows($query1);

  if($linhas > 0){

    $query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Calça'") or die (mysqli_error());

    while ($linhas = mysqli_fetch_array($query1)) {

      $_SESSION['nomep'] = $linhas['nome'];
      $_SESSION['status'] = 'em espera';
      $_SESSION['pecap'] = $linhas['peca'];
      $_SESSION['precop'] = $linhas['preco'];
      $_SESSION['imagemp'] = $linhas['imagem'];
      ?>

    <div class="container3">
    <div class="grid second-nav">
      <div class="column-xs-12">
        <nav>
          <ol class="breadcrumb-list">
            <li class="breadcrumb-item"><a href="site.php">Início</a></li>
            <li class="breadcrumb-item"><a href="produtos.php">Produtos</a></li>
            <li class="breadcrumb-item active">Calça</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="grid product">
      <div class="column-xs-12 column-md-7">
        <div class="product-gallery">
          <div class="product-image">
            <img class="active" src="cadastro/php/upload/<?php echo $linhas['imagem'];?>">
          </div>
          <ul class="image-list">
            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem2'];?>"></li>
            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem3'];?>"></li>
            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem4'];?>"></li>
          </ul>
        </div>
      </div>
      <div class="column-xs-12 column-md-5">
        <h1><?php echo $linhas['nome'];?></h1>
        <h2>R$<?php echo $linhas['preco'];?></h2>
        <div class="description">
          <div class="row justify-content-center">
            <div class="col-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Selecione a cor</label>
                    <select name="cor" required class="form-control" id="exampleFormControlSelect1">
                     <option>Selecione</option>
                     <?php
                       $str = $linhas['cor'];
                       $oi = explode(",",$str);
                       $numero_palavras = str_word_count($str);
                       for($i = 0; $i < $numero_palavras; $i++) {
                        ?>
                        <option value="<?php echo $oi[$i]?>"><?php echo $oi[$i]?></option>
                        <?php

   										}
                       ?>
                    </select>
                </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Selecione o tamanho</label>
                    <select name="tamanho" required class="form-control" id="exampleFormControlSelect2">
                     <option>Selecione</option>
                     <?php
                       $str2 = $linhas['tamanho'];
                       $oi2 = explode(",",$str2);
                       $numero_palavras2 = str_word_count($str2);
                       for($i2 = 0; $i2 < $numero_palavras2; $i2++) {
                        ?>
                        <option value="<?php echo $oi2[$i2]?>"><?php echo $oi2[$i2]?></option>
                        <?php
					
   										}
                       ?>
                    </select>
                </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Selecione o curso</label>
                    <select name="curso" required class="form-control" id="exampleFormControlSelect3" required>
                     <option>Selecione</option>
                     <?php
                       $str3 = $linhas['cursos'];
                       $oi3 = explode(",",$str3);
                       $numero_palavras3 = str_word_count($str3);
                       for($i3 = 0; $i3 < $numero_palavras3; $i3++) {
                        ?>
                        <option value="<?php echo $oi3[$i3]?>"><?php echo $oi3[$i3]?></option>
                        <?php

   										}
                       ?>
                    </select>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Selecione a quantidade</label>
                    <select name="quantidade" required class="form-control" id="exampleFormControlSelect3">
                     <option value="1">Selecione</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                   </select>
               </div>
           </div>
         </div>
        </div>
        <button href="cadastro/php/produtopedido.php" id="submit" type="submit" name="addcarrinho" class="add-to-cart">Comprar</button>
      </div>
    </div>
      <?php
    }
    }else{
      echo "<script>alert('Esta categoria não existe!'); history.back();</script>";
    }
}else{
  if(isset($_POST['moletom'])){
		$query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Moletom'");
	  $linhas = mysqli_num_rows($query1);

	  if($linhas > 0){

	    $query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Moletom'") or die (mysqli_error());

	    while ($linhas = mysqli_fetch_array($query1)) {

	      $_SESSION['nomep'] = $linhas['nome'];
	      $_SESSION['status'] = 'em espera';
	      $_SESSION['pecap'] = $linhas['peca'];
	      $_SESSION['precop'] = $linhas['preco'];
	      $_SESSION['imagemp'] = $linhas['imagem'];
	      ?>

	    <div class="container3">
	    <div class="grid second-nav">
	      <div class="column-xs-12">
	        <nav>
	          <ol class="breadcrumb-list">
	            <li class="breadcrumb-item"><a href="site.php">Início</a></li>
	            <li class="breadcrumb-item"><a href="produtos.php">Produtos</a></li>
	            <li class="breadcrumb-item active">Moletom</li>
	          </ol>
	        </nav>
	      </div>
	    </div>
	    <div class="grid product">
	      <div class="column-xs-12 column-md-7">
	        <div class="product-gallery">
	          <div class="product-image">
	            <img class="active" src="cadastro/php/upload/<?php echo $linhas['imagem'];?>">
	          </div>
	          <ul class="image-list">
	            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem2'];?>"></li>
	            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem3'];?>"></li>
	            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem4'];?>"></li>
	          </ul>
	        </div>
	      </div>
	      <div class="column-xs-12 column-md-5">
	        <h1><?php echo $linhas['nome'];?></h1>
	        <h2>R$<?php echo $linhas['preco'];?></h2>
	        <div class="description">
	          <div class="row justify-content-center">
	            <div class="col-12">
	                <div class="form-group">
	                  <label for="exampleFormControlSelect1">Selecione a cor</label>
	                    <select name="cor" required class="form-control" id="exampleFormControlSelect1">
	                     <option>Selecione</option>
	                     <?php
	                       $str = $linhas['cor'];
	                       $oi = explode(",",$str);
	                       $numero_palavras = str_word_count($str);
	                       for($i = 0; $i < $numero_palavras; $i++) {
	                        ?>
	                        <option value="<?php echo $oi[$i]?>"><?php echo $oi[$i]?></option>
	                        <?php

	   										}
	                       ?>
	                    </select>
	                </div>
	            </div>
	          </div>
	          <div class="row justify-content-center">
	            <div class="col-12">
	                <div class="form-group">
	                  <label for="exampleFormControlSelect1">Selecione o tamanho</label>
	                    <select name="tamanho" required class="form-control" id="exampleFormControlSelect2">
	                     <option>Selecione</option>
	                     <?php
	                       $str2 = $linhas['tamanho'];
	                       $oi2 = explode(",",$str2);
	                       $numero_palavras2 = str_word_count($str2);
	                       for($i2 = 0; $i2 < $numero_palavras2; $i2++) {
	                        ?>
	                        <option value="<?php echo $oi2[$i2]?>"><?php echo $oi2[$i2]?></option>
	                        <?php

	   										}
	                       ?>
	                    </select>
	                </div>
	            </div>
	          </div>
	          <div class="row justify-content-center">
	            <div class="col-12">
	                <div class="form-group">
	                  <label for="exampleFormControlSelect1">Selecione o curso</label>
	                    <select name="curso" required class="form-control" id="exampleFormControlSelect3" required>
	                     <option>Selecione</option>
	                     <?php
	                       $str3 = $linhas['cursos'];
	                       $oi3 = explode(",",$str3);
	                       $numero_palavras3 = str_word_count($str3);
	                       for($i3 = 0; $i3 < $numero_palavras3; $i3++) {
	                        ?>
	                        <option value="<?php echo $oi3[$i3]?>"><?php echo $oi3[$i3]?></option>
	                        <?php

	   										}
	                       ?>
	                    </select>
	                </div>
	            </div>
	          </div>
	          <div class="row">
	            <div class="col-6">
	                <div class="form-group">
	                  <label for="exampleFormControlSelect1">Selecione a quantidade</label>
	                    <select name="quantidade" required class="form-control" id="exampleFormControlSelect3">
	                     <option value="1">Selecione</option>
	                     <option value="2">2</option>
	                     <option value="3">3</option>
	                     <option value="4">4</option>
	                   </select>
	               </div>
	           </div>
	         </div>
	        </div>
	        <button href="cadastro/php/produtopedido.php" id="submit" type="submit" name="addcarrinho" class="add-to-cart">Comprar</button>
	      </div>
	    </div>
	      <?php
	    }
 }else{
   echo "<script>alert('Esta categoria não existe!'); history.back();</script>";
 }
 }else{
  if(isset($_POST['camiseta'])){
		$query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Camiseta'");
	  $linhas = mysqli_num_rows($query1);

	  if($linhas > 0){

	    $query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Camiseta'") or die (mysqli_error());

	    while ($linhas = mysqli_fetch_array($query1)) {

	      $_SESSION['nomep'] = $linhas['nome'];
	      $_SESSION['status'] = 'em espera';
	      $_SESSION['pecap'] = $linhas['peca'];
	      $_SESSION['precop'] = $linhas['preco'];
	      $_SESSION['imagemp'] = $linhas['imagem'];
	      ?>

	    <div class="container3">
	    <div class="grid second-nav">
	      <div class="column-xs-12">
	        <nav>
	          <ol class="breadcrumb-list">
	            <li class="breadcrumb-item"><a href="site.php">Início</a></li>
	            <li class="breadcrumb-item"><a href="produtos.php">Produtos</a></li>
	            <li class="breadcrumb-item active">Camiseta</li>
	          </ol>
	        </nav>
	      </div>
	    </div>
	    <div class="grid product">
	      <div class="column-xs-12 column-md-7">
	        <div class="product-gallery">
	          <div class="product-image">
	            <img class="active" src="cadastro/php/upload/<?php echo $linhas['imagem'];?>">
	          </div>
	          <ul class="image-list">
	            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem2'];?>"></li>
	            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem3'];?>"></li>
	            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem4'];?>"></li>
	          </ul>
	        </div>
	      </div>
	      <div class="column-xs-12 column-md-5">
	        <h1><?php echo $linhas['nome'];?></h1>
	        <h2>R$<?php echo $linhas['preco'];?></h2>
	        <div class="description">
	          <div class="row justify-content-center">
	            <div class="col-12">
	                <div class="form-group">
	                  <label for="exampleFormControlSelect1">Selecione a cor</label>
	                    <select name="cor" required class="form-control" id="exampleFormControlSelect1">
	                     <option>Selecione</option>
	                     <?php
	                       $str = $linhas['cor'];
	                       $oi = explode(",",$str);
	                       $numero_palavras = str_word_count($str);
	                       for($i = 0; $i < $numero_palavras; $i++) {
	                        ?>
	                        <option value="<?php echo $oi[$i]?>"><?php echo $oi[$i]?></option>
	                        <?php

	   										}
	                       ?>
	                    </select>
	                </div>
	            </div>
	          </div>
	          <div class="row justify-content-center">
	            <div class="col-12">
	                <div class="form-group">
	                  <label for="exampleFormControlSelect1">Selecione o tamanho</label>
	                    <select name="tamanho" required class="form-control" id="exampleFormControlSelect2">
	                     <option>Selecione</option>
	                     <?php
	                       $str2 = $linhas['tamanho'];
	                       $oi2 = explode(",",$str2);
	                       $numero_palavras2 = str_word_count($str2);
	                       for($i2 = 0; $i2 < $numero_palavras2; $i2++) {
	                        ?>
	                        <option value="<?php echo $oi2[$i2]?>"><?php echo $oi2[$i2]?></option>
	                        <?php

	   										}
	                       ?>
	                    </select>
	                </div>
	            </div>
	          </div>
	          <div class="row justify-content-center">
	            <div class="col-12">
	                <div class="form-group">
	                  <label for="exampleFormControlSelect1">Selecione o curso</label>
	                    <select name="curso" required class="form-control" id="exampleFormControlSelect3" required>
	                     <option>Selecione</option>
	                     <?php
	                       $str3 = $linhas['cursos'];
	                       $oi3 = explode(",",$str3);
	                       $numero_palavras3 = str_word_count($str3);
	                       for($i3 = 0; $i3 < $numero_palavras3; $i3++) {
	                        ?>
	                        <option value="<?php echo $oi3[$i3]?>"><?php echo $oi3[$i3]?></option>
	                        <?php

	   										}
	                       ?>
	                    </select>
	                </div>
	            </div>
	          </div>
	          <div class="row">
	            <div class="col-6">
	                <div class="form-group">
	                  <label for="exampleFormControlSelect1">Selecione a quantidade</label>
	                    <select name="quantidade" required class="form-control" id="exampleFormControlSelect3">
	                     <option value="1">Selecione</option>
	                     <option value="2">2</option>
	                     <option value="3">3</option>
	                     <option value="4">4</option>
	                   </select>
	               </div>
	           </div>
	         </div>
	        </div>
	        <button href="cadastro/php/produtopedido.php" id="submit" type="submit" name="addcarrinho" class="add-to-cart">Comprar</button>
	      </div>
	    </div>
	      <?php
	    }
 }else{
   echo "<script>alert('Esta categoria não existe!'); history.back();</script>";
 }
 }else{
     if(isset($_POST['jaqueta'])){
			 $query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Jaqueta'");
 		  $linhas = mysqli_num_rows($query1);

 		  if($linhas > 0){

 		    $query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Jaqueta'") or die (mysqli_error());

 		    while ($linhas = mysqli_fetch_array($query1)) {

 		      $_SESSION['nomep'] = $linhas['nome'];
 		      $_SESSION['status'] = 'em espera';
 		      $_SESSION['pecap'] = $linhas['peca'];
 		      $_SESSION['precop'] = $linhas['preco'];
 		      $_SESSION['imagemp'] = $linhas['imagem'];
 		      ?>

 		    <div class="container3">
 		    <div class="grid second-nav">
 		      <div class="column-xs-12">
 		        <nav>
 		          <ol class="breadcrumb-list">
 		            <li class="breadcrumb-item"><a href="site.php">Início</a></li>
 		            <li class="breadcrumb-item"><a href="produtos.php">Produtos</a></li>
 		            <li class="breadcrumb-item active">Jaqueta</li>
 		          </ol>
 		        </nav>
 		      </div>
 		    </div>
 		    <div class="grid product">
 		      <div class="column-xs-12 column-md-7">
 		        <div class="product-gallery">
 		          <div class="product-image">
 		            <img class="active" src="cadastro/php/upload/<?php echo $linhas['imagem'];?>">
 		          </div>
 		          <ul class="image-list">
 		            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem2'];?>"></li>
 		            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem3'];?>"></li>
 		            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem4'];?>"></li>
 		          </ul>
 		        </div>
 		      </div>
 		      <div class="column-xs-12 column-md-5">
 		        <h1><?php echo $linhas['nome'];?></h1>
 		        <h2>R$<?php echo $linhas['preco'];?></h2>
 		        <div class="description">
 		          <div class="row justify-content-center">
 		            <div class="col-12">
 		                <div class="form-group">
 		                  <label for="exampleFormControlSelect1">Selecione a cor</label>
 		                    <select name="cor" required class="form-control" id="exampleFormControlSelect1">
 		                     <option>Selecione</option>
 		                     <?php
 		                       $str = $linhas['cor'];
 		                       $oi = explode(",",$str);
 		                       $numero_palavras = str_word_count($str);
 		                       for($i = 0; $i < $numero_palavras; $i++) {
 		                        ?>
 		                        <option value="<?php echo $oi[$i]?>"><?php echo $oi[$i]?></option>
 		                        <?php

 		   										}
 		                       ?>
 		                    </select>
 		                </div>
 		            </div>
 		          </div>
 		          <div class="row justify-content-center">
 		            <div class="col-12">
 		                <div class="form-group">
 		                  <label for="exampleFormControlSelect1">Selecione o tamanho</label>
 		                    <select name="tamanho" required class="form-control" id="exampleFormControlSelect2">
 		                     <option>Selecione</option>
 		                     <?php
 		                       $str2 = $linhas['tamanho'];
 		                       $oi2 = explode(",",$str2);
 		                       $numero_palavras2 = str_word_count($str2);
 		                       for($i2 = 0; $i2 < $numero_palavras2; $i2++) {
 		                        ?>
 		                        <option value="<?php echo $oi2[$i2]?>"><?php echo $oi2[$i2]?></option>
 		                        <?php

 		   										}
 		                       ?>
 		                    </select>
 		                </div>
 		            </div>
 		          </div>
 		          <div class="row justify-content-center">
 		            <div class="col-12">
 		                <div class="form-group">
 		                  <label for="exampleFormControlSelect1">Selecione o curso</label>
 		                    <select name="curso" required class="form-control" id="exampleFormControlSelect3" required>
 		                     <option>Selecione</option>
 		                     <?php
 		                       $str3 = $linhas['cursos'];
 		                       $oi3 = explode(",",$str3);
 		                       $numero_palavras3 = str_word_count($str3);
 		                       for($i3 = 0; $i3 < $numero_palavras3; $i3++) {
 		                        ?>
 		                        <option value="<?php echo $oi3[$i3]?>"><?php echo $oi3[$i3]?></option>
 		                        <?php

 		   										}
 		                       ?>
 		                    </select>
 		                </div>
 		            </div>
 		          </div>
 		          <div class="row">
 		            <div class="col-6">
 		                <div class="form-group">
 		                  <label for="exampleFormControlSelect1">Selecione a quantidade</label>
 		                    <select name="quantidade" required class="form-control" id="exampleFormControlSelect3">
 		                     <option value="1">Selecione</option>
 		                     <option value="2">2</option>
 		                     <option value="3">3</option>
 		                     <option value="4">4</option>
 		                   </select>
 		               </div>
 		           </div>
 		         </div>
 		        </div>
 		        <button href="cadastro/php/produtopedido.php" id="submit" type="submit" name="addcarrinho" class="add-to-cart">Comprar</button>
 		      </div>
 		    </div>
 		      <?php
 		    }
    }else{
      echo "<script>alert('Esta categoria não existe!'); history.back();</script>";
    }
    }else{
        if(isset($_POST['legs'])){
					$query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Legs'");
				  $linhas = mysqli_num_rows($query1);

				  if($linhas > 0){

				    $query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Legs'") or die (mysqli_error());

				    while ($linhas = mysqli_fetch_array($query1)) {

				      $_SESSION['nomep'] = $linhas['nome'];
				      $_SESSION['status'] = 'em espera';
				      $_SESSION['pecap'] = $linhas['peca'];
				      $_SESSION['precop'] = $linhas['preco'];
				      $_SESSION['imagemp'] = $linhas['imagem'];
				      ?>

				    <div class="container3">
				    <div class="grid second-nav">
				      <div class="column-xs-12">
				        <nav>
				          <ol class="breadcrumb-list">
				            <li class="breadcrumb-item"><a href="site.php">Início</a></li>
				            <li class="breadcrumb-item"><a href="produtos.php">Produtos</a></li>
				            <li class="breadcrumb-item active">Legs</li>
				          </ol>
				        </nav>
				      </div>
				    </div>
				    <div class="grid product">
				      <div class="column-xs-12 column-md-7">
				        <div class="product-gallery">
				          <div class="product-image">
				            <img class="active" src="cadastro/php/upload/<?php echo $linhas['imagem'];?>">
				          </div>
				          <ul class="image-list">
				            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem2'];?>"></li>
				            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem3'];?>"></li>
				            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem4'];?>"></li>
				          </ul>
				        </div>
				      </div>
				      <div class="column-xs-12 column-md-5">
				        <h1><?php echo $linhas['nome'];?></h1>
				        <h2>R$<?php echo $linhas['preco'];?></h2>
				        <div class="description">
				          <div class="row justify-content-center">
				            <div class="col-12">
				                <div class="form-group">
				                  <label for="exampleFormControlSelect1">Selecione a cor</label>
				                    <select name="cor" required class="form-control" id="exampleFormControlSelect1">
				                     <option>Selecione</option>
				                     <?php
				                       $str = $linhas['cor'];
				                       $oi = explode(",",$str);
				                       $numero_palavras = str_word_count($str);
				                       for($i = 0; $i < $numero_palavras; $i++) {
				                        ?>
				                        <option value="<?php echo $oi[$i]?>"><?php echo $oi[$i]?></option>
				                        <?php

				   										}
				                       ?>
				                    </select>
				                </div>
				            </div>
				          </div>
				          <div class="row justify-content-center">
				            <div class="col-12">
				                <div class="form-group">
				                  <label for="exampleFormControlSelect1">Selecione o tamanho</label>
				                    <select name="tamanho" required class="form-control" id="exampleFormControlSelect2">
				                     <option>Selecione</option>
				                     <?php
				                       $str2 = $linhas['tamanho'];
				                       $oi2 = explode(",",$str2);
				                       $numero_palavras2 = str_word_count($str2);
				                       for($i2 = 0; $i2 < $numero_palavras2; $i2++) {
				                        ?>
				                        <option value="<?php echo $oi2[$i2]?>"><?php echo $oi2[$i2]?></option>
				                        <?php

				   										}
				                       ?>
				                    </select>
				                </div>
				            </div>
				          </div>
				          <div class="row justify-content-center">
				            <div class="col-12">
				                <div class="form-group">
				                  <label for="exampleFormControlSelect1">Selecione o curso</label>
				                    <select name="curso" required class="form-control" id="exampleFormControlSelect3" required>
				                     <option>Selecione</option>
				                     <?php
				                       $str3 = $linhas['cursos'];
				                       $oi3 = explode(",",$str3);
				                       $numero_palavras3 = str_word_count($str3);
				                       for($i3 = 0; $i3 < $numero_palavras3; $i3++) {
				                        ?>
				                        <option value="<?php echo $oi3[$i3]?>"><?php echo $oi3[$i3]?></option>
				                        <?php

				   										}
				                       ?>
				                    </select>
				                </div>
				            </div>
				          </div>
				          <div class="row">
				            <div class="col-6">
				                <div class="form-group">
				                  <label for="exampleFormControlSelect1">Selecione a quantidade</label>
				                    <select name="quantidade" required class="form-control" id="exampleFormControlSelect3">
				                     <option value="1">Selecione</option>
				                     <option value="2">2</option>
				                     <option value="3">3</option>
				                     <option value="4">4</option>
				                   </select>
				               </div>
				           </div>
				         </div>
				        </div>
				        <button href="cadastro/php/produtopedido.php" id="submit" type="submit" name="addcarrinho" class="add-to-cart">Comprar</button>
				      </div>
				    </div>
				      <?php
				    }
       }else{
         echo "<script>alert('Esta categoria não existe!'); history.back();</script>";
       }
       }else{
           if(isset($_POST['calcao'])){
						 $query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Calção'");
 					  $linhas = mysqli_num_rows($query1);

 					  if($linhas > 0){

 					    $query1 = $mysqli->query("SELECT * FROM produtos where peca = 'Calção'") or die (mysqli_error());

 					    while ($linhas = mysqli_fetch_array($query1)) {

 					      $_SESSION['nomep'] = $linhas['nome'];
 					      $_SESSION['status'] = 'em espera';
 					      $_SESSION['pecap'] = $linhas['peca'];
 					      $_SESSION['precop'] = $linhas['preco'];
 					      $_SESSION['imagemp'] = $linhas['imagem'];
 					      ?>

 					    <div class="container3">
 					    <div class="grid second-nav">
 					      <div class="column-xs-12">
 					        <nav>
 					          <ol class="breadcrumb-list">
 					            <li class="breadcrumb-item"><a href="site.php">Início</a></li>
 					            <li class="breadcrumb-item"><a href="produtos.php">Produtos</a></li>
 					            <li class="breadcrumb-item active">Calção</li>
 					          </ol>
 					        </nav>
 					      </div>
 					    </div>
 					    <div class="grid product">
 					      <div class="column-xs-12 column-md-7">
 					        <div class="product-gallery">
 					          <div class="product-image">
 					            <img class="active" src="cadastro/php/upload/<?php echo $linhas['imagem'];?>">
 					          </div>
 					          <ul class="image-list">
 					            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem2'];?>"></li>
 					            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem3'];?>"></li>
 					            <li class="image-item"><img src="cadastro/php/upload/<?php echo $linhas['imagem4'];?>"></li>
 					          </ul>
 					        </div>
 					      </div>
 					      <div class="column-xs-12 column-md-5">
 					        <h1><?php echo $linhas['nome'];?></h1>
 					        <h2>R$<?php echo $linhas['preco'];?></h2>
 					        <div class="description">
 					          <div class="row justify-content-center">
 					            <div class="col-12">
 					                <div class="form-group">
 					                  <label for="exampleFormControlSelect1">Selecione a cor</label>
 					                    <select name="cor" required class="form-control" id="exampleFormControlSelect1">
 					                     <option>Selecione</option>
 					                     <?php
 					                       $str = $linhas['cor'];
 					                       $oi = explode(",",$str);
 					                       $numero_palavras = str_word_count($str);
 					                       for($i = 0; $i < $numero_palavras; $i++) {
 					                        ?>
 					                        <option value="<?php echo $oi[$i]?>"><?php echo $oi[$i]?></option>
 					                        <?php

 					   										}
 					                       ?>
 					                    </select>
 					                </div>
 					            </div>
 					          </div>
 					          <div class="row justify-content-center">
 					            <div class="col-12">
 					                <div class="form-group">
 					                  <label for="exampleFormControlSelect1">Selecione o tamanho</label>
 					                    <select name="tamanho" required class="form-control" id="exampleFormControlSelect2">
 					                     <option>Selecione</option>
 					                     <?php
 					                       $str2 = $linhas['tamanho'];
 					                       $oi2 = explode(",",$str2);
 					                       $numero_palavras2 = str_word_count($str2);
 					                       for($i2 = 0; $i2 < $numero_palavras2; $i2++) {
 					                        ?>
 					                        <option value="<?php echo $oi2[$i2]?>"><?php echo $oi2[$i2]?></option>
 					                        <?php

 					   										}
 					                       ?>
 					                    </select>
 					                </div>
 					            </div>
 					          </div>
 					          <div class="row justify-content-center">
 					            <div class="col-12">
 					                <div class="form-group">
 					                  <label for="exampleFormControlSelect1">Selecione o curso</label>
 					                    <select name="curso" required class="form-control" id="exampleFormControlSelect3" required>
 					                     <option>Selecione</option>
 					                     <?php
 					                       $str3 = $linhas['cursos'];
 					                       $oi3 = explode(",",$str3);
 					                       $numero_palavras3 = str_word_count($str3);
 					                       for($i3 = 0; $i3 < $numero_palavras3; $i3++) {
 					                        ?>
 					                        <option value="<?php echo $oi3[$i3]?>"><?php echo $oi3[$i3]?></option>
 					                        <?php

 					   										}
 					                       ?>
 					                    </select>
 					                </div>
 					            </div>
 					          </div>
 					          <div class="row">
 					            <div class="col-6">
 					                <div class="form-group">
 					                  <label for="exampleFormControlSelect1">Selecione a quantidade</label>
 					                    <select name="quantidade" required class="form-control" id="exampleFormControlSelect3">
 					                     <option value="1">Selecione</option>
 					                     <option value="2">2</option>
 					                     <option value="3">3</option>
 					                     <option value="4">4</option>
 					                   </select>
 					               </div>
 					           </div>
 					         </div>
 					        </div>
 					        <button href="cadastro/php/produtopedido.php" id="submit" type="submit" name="addcarrinho" class="add-to-cart">Comprar</button>
 					      </div>
 					    </div>
 					      <?php
 					    }
}else{
  echo "<script>alert('Esta categoria não existe!'); history.back();</script>";
}
}else{
  echo "<script>alert('desculpe, mas ocorreu um erro! Tente novamente mais tarde!'); history.back();</script>";
}
}
}
}
}
}



 ?>


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
