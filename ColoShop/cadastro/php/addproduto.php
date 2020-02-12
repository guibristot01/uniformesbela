<?php
session_start();
include("conexao.php");

if (!isset($_FILES['files1']['tmp_name'])) {
			echo "";
			}else{
			$file=$_FILES['files1']['tmp_name'];
			//$_FILES é uma variavel global
			$image = $_FILES["files1"] ["name"];
			$image_name= addslashes($_FILES['files1']['name']);
			//addslashes adiciona barra invertira no texto
			$size = $_FILES["files1"] ["size"];
			$error = $_FILES["files1"] ["error"];

			if ($error > 0){
						die("Error uploading file! Code $error.");
					}else{
						if($size > 10000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}

					else{

					move_uploaded_file($_FILES["files1"]["tmp_name"],"upload/" . $_FILES["files1"]["name"]);

          if (!isset($_FILES['files2']['tmp_name'])) {
          			echo "";
          			}else{
          			$file=$_FILES['files2']['tmp_name'];
          			//$_FILES é uma variavel global
          			$image = $_FILES["files2"] ["name"];
          			$image_name= addslashes($_FILES['files2']['name']);
          			//addslashes adiciona barra invertira no texto
          			$size = $_FILES["files2"] ["size"];
          			$error = $_FILES["files2"] ["error"];

          			if ($error > 0){
          						die("Error uploading file! Code $error.");
          					}else{
          						if($size > 10000000) //conditions for the file
          						{
          						die("Format is not allowed or file size is too big!");
          						}

          					else{

							  move_uploaded_file($_FILES["files2"]["tmp_name"],"upload/" . $_FILES["files2"]["name"]);
							  

									$arquivo = $_FILES['files3'];
									$local3 = "";
									
									$local3 = implode(', ', $arquivo['name']);
														
									
									if (!isset($_FILES['files3']['tmp_name'])) {
										echo "";
										}else{
										$file=$_FILES['files3']['tmp_name'];
										//$_FILES é uma variavel global
										$image = $_FILES["files3"] ["name"];
										
													for($cont = 0; $cont < count($arquivo['name']); $cont++){
														$error = $arquivo['error'][$cont];
															if($error > 0){
																$errado = 1;
															} else{
																$errado = 0;
															}		
													}
													for($cont = 0; $cont < count($arquivo['name']); $cont++){
														$grande = $arquivo['size'][$cont];
															if($grande > 10000000){
																$tamanhofoto = 1;
															} else{
																$tamanhofoto = 0;
															}		
													}
						
				  
										if ($errado == 1){
											for($cont = 0; $cont < count($arquivo['name']); $cont++){
													$erro = $arquivo['error'][$cont];
													die("Error uploading file! Code $erro.");
											}
												}else{
													if($tamanhofoto == 1){//conditions for the file
													die("Format is not allowed or file size is too big!");
														}else{
															for($cont = 0; $cont < count($arquivo['name']); $cont++){
															move_uploaded_file($_FILES["files3"]["tmp_name"][$cont],"upload/" . $_FILES["files3"]["name"][$cont]);
													}
												
											
											

$novacor = $_POST['cornovo'];
$novotamanho = $_POST['tamanhonovo'];
$cursos = implode(', ', $_POST['curso']);
$nome = $_POST['peca'];
$cor = implode(', ', $_POST['cor']);
if(empty($novacor)){
	$finalcor = $cor;
} else{
	$finalcor = $cor.", ".$novacor;
}
$tamanho = implode(', ', $_POST['tamanho']);
if(empty($novacor)){
	$finaltamanho = $tamanho;
} else{
	$finaltamanho = $tamanho.", ".$novotamanho;
}
$preco = $_POST['preco'];
$local = $_FILES["files1"]["name"];
$_SESSION['img1'] = $_FILES["files1"]["name"];
$local2 = $_FILES["files2"]["name"];
$_SESSION['img2'] = $_FILES["files2"]["name"];

$_SESSION['img3'] = $local3;

$query1 = $mysqli->query("SELECT * FROM produtos");
$linhas = mysqli_num_rows($query1);

$sql = mysqli_query($mysqli, "INSERT INTO produtos(nome, cor, tamanho, cursos, preco, imagemcosta, imagemfrente, imagemadd) VALUES ('$nome','$finalcor','$finaltamanho','$cursos','$preco','$local','$local2','$local3')");
    echo "<script>alert('Produto cadastrado com sucesso!'); history.back();</script>";

  }
  }
  }
}
}
}
					}
				}
			}
				
			
			
			
		








?>
