<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $marca = $_POST['marca'];
  $color = $_POST['color'];
  $descripcion = $_POST['descripcion'];

  if($_POST['cliente'] == "Seleccionar un Cliente")
  {
      $sql = "UPDATE vehiculos SET marca='$marca', color='$color', descripcion='$descripcion'
      WHERE id_vehiculo='$id'";


      $query = mysqli_query($connection, $sql);

      echo $query;
  }
  else
  {
    $cliente = $_POST['cliente'];
    $sql = "UPDATE vehiculos SET id_cliente='$cliente', marca='$marca', color='$color', descripcion='$descripcion'
    WHERE id_vehiculo='$id'";


    $query = mysqli_query($connection, $sql);

    echo $query;
  }
?>
