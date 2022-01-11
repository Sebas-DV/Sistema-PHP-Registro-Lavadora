<?php
  require_once '../../clases/conexion.php';

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $cedula = $_POST['cedula'];
  $username = $_POST['user'];
  $password = $_POST['pass'];

  $sql = "INSERT INTO clientes(nombre, apellido, cedula, username, password)
  VALUES ('$nombre','$apellido','$cedula','$username','$password')";
  $query = mysqli_query($connection, $sql);
  echo $query;
?>
