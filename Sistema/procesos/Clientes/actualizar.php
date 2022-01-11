<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $cedula = $_POST['cedula'];
  $username = $_POST['user'];
  $password = $_POST['pass'];

  $sql = "UPDATE clientes SET nombre='$nombre', apellido='$apellido', cedula='$cedula', username='$username', password='$password'
  WHERE id_cliente='$id'";
  $query = mysqli_query($connection, $sql);
  echo $query;
?>
