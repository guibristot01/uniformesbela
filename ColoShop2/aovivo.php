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
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tempo Real</title>

  <!-- Bootstrap core CSS -->  
  <link href="vendor1/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="styles/simple-sidebar.css" type="text/css" rel="stylesheet">

  <link rel="stylesheet" href="styles/addimage.css">

  <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
   

</head>

<body>

	<div class="d-flex" id="wrapper">

	<?php include('cadastro/php/conexao.php'); ?>

	<!-- navbar lateral -->
		<div class="bg-light border-right" id="sidebar-wrapper">
				<div class="sidebar-heading text-success">Bela Uniformes </div>
				<div class="list-group list-group-flush">
					<a href="#" class="list-group-item list-group-item-action bg-light text-success">Cadastrados</a>
					<a href="#" class="list-group-item list-group-item-action bg-success text-light">Tempo Real</a>
					<a href="#" class="list-group-item list-group-item-action bg-light text-success">Relatorios</a>
					<a href="#" class="list-group-item list-group-item-action bg-light text-success">Produtos</a>
				</div>
		</div>
	
		<div id="page-content-wrapper"> <!-- abre o conteudo da pagina -->
				<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"> <!-- abre o navbar -->
					<button class="btn btn-success" id="menu-toggle">Menu</button>

					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link" id="signout" href="?exit">Sair </a>
						</li>
					</ul>

				</nav> <!-- fecha o navbar -->

				<div class="container-fluid">
							</br>
						</br>
					</br>
				</br>
			</br>

					<div class="table-responsive">
						<table id="tabela" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
								<th scope="col">Foto</th>
								<th scope="col">Nome</th>	
								<th scope="col">Ação</th>		
								</tr>
							</thead>
							<tbody>

							<?php

                $query1 = $mysqli->query("SELECT * FROM usuario") or die (mysqli_error());
                $query2 = $mysqli->query("SELECT * FROM pedido") or die (mysqli_error());
								while ($linhas = mysqli_fetch_array($query1)) { 
								?>
								<tr>
								<th scope="row"><div class="circle1"><img src="cadastro/php/upload/<?php echo $linhas['local'];?>"> </div></th>
								<td style="text-align: center;"><?php echo $linhas['nome'];?></td>
								<td style="text-align: center;">
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modal<?php echo $linhas['cod']; ?>">Informações</button>
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal5<?php echo $linhas['cod']; ?>">Excluir</button>
								</td>		
								</tr>
								<div class="modal fade" id="Modal5<?php echo $linhas['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											Você deseja mesmo excluir? Este ato é irreversivel!
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
											<form method="post" action="cadastro/php/excluirpessoa.php" ><button type="submit" name="excluir2" value="<?php echo $linhas['cod'];?>" class="btn btn-danger">Excluir</button>
										</div>
										</div>
									</div>
									</div>
								<div class="modal fade bd-example-modal-lg" id="Modal<?php echo $linhas['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Informações</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
										<div class="modal-body">
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Nome: </b></label>
												<?php
												echo $linhas['nome'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Email: </b></label>
												<?php
												echo $linhas['email'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Telefone: </b></label>
												<?php
												echo $linhas['fone'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Data de Nascimento: </b></label>
												<?php
												echo $linhas['datanac'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Cpf: </b></label>
												<?php
												echo $linhas['cpf'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Cidade: </b></label>
												<?php
												echo $linhas['cidade'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Rua: </b></label>
												<?php
												echo $linhas['rua'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Número Residencial: </b></label>
												<?php
												echo $linhas['numerores'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Imagem: </b></label>
												<div class="row">
												<div class="col">
												<div class="circle1"><a href="cadastro/php/upload/<?php echo $linhas['local'];?>" target="_blank"><img src="cadastro/php/upload/<?php echo $linhas['local'];?>"></a></div>
												</div>	
												</div>
											</div>
										</div>
										</div>
									</div>
								</div>
								<?php
								}
								?>
              			</tbody>
						</table>
					</div>	
					</br>
					</br>
				</br>
			</br>
		</br>
	</br>
</br>
				</div>
		</div>
	</div>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor1/jquery/jquery.min.js"></script>
  <script src="vendor1/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
  	$(document).ready( function () {
    $('#tabela').DataTable({
			"language": {
            "url": "br.txt"
        }
	    });
		});
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>