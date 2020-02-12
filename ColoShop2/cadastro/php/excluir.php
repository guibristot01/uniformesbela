<?php
session_start();
include("conexao.php");

	$email = $_SESSION['email'];
    echo "<script>alert('$email');</script>";


?>
