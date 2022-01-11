<?php
  require_once '../../clases/conexion.php';

  $vehiculo = $_POST['vehiculo'];
  $lavado = $_POST['lavado'];

  $sql = "INSERT INTO lavado(id_vehiculo, tipo)
  VALUES ('$vehiculo','$lavado')";
  $query = mysqli_query($connection, $sql);
  echo $query;
?>
