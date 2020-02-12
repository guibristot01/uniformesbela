<?php
session_start();

include("conexao.php");

if(isset($_POST['addcarrinho'])){


  $nome = $_SESSION['nomep'];
  $cor = $_POST['cor'];
  $tamanho = $_POST['tamanho'];
  $curso = $_POST['curso'];
  $quantidade = $_POST['quantidade'];
  $status = $_SESSION['status'];
  $peca = $_SESSION['pecap'];
  $preco = $_SESSION['precop'];
  $imagem = $_SESSION['imagemp'];

if($cor == "Selecione"){
echo "<script>alert('Nenhuem valor preenchido em cor');</script>";
} else{
  if($tamanho == "Selecione"){
  echo "<script>alert('Nenhuem valor preenchido em tamanho');</script>";
  } else{
    if($curso == "Selecione"){
    echo "<script>alert('Nenhuem valor preenchido em curso');</script>";
    } else{

$query1 = $mysqli->query("SELECT * FROM produtopedido") ;
$linhas = mysqli_num_rows($query1);

$sql = mysqli_query($mysqli, "INSERT INTO produtopedido(nome, cor, tamanho, cursos, peca, preco, imagem) VALUES ('$nome','$cor','$tamanho','$curso','$peca','$preco','$imagem')");

$query1 = $mysqli->query("SELECT * FROM produtopedido") ;
$linhas = mysqli_num_rows($query1);
$codproduto = $linhas;

$query1 = $mysqli->query("SELECT * FROM usuario") or die (mysqli_error());

while ($linhas = mysqli_fetch_array($query1)) {
  if($_SESSION['email'] == $linhas['email']){
  $codcliente = $linhas['cod'];
}
}


    $query1 = $mysqli->query("SELECT * FROM pedido") ;
    $linhas = mysqli_num_rows($query1);

    $sql = mysqli_query($mysqli, "INSERT INTO pedido(quantidade, status, produtopedido, usuario) VALUES ('$quantidade','$status','$codproduto','$codcliente')");

    echo "<script>alert('Compra realizada'); history.back();</script>";



}
}
}
}
?>
