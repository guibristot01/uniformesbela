<?php
// Inicia sessões
session_start();


if(isset($_POST['calca'])){

  $_SESSION['calca'] = true;
  header('location: http://localhost/Colo%20Shop/produtos.php');

}else{

  if(isset($_POST['moletom'])){

    $_SESSION['moletom'] = true;
    header('location: http://localhost/Colo%20Shop/produtos.php');

  }else{

    if(isset($_POST['camiseta'])){

      $_SESSION['camiseta'] = true;
      header('location: http://localhost/Colo%20Shop/produtos.php');

    }else{

      if(isset($_POST['jaqueta'])){

        $_SESSION['jaqueta'] = true;
        header('location: http://localhost/Colo%20Shop/produtos.php');

      }else{

        if(isset($_POST['legs'])){

          $_SESSION['legs'] = true;
          header('location: http://localhost/Colo%20Shop/produtos.php');

        }else{

          if(isset($_POST['calcao'])){

            $_SESSION['calcao'] = true;
            header('location: http://localhost/Colo%20Shop/produtos.php');

          }else{
            echo "<script>alert('as senhas não coinscidem'); history.back();</script>";
          }
        }
      }
    }
  }
}

?>
