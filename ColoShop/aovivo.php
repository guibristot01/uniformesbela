<?php
session_start();

if(!isset($_SESSION['logad'])){
	header('location: login.php');
  session_destroy();
}

if(isset($_GET['deslogar'])){
  session_destroy();
  header('location: login.php');
}

if(isset($_GET['exit'])){
  session_destroy();
  header('location: login.php');
}

 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link rel="stylesheet" type="text/css" href="cadastro/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="cadastro/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="styles/stylesadmin.css">
	<link rel="stylesheet" type="text/css" href="styles/stylesusu.css">
	<link rel="stylesheet" type="text/css" href="styles/stylesDT.css">
</head>
<body>
	<?php include('cadastro/php/conexao.php'); ?>
<!-- header -->
<header class="header">
  <div id="exit">
    <a id="signout" href="?exit"><i class="fa fa-sign-out"></i>Logout</a>
  </div>
    <div id="hamburguer">

        <span id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </span><!-- /#nav-icon -->
    </div><!-- /#hamburguer -->
</header><!-- /header -->
<!-- End header -->

<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li>
            <a href="admin.php">
                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                <span class="nav-label">Cadastrados</span>
            </a>

        </li>
        <li>
            <a id="ativo" href="aovivo.php">
                <i class="fa fa-ravelry" aria-hidden="true"></i>
                <span class="nav-label">Tempo Real</span>
            </a>
        </li>
        <li>
            <a href="#" class="">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <span class="nav-label">Relatórios</span>
            </a>
        </li>
        <li>
            <a href="produtosadmin.php" class="">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                <span class="nav-label">Produtos</span>
						</a>
        </li>

    </ul>
    </div>

    <!-- /#sidebar -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
											<div id="demo">
											<input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search Title...">
											<div class="table-responsive-vertical shadow-z-1">
											  <table id="table" class="table table-hover table-mc-light-blue">
											      <thead>
											        <tr>
											          <th>Foto</th>
											          <th>Nome</th>
											          <th>Cpf</th>
											          <th>Categoria do produto</th>
																<th>Cor</th>
                                <th>Tamanho</th>
                                <th>Curso</th>
                                <th>Quantidade</th>
                                <th>Status</th>
											        </tr>
											      </thead>

												<?php
      									include('cadastro/php/conexao.php');
      									$query1 = $mysqli->query("SELECT * FROM pedido");
      									while ($linhas = mysqli_fetch_array($query1)){
                          $codp = $linhas['produtopedido'];
                          $codc = $linhas['usuario'];
                          $query2 = $mysqli->query("SELECT * FROM usuario where cod = '{$codc}'");
                          while ($linhas2 = mysqli_fetch_array($query2)){


      	$query3 = $mysqli->query("SELECT * FROM produtopedido where cod = '{$codp}'");
      	while ($linhas3 = mysqli_fetch_array($query3)){ ?>

												<tbody>
												        <tr id="nome">
												          <td data-title="Foto"><div class="circle"><img src="cadastro/php/upload/<?php echo $linhas2['local'];?>"> </div></td>
												          <td data-title="Nome"><?php echo $linhas2['nome'];?></td>
												          <td data-title="Cpf"><?php echo $linhas2['cpf'];?></td>
                                  <td data-title="Categoria do produto"><?php echo $linhas3['peca'];?></td>
                                  <td data-title="Cor"><?php echo $linhas3['cor'];?></td>
                                  <td data-title="Tamanho"><?php echo $linhas3['tamanho'];?></td>
                                  <td data-title="Curso"><?php echo $linhas3['cursos'];?></td>
                                  <td data-title="Quantidade"><?php echo $linhas['quantidade'];?></td>
																	<td data-title="Status">
																		<?php
																		if ($linhas['status'] == "em espera"){
	 																				?>
	 																				<form method="post"><button type="submit" id="submit"><input type="hidden" name="status1" value="<?php echo $linhas['cod'];?>">Produzindo</button></form>
	 																				<form method="post"><button type="submit" id="submit"><input type="hidden" name="status2" value="<?php echo $linhas['cod'];?>">Pronto</button></form>
	 																				<form method="post"><button type="submit" id="submit"><input type="hidden" name="status3" value="<?php echo $linhas['cod'];?>">Entregue</button></form>
	 																				<?php
	 																	} else if ($linhas['status'] == "Em produção"){
	 																	 ?>
	 																	 <form method="post"><button id="submit20">Produzindo</button></form>
	 																	 <form method="post"><button type="submit" id="submit"><input type="hidden" name="status2" value="<?php echo $linhas['cod'];?>">Pronto</button></form>
	 																	 <form method="post"><button type="submit" id="submit"><input type="hidden" name="status3" value="<?php echo $linhas['cod'];?>">Entregue</button></form>

	 																 <?php
																 }else if ($linhas['status'] == "Pronto"){
																			?>
																			<form method="post"><button id="submit10">Produzindo</button></form>
																			 <form method="post"><button id="submit20">Pronto</button></form>
																			 <form method="post"><button type="submit" id="submit"><input type="hidden" name="status3" value="<?php echo $linhas['cod'];?>">Entregue</button></form>
																	 <?php

																 }
																 ?>

																	</td>
												        </tr>
												</tbody>

											<?php
												}
                      }
                    }
										if(isset($_POST['status1'])){
										$cod = $_POST['status1'];
										$sql = mysqli_query($mysqli, "UPDATE pedido SET status = 'Em produção' WHERE pedido.cod = '$cod'");
} else if (isset($_POST['status2'])){
	$cod = $_POST['status2'];
	$sql = mysqli_query($mysqli, "UPDATE pedido SET status = 'Pronto' WHERE pedido.cod = '$cod'");
} else if (isset($_POST['status3'])){
	$cod1 = $_POST['status3'];
	$sql = mysqli_query($mysqli, "DELETE FROM pedido WHERE pedido.cod = '$cod1'");
}
										 ?>

										 		</table>
									 		</div>
										</div>
                    </div>
								                </div>
            </div>
        </div>
</div>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="styles/bootstrap4/popper.js"></script>
  <script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="cadastro/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/jsadmin.js"></script>
	<script src="js/jquery.js" type="text/javascript"></script>


	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>


</body>
</html>
