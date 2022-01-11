<?php
  session_start();
  if(isset($_SESSION['user']))
  {
    ?>
    <!DOCTYPE html>
    <html lang="es" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
      </head>
      <body>
        <div class="container">
          <?php require_once 'menu.php'; ?>
          <br><br>
          <div class="row">
            <div class="col-md-4">
              <form>
                <div class="form-group">
                   <label for="exampleFormControlSelect1">Vehiculo</label>
                   <?php
                    require_once '../clases/conexion.php';
                    $sql_query = mysqli_query($connection, "SELECT * FROM vehiculos");
                    ?>
                   <select class="form-control" id="vehiculo">
                     <option selected>Seleccionar un Vehiculo</option>
                     <?php
                      while($array = mysqli_fetch_array($sql_query))
                      {
                        ?>
                        <option value="<?php echo $array[0]; ?>"><?php echo $array[2]." | ".$array[3]; ?></option>
                        <?php
                      }
                     ?>
                   </select>
                </div>
                <div class="form-group">
                  <label for="">Tipo de Lavado</label>
                  <input type="text" class="form-control" id="lavado" placeholder="Tipo de Lavado">
                </div>
                <button type="button" class="btn btn-primary" id="registrar">Registrar</button>
              </form>
            </div>
            <div class="col-md-8">
              <div id="tabla"></div>
            </div>
          </div>
        </div>
      </body>
    </html>
    <script type="text/javascript">
      $('#tabla').load("../procesos/Lavados/tabla.php");
      $(document).ready(function(){
        $('#registrar').click(function(){
          registro();
        });
      });
    </script>
    <script type="text/javascript">
    function registro()
    {
       vehiculo = $('#vehiculo').val();
       lavado = $('#lavado').val();

       if(lavado == '' || vehiculo == 'Seleccionar un Vehiculo')
       {
         alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
       }
       else
       {
         cadena = "vehiculo=" + vehiculo + "&lavado=" +lavado;
         $.ajax({
           type:"POST",
           url:"../procesos/Lavados/registro.php",
           data: cadena,
           success:function(r){
             if(r==1)
             {
               $('#tabla').load('../procesos/Lavados/tabla.php');
               alertify.success("Se completo el proceso correctamente");
             }
             else {
               alertify.error("UPS. Error 404");
             }
           }
         });
       }
    }
    function eliminar(id) {
      alertify.confirm('Eliminar Datos', '¿ Desea eliminar el registro seleccionado ?',
      function(){
        eliminarProceso(id)
      }
      ,function(){
        alertify.error("Se cancelo la operacion")
      });
    }

    function eliminarProceso(id)
    {
      cadena = "id=" + id;

      $.ajax({
        type:"POST",
        url:"../procesos/Lavados/eliminar.php",
        data: cadena,
        success:function(r){
          if(r==1)
          {
            $('#tabla').load('../procesos/Lavados/tabla.php');
            alertify.success("Se elimino");
          }
          else {
            alertify.error("UPS. Error 404");
          }
        }
      });
    }
    </script>
    <?php
  }
  else
  {
    header('Location: ../index.php');
  }
?>
