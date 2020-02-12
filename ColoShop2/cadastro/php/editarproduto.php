<?php
session_start();
include("conexao.php");

$cod = $_POST['editar1'];

				$query2 = $mysqli->query("SELECT * FROM produtos where cod = '{$cod}'") or die (mysqli_error());                                               								
				while ($linhas3 = mysqli_fetch_array($query2)) {

				if (empty($_FILES['vaneira1']['name'])) {
					$_FILES['vaneira1']['name'] = $linhas3['imagemcosta'];
				}
				}

if (!isset($_FILES['vaneira1']['tmp_name'])) {
			}else{
			$file=$_FILES['vaneira1']['tmp_name'];
			//$_FILES é uma variavel global
			$image = $_FILES["vaneira1"] ["name"];
			$image_name= addslashes($_FILES['vaneira1']['name']);
			//addslashes adiciona barra invertira no texto
		

                    move_uploaded_file($_FILES["vaneira1"]["tmp_name"],"upload/" . $_FILES["vaneira1"]["name"]);

									$query2 = $mysqli->query("SELECT * FROM produtos where cod = '{$cod}'") or die (mysqli_error());                                               								
									while ($linhas3 = mysqli_fetch_array($query2)) {
									
									if (empty($_FILES['vaneira2']['name'])) {
										$_FILES['vaneira2']['name'] = $linhas3['imagemfrente'];
									}
									}        

          if (!isset($_FILES['vaneira2']['tmp_name'])) {
          			}else{
          			$file=$_FILES['vaneira2']['tmp_name'];
          			//$_FILES é uma variavel global
          			$image = $_FILES["vaneira2"] ["name"];
          			$image_name= addslashes($_FILES['vaneira2']['name']);
          			//addslashes adiciona barra invertira no texto
          			

							  move_uploaded_file($_FILES["vaneira2"]["tmp_name"],"upload/" . $_FILES["vaneira2"]["name"]);
							  

									$arquivo = $_FILES['vaneira3'];
									$local3 = "";
									
									$local3 = implode(', ', $arquivo['name']);
														
												$query2 = $mysqli->query("SELECT * FROM produtos where cod = '{$cod}'") or die (mysqli_error());                                               								
												while ($linhas3 = mysqli_fetch_array($query2)) {

												if (empty($_FILES['vaneira3']['name'])) {
													$_FILES['vaneira3']['name'] = $linhas3['imagemadd'];
												}
												}
									
									if (!isset($_FILES['vaneira3']['tmp_name'])) {
                                        $local3 = $_SESSION['img3'];
										}else{
										$file=$_FILES['vaneira3']['tmp_name'];
										//$_FILES é uma variavel global
										$image = $_FILES["vaneira3"] ["name"];
										
															for($cont = 0; $cont < count($arquivo['name']); $cont++){
															move_uploaded_file($_FILES["vaneira3"]["tmp_name"][$cont],"upload/" . $_FILES["vaneira3"]["name"][$cont]);
                                                    }		



$nome = $_POST['nome1'];
$cursos = $_POST['cursos1'];
$cor = $_POST['cor1'];
$tamanho = $_POST['tamanho1'];
$preco = $_POST['preco1'];
$local = $_FILES["vaneira1"]["name"];
$local2 = $_FILES["vaneira2"]["name"];
$local4 = $local3;


if (isset($_POST['editar1'])) {

	$sql = mysqli_query($mysqli, "UPDATE produtos SET nome = '$nome', cor = '$cor', tamanho = '$tamanho', cursos = '$cursos', preco = '$preco', imagemcosta = '$local', imagemfrente = '$local2', imagemadd = '$local4' WHERE produtos.cod = '$cod'");

    echo "<script>alert('$coco'); history.back();</script>";
	}


  }
  }
}




					
				
			
				
			
			
			
		








?>
