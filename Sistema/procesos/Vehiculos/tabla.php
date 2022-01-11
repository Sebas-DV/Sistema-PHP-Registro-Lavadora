<?php require_once '../../clases/conexion.php'; ?>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Marca</th>
      <th scope="col">Color</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql_query = mysqli_query($connection, "SELECT * FROM vehiculos");

      while($array = mysqli_fetch_array($sql_query))
      {
        $datos = $array[0]."||".$array[1]."||".$array[2]."||".$array[3]."||".$array[4];
      ?>
      <tr>
        <th scope="row"><?php echo $array[0]; ?></th>
        <td><?php echo $array[2]; ?></td>
        <td><?php echo $array[3]; ?></td>
        <td><button type="button" class="btn btn-warning" onclick="modal('<?php echo $datos; ?>')" data-toggle="modal" data-target="#modal"> <i class="fas fa-pencil-alt"></i> Editar</button></td>
        <td><button type="button" onclick="eliminar('<?php echo $array[0]; ?>')"class="btn btn-danger"> <i class="fas fa-trash"></i> Eliminar</button></td>
      </tr>
      <?php
      }
    ?>
  </tbody>
</table>
