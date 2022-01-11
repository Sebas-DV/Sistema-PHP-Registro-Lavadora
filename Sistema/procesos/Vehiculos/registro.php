<?php
  require_once '../../clases/conexion.php';

  $cliente = $_POST['cliente'];
  $color = $_POST['color'];
  $marca = $_POST['marca'];
  $descripcion = $_POST['descripcion'];

  $sql = "INSERT INTO vehiculos(id_cliente, marca, color, descripcion)
  VALUES ('$cliente','$marca','$color','$descripcion')";
  $query = mysqli_query($connection, $sql);
  echo $query;
?>
