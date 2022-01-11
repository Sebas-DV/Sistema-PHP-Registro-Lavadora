<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $sql = "DELETE FROM clientes WHERE id_cliente='$id'";
  $query = mysqli_query($connection, $sql);
  echo $query;
?>
