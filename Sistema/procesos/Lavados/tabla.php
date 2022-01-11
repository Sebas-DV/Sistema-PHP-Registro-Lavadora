<?php require_once '../../clases/conexion.php'; ?>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Carro</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql_query = mysqli_query($connection, "SELECT l.id_lavado, v.marca, v.color
                                              FROM lavado l
                                              INNER JOIN vehiculos v on l.id_vehiculo = v.id_vehiculo");

      while($array = mysqli_fetch_array($sql_query))
      {
        $datos = $array[0]."||".$array[1];
      ?>
      <tr>
        <th scope="row"><?php echo $array[0]; ?></th>
        <td><?php echo $array[1]." | ".$array[2]; ?></td>
        <td><button type="button" onclick="eliminar('<?php echo $array[0]; ?>')"class="btn btn-danger"> <i class="fas fa-trash"></i> Eliminar</button></td>
      </tr>
      <?php
      }
    ?>
  </tbody>
</table>
