<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $sql = "DELETE FROM lavado WHERE id_lavado='$id'";
  $query = mysqli_query($connection, $sql);
  echo $query;
?>
