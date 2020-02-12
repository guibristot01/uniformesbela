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

  <title>Produtos</title>

  <!-- Bootstrap core CSS -->  
  <link href="vendor1/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="styles/simple-sidebar.css" rel="stylesheet">

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
					<a href="#" class="list-group-item list-group-item-action bg-light text-success">Tempo Real</a>
					<a href="#" class="list-group-item list-group-item-action bg-light text-success">Relatorios</a>
					<a href="#" class="list-group-item list-group-item-action bg-success text-light">Produtos</a>
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
						<h1 class="mt-4">Crie um Produto</h1>	

					</br>	

					<button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i></button>	


							</br>
						</br>
					</br>
				</br>
			</br>
		</br>
	</br>
</br>
					<div class="table-responsive">
						<table id="tabela" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
								<th scope="col">Nome</th>
								<th scope="col">Preço</th>	
								<th scope="col">Ação</th>

								</tr>
							</thead>
							<tbody>

							<?php

								$query1 = $mysqli->query("SELECT * FROM produtos") or die (mysqli_error());
								while ($linhas = mysqli_fetch_array($query1)) { 
								?>

								<tr>
								<th scope="row" ><?php echo $linhas['nome'];?></th>
								<td style="text-align: center;"><?php echo $linhas['preco'];?></td>		
								<td style="text-align: center;">
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modal<?php echo $linhas['cod']; ?>">Informações</button>
								<button id="cima" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal2<?php echo $linhas['cod']; ?>">Editar</button>
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal3<?php echo $linhas['cod']; ?>">Excluir	</button>
								</td>					
								</tr>
								<div class="modal fade" id="Modal3<?php echo $linhas['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
											<form method="post" action="cadastro/php/excluirproduto.php" ><button type="submit" name="excluir" value="<?php echo $linhas['cod'];?>" class="btn btn-danger">Excluir</button>
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
												<label for="exampleInputEmail1"><b>Cores: </b></label>
												<?php
												echo $linhas['cor'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Tamanhos: </b></label>
												<?php
												echo $linhas['tamanho'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Cursos: </b></label>
												<?php
												echo $linhas['cursos'];	
												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Imagens (Costa/Frente): </b></label>
												<div class="row">
												<div class="col-2">
												<div class="circle1"><a href="cadastro/php/upload/<?php echo $linhas['imagemcosta'];?>" target="_blank"><img src="cadastro/php/upload/<?php echo $linhas['imagemcosta'];?>"></a></div>
												</div>
												<div class="col-2">
												<div id="imagfoto" class="circle1"><a href="cadastro/php/upload/<?php echo $linhas['imagemfrente'];?>" target="_blank"><img src="cadastro/php/upload/<?php echo $linhas['imagemfrente'];?>"></a></div>
												</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><b>Imagens (Adicionais): </b></label>
												<div class="row">
												<?php
													$adicional = $linhas['imagemadd'];
													$add = explode(", ", $adicional);
													$addcont = count($add);
													for($i2 = 0; $i2 < $addcont; $i2++) {
														?>
														
														<div class="col" id="cima"><div class="circle1"><a href="cadastro/php/upload/<?php echo $add[$i2];?>" target="_blank"><img src="cadastro/php/upload/<?php echo $add[$i2];?>"></a></div></div>
														
													<?php
													}
													?>
												</div>
											</div>	
										</div>
										</div>
									</div>
								</div>
								<div class="modal fade bd-example-modal-lg" id="Modal2<?php echo $linhas['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Editar</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
												<div class="modal-body">
												<form action="cadastro/php/editarproduto.php" method="POST" enctype="multipart/form-data">
													<div class="form-group">
														<label for="exampleInputEmail1">Alterar nome da peça da Peça:</label>
														<input type="text" value="<?php echo $linhas['nome'];?>" name="nome1" required class="form-control" id="exampleInputEmail1" aria-describedby="Texto" placeholder="Digite o nome">
														<small id="emailHelp" class="form-text text-muted">É recomendado que o nome contenha uma identificação do uniforme. Ex: Camiseta do Superior.</small>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Alterar o Curso:</label>
														<input type="text" value="<?php echo $linhas['cursos'];?>" name="cursos1" required class="form-control" id="exampleInputEmail1" aria-describedby="Texto" placeholder="Digite o nome">
														<small id="emailHelp" class="form-text text-muted">Observação: Mandar os dados separados por virgula.</small>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Alterar a Cor:</label>
														<input type="text" value="<?php echo $linhas['cor'];?>" name="cor1" required class="form-control" id="exampleInputEmail1" aria-describedby="Texto" placeholder="Digite o nome">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Alterar o Tamanho:</label>
														<input type="text" value="<?php echo $linhas['tamanho'];?>" name="tamanho1" required class="form-control" id="exampleInputEmail1" aria-describedby="Texto" placeholder="Digite o nome">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Alterar o Preço:</label>
														<input type="text" value="<?php echo $linhas['preco'];?>" name="preco1" required class="form-control" id="exampleInputEmail1" aria-describedby="Texto" placeholder="Digite o nome">
													</div>
													<div class="form-group">
													<label for="exampleInputEmail1">Imagens:</label>
													<div class="row" align="center">
														<div class="col-4">
															<div class="upload" upload-image="">
																<input type="file" value="<?php echo $linhas['imagemcosta'];?>" id="files1" name="vaneira1" class="input-file ng-pristine ng-valid ng-touched" files-model="" ng-model="project.fileList">
																<label for="files1">
																	<span class="add-image">
																	Imagem <br> de costas
																	</span>
																	<output id="list"></output>
																</label>
															</div>	
														</div>
														<div class="col-4">
															<div class="upload" upload-image="">
																<input type="file" value="<?php echo $linhas['imagemfrente'];?>" id="files2" name="vaneira2" class="input-file ng-pristine ng-valid ng-touched" files-model="" ng-model="project.fileList">
																<label for="files2">
																	<span class="add-image">
																	Imagem <br> de frente
																	</span>
																	<output id="list"></output>
																</label>
															</div>
														</div>
														<div class="col-4">
															<div class="upload" upload-image="">
																<input type="file" value="<?php echo $linhas['imagemadd'];?>" id="vaneira3" name="vaneira3[]" multiple="multiple" class="input-file ng-pristine ng-valid ng-touched" files-model="" ng-model="project.fileList">
																<label for="files3">
																	<span class="add-image">
																	Outras <br> Imagens
																	</span>
																	<output id="list"></output>
																</label>
															</div>
														</div>
													</div>
													</div>
												</div>
												<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
												<button type="submit" name="editar1" value="<?php echo $linhas['cod'];?>" class="btn btn-success">Salvar Alterações</button>
											</div>
											
												</div>
											</div>
										</div>
										</form>
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

					<!-- modal -->
								<div class="modal fade bd-example-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Criar produto</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										<form action="cadastro/php/addproduto.php" method="POST" enctype="multipart/form-data">
											<div class="form-group">
												<label for="exampleInputEmail1">Nome da Peça</label>
												<input type="text" name="peca" required class="form-control" id="exampleInputEmail1" aria-describedby="Texto" placeholder="Digite o nome">
												<small id="emailHelp" class="form-text text-muted">É recomendado que o nome contenha uma identificação do uniforme. Ex: Camiseta do Superior.</small>
											</div>
											<div class="form-group">
												<label for="exampleFormControlSelect2">Selecione o Curso:</label>
												<select multiple name="curso[]" required class="form-control" id="exampleFormControlSelect2">
												<option value="Técnico em Hospedagem">Técnico em Hospedagem</option>
												<option value="Técnico em Informatica">Técnico em Informatica</option>
												<option value="Técnologia em Redes de Computadores">Técnologia em Redes de Computadores</option>
												<option value="Licenciatura em Matemática">Licenciatura em Matemática</option>
												<option value="Tecnologia em Gestão de Turismo">Tecnologia em Gestão de Turismo</option>
												</select>
											</div>
											<div class="row">
												<div class="col-5">
													<div class="form-group">
														<label for="exampleFormControlSelect2">Selecione a Cor:</label>
														<select multiple name="cor[]" required class="form-control" id="exampleFormControlSelect2">
															<option value="Verde">Verde</option>
															<option value="Preto">Preto</option>
															<option value="Branco">Branco</option>
															<option value="Cinza">Cinza</option>
														</select>
													</div>
												</div>
												<div class="col-7">
												<label for="example">Nova Cor:</label>
													<input type="text" name="cornovo" class="form-control" id="exampleInputEmail1" aria-describedby="Texto" placeholder="Digite a cor">
													<small id="emailHelp" class="form-text text-muted">Se houver mais de uma nova cor, separar por virgula. Ex: verde, rosa, etc.</small>
												</div>	
											</div>
											</br>
											<div class="row">
												<div class="col-5">
												<div class="form-group">
														<label for="exampleFormControlSelect2">Selecione o Tamanho:</label>
														<select multiple name="tamanho[]" required class="form-control" id="exampleFormControlSelect2">
															<option value="P">P</option>
															<option value="PP">PP</option>
															<option value="M">M</option>
															<option value="G">G</option>
															<option value="GG">GG</option>
															<option value="EXTRA G">EXTRA G</option>
														</select>
													</div>
												</div>
												<div class="col-7">
													<label for="example">Novo Tamanho:</label>
													<input type="text" name="tamanhonovo" class="form-control" id="exampleInputEmail1" aria-describedby="Texto" placeholder="Digite o Tamanho">
													<small id="emailHelp" class="form-text text-muted">Se houver mais de um novo tamanho, separar por virgula. Ex: GG, G, etc.</small>
											</div>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Preço da peça:</label>
												<input type="text" name="preco" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o preço">
											</div>
											</br>
											<label for="exampleInputEmail1">Imagens:</label>
											<div class="row" align="center">
												<div class="col-4">
													<div class="upload" upload-image="">
														<input type="file" id="files1" required name="files1" class="input-file ng-pristine ng-valid ng-touched" files-model="" ng-model="project.fileList">
														<label for="files1">
															<span class="add-image">
															Imagem <br> de costas
															</span>
															<output id="list"></output>
														</label>
													</div>	
												</div>
												<div class="col-4">
													<div class="upload" upload-image="">
														<input type="file" id="files2" required name="files2" class="input-file ng-pristine ng-valid ng-touched" files-model="" ng-model="project.fileList">
														<label for="files2">
															<span class="add-image">
															Imagem <br> de frente
															</span>
															<output id="list"></output>
														</label>
													</div>
												</div>
												<div class="col-4">
													<div class="upload" upload-image="">
														<input type="file" id="files3" required name="files3[]" multiple="multiple" class="input-file ng-pristine ng-valid ng-touched" files-model="" ng-model="project.fileList">
														<label for="files3">
															<span class="add-image">
															Outras <br> Imagens
															</span>
															<output id="list"></output>
														</label>
													</div>
												</div>
											</div>
										
										</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
												<button type="submit" class="btn btn-success">Salvar Alterações</button>
											</div>
										</div>
									</div>
									</form>
								</div>
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
