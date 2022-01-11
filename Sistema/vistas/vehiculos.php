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
                   <label for="exampleFormControlSelect1">Clientes</label>
                   <?php
                    require_once '../clases/conexion.php';
                    $sql_query = mysqli_query($connection, "SELECT * FROM clientes");
                    ?>
                   <select class="form-control" id="cliente">
                     <option selected>Seleccionar un Cliente</option>
                     <?php
                      while($array = mysqli_fetch_array($sql_query))
                      {
                        ?>
                        <option value="<?php echo $array[0]; ?>"><?php echo $array[1]." ".$array[2]; ?></option>
                        <?php
                      }
                     ?>
                   </select>
                </div>
                <div class="form-group">
                  <label for="">Color</label>
                  <input type="text" class="form-control" id="color" placeholder="color">
                </div>
                <div class="form-group">
                  <label for="">Marca</label>
                  <input type="text" class="form-control" id="marca" placeholder="Marca">
                </div>
                <div class="form-group">
                  <label for="">Descripcion</label>
                  <input type="text" class="form-control" id="descripcion" placeholder="Descripcion">
                </div>
                <button type="button" class="btn btn-primary" id="registrar">Registrar</button>
              </form>
            </div>
            <div class="col-md-8">
              <div id="tabla"></div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Datos para Actualizar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <input type="text" name="" value="" id="id" hidden>
                       <label for="exampleFormControlSelect1">Clientes</label>
                       <?php
                        require_once '../clases/conexion.php';
                        $sql_query = mysqli_query($connection, "SELECT * FROM clientes");
                        ?>
                       <select class="form-control" id="clienteA">
                         <option selected>Seleccionar un Cliente</option>
                         <?php
                          while($array = mysqli_fetch_array($sql_query))
                          {
                            ?>
                            <option value="<?php echo $array[0]; ?>"><?php echo $array[1]." ".$array[2]; ?></option>
                            <?php
                          }
                         ?>
                       </select>
                    </div>
                    <div class="form-group">
                      <label for="">Color</label>
                      <input type="text" class="form-control" id="colorA" placeholder="color">
                    </div>
                    <div class="form-group">
                      <label for="">Marca</label>
                      <input type="text" class="form-control" id="marcaA" placeholder="Marca">
                    </div>
                    <div class="form-group">
                      <label for="">Descripcion</label>
                      <input type="text" class="form-control" id="descripcionA" placeholder="Descripcion">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" id="actualizar"data-dismiss="modal"> <i class="fas fa-save"></i> Guardar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->

        </div>
      </body>
    </html>
    <script type="text/javascript">
      $('#tabla').load("../procesos/Vehiculos/tabla.php");
      $(document).ready(function(){
        $('#registrar').click(function(){
          registro();
        });
        $('#actualizar').click(function(){
          actualizar();
        });
      });
    </script>
    <script type="text/javascript">
    function modal(datos) {

      v = datos.split("||");

      $('#id').val(v[0]);
      $('#colorA').val(v[3]);
      $('#marcaA').val(v[2]);
      $('#descripcionA').val(v[4]);
    }

    function actualizar() {
      id = $('#id').val();
      cliente = $('#clienteA').val();
      color = $('#colorA').val();
      marca = $('#marcaA').val();
      descripcion = $('#descripcionA').val();

      if(color == '' || marca == '' || descripcion == '')
      {
        alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
      }
      else
      {
        cadena = "id=" + id + "&cliente=" + cliente + "&color=" + color + "&marca=" + marca +
                 "&descripcion=" + descripcion;
        $.ajax({
          type:"POST",
          url:"../procesos/Vehiculos/actualizar.php",
          data: cadena,
          success:function(r){
            if(r==1)
            {
              $('#tabla').load('../procesos/Vehiculos/tabla.php');
              alertify.success("Se completo el proceso correctamente");
            }
            else {
              alertify.error("UPS. Error 404");
            }
          }
        });
      }
    }
    function registro()
    {
       cliente = $('#cliente').val();
       color = $('#color').val();
       marca = $('#marca').val();
       descripcion = $('#descripcion').val();

       if(color == '' || marca == '' || descripcion == '')
       {
         alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
       }
       else
       {
         cadena = "cliente=" + cliente + "&color=" + color + "&marca=" + marca +
                  "&descripcion=" + descripcion;
         $.ajax({
           type:"POST",
           url:"../procesos/Vehiculos/registro.php",
           data: cadena,
           success:function(r){
             if(r==1)
             {
               $('#tabla').load('../procesos/Vehiculos/tabla.php');
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
        url:"../procesos/Vehiculos/eliminar.php",
        data: cadena,
        success:function(r){
          if(r==1)
          {
            $('#tabla').load('../procesos/Vehiculos/tabla.php');
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
