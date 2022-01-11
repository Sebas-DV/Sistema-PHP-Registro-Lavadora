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
                  <label for="">Nombre</label>
                  <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="">Apellido</label>
                  <input type="text" class="form-control" id="apellido" placeholder="Apellido">
                </div>
                <div class="form-group">
                  <label for="">Cedula</label>
                  <input type="text" class="form-control" id="cedula" placeholder="Cedula">
                </div>
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" id="user" placeholder="Nombre de Usuario">
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="text" class="form-control" id="pass" placeholder="Contraseña">
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
                      <label for="">Nombre</label>
                      <input type="text" id="id" name="" value="" hidden>
                      <input type="text" class="form-control" id="nombreA" aria-describedby="emailHelp" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <label for="">Apellido</label>
                      <input type="text" class="form-control" id="apellidoA" placeholder="Apellido">
                    </div>
                    <div class="form-group">
                      <label for="">Cedula</label>
                      <input type="text" class="form-control" id="cedulaA" placeholder="Cedula">
                    </div>
                    <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" class="form-control" id="userA" placeholder="Nombre de Usuario">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="text" class="form-control" id="passA" placeholder="Contraseña">
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
      $('#tabla').load("../procesos/Clientes/tabla.php");
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
      $('#nombreA').val(v[1]);
      $('#apellidoA').val(v[2]);
      $('#cedulaA').val(v[3]);
      $('#userA').val(v[4]);
      $('#passA').val(v[5]);
    }

    function actualizar() {
      id = $('#id').val();
      nombre = $('#nombreA').val();
      apellido = $('#apellidoA').val();
      cedula = $('#cedulaA').val();
      user = $('#userA').val();
      pass = $('#passA').val();

      if(nombre == '' || apellido == '' || cedula == '' || user == '' || pass == '')
      {
        alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
      }
      else
      {
        cadena = "id=" + id + "&nombre=" + nombre + "&apellido=" + apellido + "&cedula=" + cedula +
                 "&user=" + user + "&pass=" + pass;
        $.ajax({
          type:"POST",
          url:"../procesos/Clientes/actualizar.php",
          data: cadena,
          success:function(r){
            if(r==1)
            {
              $('#tabla').load('../procesos/Clientes/tabla.php');
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
       nombre = $('#nombre').val();
       apellido = $('#apellido').val();
       cedula = $('#cedula').val();
       user = $('#user').val();
       pass = $('#pass').val();

       if(nombre == '' || apellido == '' || cedula == '' || user == '' || pass == '')
       {
         alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
       }
       else
       {
         cadena = "nombre=" + nombre + "&apellido=" + apellido + "&cedula=" + cedula +
                  "&user=" + user + "&pass=" + pass;
         $.ajax({
           type:"POST",
           url:"../procesos/Clientes/registro.php",
           data: cadena,
           success:function(r){
             if(r==1)
             {
               $('#tabla').load('../procesos/Clientes/tabla.php');
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
        url:"../procesos/Clientes/eliminar.php",
        data: cadena,
        success:function(r){
          if(r==1)
          {
            $('#tabla').load('../procesos/Clientes/tabla.php');
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
