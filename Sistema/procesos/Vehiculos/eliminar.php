<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $sql = "DELETE FROM vehiculos WHERE id_vehiculo='$id'";
  $query = mysqli_query($connection, $sql);
  echo $query;
?>
