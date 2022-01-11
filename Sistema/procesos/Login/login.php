<?php
  session_start();

  require_once 'clases/conexion.php';

  if(!empty($_POST))
  {
    if(empty($_POST['username']) || empty($_POST['password']))
    {
      $login = "Rellene todos los campos";
    }
    else
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $_SESSION['user'] = $username;

      $sql = "SELECT * FROM clientes WHERE username='$username' AND password='$password'";
      $query = mysqli_query($connection, $sql);

      if(mysqli_num_rows($query) > 0)
      {
        header('Location: vistas/inicio.php');
      }
      else
      {
        $login = "Usuario y/o contraseña incorrectos";
      }
    }
  }
?>
